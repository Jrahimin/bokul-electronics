<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer_detail;
use App\Item;
use App\Customer;
use App\Sell;
use App\User;
use App\Installment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SearchController extends Controller
{
    public function search()
    {
        $categories = Category::all();
        $items = Item::all();
        $users = User::all();
        return view('search.search', compact('items', 'categories', 'users'));
    }
    public function installment_search()
    {
        $categories = Category::all();
        $items = Item::all();
        $users = User::all();
        return view('search.installment_search', compact('items', 'categories', 'users'));
    }

    public function installment_search_process(Request $request)
    {
        if($request->has('installment_search'))
        {
            $installments=Installment::where('amount','>',0)->get();
            return view('search.installment_due_search_result',compact('installments'));
        }
       else {


           $categories = Category::all();
           $items = Item::all();
           $allinstallments=Installment::all();
           $sells = collect([]);
           $dateFlag=0;

           //query within date range
           if($request->has('from')&&$request->has('to'))
           {
               $from=$request->from;
               $to=$request->to;
               $dateFlag=1;
               $sell = Sell::whereBetween('date',[$from,$to])->where('sell_type','installment')->get();

               foreach ($sell as $oneSell)
               {
                   $sells->push($oneSell);
               }

           }
           else
           {
               $sell = Sell::where('sell_type','installment')->get();
               foreach ($sell as $oneSell)
               {
                   $sells->push($oneSell);
               }
           }

           //If Category Selected...
           if($request->search_type=='by_category')
           {
               $items=Item::where('category_id',$request->category_id)->get();
           }

           //If Model Selected
           else if($request->search_type=='by_model')
           {
               $items=Item::where('model',$request->model)->get();
           }


           $newSells = collect([]);


           foreach ($items as $item)
           {
               $sell = $sells->where('item_id',$item->id)->where('sell_type','Installment');
               foreach ($sell as $oneSell)
               {
                   $newSells->push($oneSell);
               }


           }


           $installments=collect([]);
           foreach ($allinstallments as $installment)
           {

               $id=$installment->id;
                   foreach ($newSells as $newSell)
                   {
                       if($installment->id==$newSell->instal_id)
                       {
                           if(!($installments->contains('id',$id))) {
                               $installments->push($installment);
                           }
                       }

                   }

           }
           
          return view('search.installment_search_result',compact( 'categories','newSells','installments','dateFlag'));
       }

    }





    public function search_process(Request $request)
   {
       $categories = Category::all();
       $items = Item::all();
       $sells = collect([]);

       //query within date range
       if($request->has('from')&&$request->has('to'))
       {
           $from=$request->from;
           $to=$request->to;
           $sell = Sell::whereBetween('date',[$from,$to])->get();
           
           foreach ($sell as $oneSell)
           {
               $sells->push($oneSell);
           }
       }
       else
       {
           $sell = Sell::all();
           foreach ($sell as $oneSell)
           {
               $sells->push($oneSell);
           }
       }

       if($request->search_type=='by_user')
       {
           $sells = $sells->where('user_id', $request->user);
       }

       //If Category Selected...
           if($request->search_type=='by_category')
               {
                    $items=Item::where('category_id',$request->category_id)->get();
               }

           //If Model Selected
           else if($request->search_type=='by_model')
           {
               $items=Item::where('model',$request->model)->get();
           }
       
       $newSells = collect([]);

       foreach ($items as $item)
       {
           $sell = $sells->where('item_id',$item->id);
           foreach ($sell as $oneSell)
           {
               $newSells->push($oneSell);
           }

       }


 return view('search.search_result',compact('newSells', 'categories'));
   }

    public function customer_search()
    {
        $userType = Auth::user()->type;
        $allDetails = Customer_detail::orderBy('id', 'desc')->get();
        return view('search.customer_search', compact('userType', 'allDetails'));
    }


    public function customer_search_process(Request $request)
    {
        if ($request->has('submitAllNo'))
        {
            $customers = Customer::select('name','phone')->get();
            $customers = $customers->unique('phone');
            $phone[]=['name','phone'];
            foreach ($customers as $customer)
            {
                $phone[]=$customer->toArray();
            }

            Excel::create('New file', function($excel) use($phone) {

                $excel->sheet('New sheet', function($sheet) use($phone) {

                    $sheet->fromArray($phone, null, 'A1', false, false);

                });

            })->download('csv');
        }
        else
        {
            if ($request->has('submit'))
            {
                if ($request->customer_type == 'general_cust') {
                    $customers = Customer::where('type', 'general_cust')->where('phone', $request->phone_number)->get();
                }
                else
                {

                    $customer = Customer::where('type', $request->customer_type)->where('phone', $request->phone)->first();
                    return view('search.installment_search_customer',compact('customer'));
                }
            }
            else if ($request->has('submitAll'))
            {
                $customers = Customer::all();
            }
            return view('search.customer_search_result', compact('customers'));
        }

    }
}
