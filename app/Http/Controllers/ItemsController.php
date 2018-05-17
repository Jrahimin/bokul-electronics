<?php

namespace App\Http\Controllers;

use App\Installment;
use App\Item;
use App\Customer;
use App\Sell;
use App\Category;
use App\Stock;
use App\Installment_payment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "index working";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $success=0;
        $categories = Category::all();

        return view('item.create', compact('success', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $success = 1;
        $categories = Category::all();
        $item = Item::create($request->all());
        $last = DB::table('items')->latest('id')->first();
        $lastId = $last->id;

        if(!empty($item))
        {
            $success = 2;
            $msg = "Product is added successfully as id: ".$lastId;
        }
        else{
            $msg = "Adding product is failed.";
        }


        return view('item.create', compact('success', 'msg', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return "show page";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function item_sell()
    {
        $success=0;
        $load = 0;
        $remainingMsg ="";
        $items = Item::all();
        $customers = Customer::where('type', 'general_cust')->orderBy('id', 'desc')->get();
        $userId = auth::user()->id;

        return view('item.item_sell', compact('items', 'customers', 'userId', 'success', 'load', 'remainingMsg'));
    }

    public function sellStore(Request $request)
    {
        $stock=Stock::find($request->stock_id);
        $remaining = $stock->numberOfItems - $stock->sold - $request->no_item;
        $remainingMsg = "";

        //variables to show the item_sel page elements
        $items = Item::all();
        $customers = Customer::where('type', 'general_cust')->orderBy('id', 'desc')->get();
        $userId = auth::user()->id;

        if($remaining>=0)
        {
            $this->validate($request,[

                'no_item'=>'numeric',
                'sell_price'=>'numeric'
            ]);

            $success = 1;
            $load=1;
            $sell = Sell::create($request->all());

            $sold=$stock->sold+$request->no_item;
            $stock->sold=$sold;
            $stock->save();

            //Get last Sell Id
            $sellId = $sell->id;

            //for counting sales total
            $customer_id=$request->cust_id;
            $allSells=Sell::where('cust_id',$customer_id)->get();

            if(!empty($sell))
            {
                $success = 2;
                $msg = "Product is sold successfully as id: ".$sellId;
            }
            else{
                $msg = "Product sale is failed.";
            }

            return view('item.item_sell', compact('success', 'remainingMsg', 'msg', 'items', 'customers', 'sellId', 'userId','allSells', 'load'));
        }
        else{
            $success = 1;
            $load=1;
            $remainingMsg = "Please check the remaining stock and number of items";
            $msg = "Product sale is failed.";

            $lastSell = Sell::where('user_id', $userId)->latest('id')->first();
            $sellId = $lastSell->id;
            $customer_id=$lastSell->cust_id;
            $allSells=Sell::where('cust_id',$customer_id)->get();

            return view('item.item_sell', compact('success', 'msg', 'load', 'remainingMsg', 'items', 'customers', 'userId', 'allSells', 'sellId'));
        }

    }


    public function create_memo(Request   $request)
    {
        $user = Auth::user()->name;
        if($request->has('submitMemoOther'))
        {
            $sells=Sell::where('cust_id',$request->cust_id)->where('instal_id', $request->instal_id)->get();
            $customer=Customer::find($request->cust_id);
            $paid = $request->paid;
            $installment = Installment::find($request->instal_id);
            $submit = 1;

            return view('item.create_memo', compact('sells', 'customer', 'paid', 'installment', 'submit', 'user'));
        }

        if($request->has('submitMemo'))
        {
            $sellId = $request->sell_id;
            $last = Sell::find($sellId);
            $customer_id=$last->cust_id;
            $sells=Sell::where('cust_id',$customer_id)->get();
            $customer=Customer::find($customer_id);
            $paid = $request->paid;
            $submit = 0;
             
            return view('item.create_memo', compact('sells', 'customer', 'paid', 'submit', 'user'));
        }

    }

    public function category()
    {
        $success=0;
        return view('item.category', compact('success'));
    }

    public function category_store(Request   $request)
    {
        $success = 1;
        $category = Category::create($request->all());

        if(!empty($category))
        {
            $success = 2;
            $msg = "Category is added successfully";
        }
        else{
            $msg = "Adding Category is failed.";
        }

        return view('item.category', compact('success', 'msg'));
    }

    public function item_sellOther()
    {
        $success=0;
        $load = 0;
        $msgPay = "";
        $remainingMsg ="";
        $items = Item::all();
        $customers = Customer::where('type', 'installment_cust')->orderBy('id', 'desc')->get();
        $userId = auth::user()->id;

        return view('item.item_sellOther', compact('items', 'customers', 'userId', 'success', 'load', 'msgPay', 'remainingMsg'));
    }

    public function sellStoreOther(Request $request)
    {
        $stock=Stock::find($request->stock_id);
        $remaining = $stock->numberOfItems - $stock->sold - $request->no_item;
        $remainingMsg = "";
        $msgPay = "";

        //$lastInstall = DB::table('installments')->latest('id')->first();
        $lastInstall = Installment::find($request->instal_id);
        //variables to show the item_sel page elements
        $items = Item::all();
        $customers = Customer::orderBy('id', 'desc')->get();
        $userId = auth::user()->id;

        if($remaining>=0)
        {
            $this->validate($request,[

                'no_item'=>'numeric',
                'sell_price'=>'numeric'
            ]);

            $success = 1;
            $load=1;
            $sell = Sell::create($request->all());

            $sold = $stock->sold + $request->no_item;
            $stock->sold=$sold;
            $stock->save();

//            $last = DB::table('sells')->latest('id')->first();
  //          $lastId = $last->id;

            //for counting sales total
            $customer_id=$request->cust_id;
            $allSells=Sell::where('cust_id',$customer_id)->where('instal_id', $lastInstall->id)->get();

            if(!empty($sell))
            {
                $success = 2;
                $msg = "Product is sold successfully as id: ".$sell->id;
            }
            else{
                $msg = "Product sale is failed.";
            }

            return view('item.item_sellOther', compact('success', 'sell', 'lastInstall', 'remainingMsg', 'msg', 'msgPay', 'items', 'customers', 'userId','allSells', 'load'));
        }
        else{
            $success = 1;
            $load=1;
            $remainingMsg = "Please check the remaining stock and number of items";
            $msg = "Product sale is failed.";
            $customer_id=$request->cust_id;
            $allSells=Sell::where('cust_id',$customer_id)->where('instal_id', $lastInstall->id)->get();

            return view('item.item_sellOther', compact('success', 'lastInstall', 'msg', 'load', 'msgPay', 'remainingMsg', 'items', 'customers', 'userId', 'allSells'));
        }

    }
    
    public function create_installment()
    {
        $msg = "";
        $customers = Customer::where('type', 'installment_cust')->orderBy('id', 'desc')->get();
        return view('item.install', compact('customers','msg'));
    }

    public function installmentStore(Request $request)
    {
        $userId = Auth::user()->id;
        $success=0;
        $load = 0;
        $remainingMsg ="";
        $msgPay ="";
        $items = Item::all();
        if($request->has('submitInstall'))
        {


            $installment = Installment::create($request->all());

            if(!empty($installment))
            {
                $lastInstall = $installment;

                return view('item.item_sellOther', compact('items', 'lastInstall', 'msgPay', 'userId', 'success', 'load', 'remainingMsg'));
            }
            else
            {
                $msg = "Failed to submit Installment";
                $customers = Customer::where('type', 'installment_cust')->orderBy('id', 'desc')->get();
                return view('item.install', compact('customers','msg'));
            }
        }
        if($request->has('submitPay'))
        {
            $msgPay = "Installment Successfully paid";
            $amountSum = 0.0;
            $lastInstallId = $request->instal_id;
            $customer_id = $request->cust_id;

            $sells=Sell::where('cust_id',$customer_id)->where('instal_id', $lastInstallId)->get();

            foreach ($sells as $sell)
            {
                $amount = ($sell->no_item*$sell->sell_price) + ($sell->no_item*$sell->sell_price)*4/100;
                $amountSum = $amountSum + $amount;
            }

            $due = $amountSum - $request->paid;

            $lastInstall = Installment::find($lastInstallId);
            $lastInstall->amount = $due;
            $lastInstall->no_of_inst = $request->no_of_inst;
            $lastInstall->save();

            return view('item.item_sellOther', compact('items', 'lastInstall', 'userId', 'success', 'load', 'remainingMsg', 'msgPay'));
        }
    }

    public  function install_pay()
    {
        return view('item.install_pay');
    }

    public function install_payStore(Request $request)
    {
        if($request->has('submitInstall'))
        {
            $msg = "";
            $success = 0;
            $installId = $request->instal_id;
            $installInfo = Installment::find($installId);
            $sells = Sell::where('instal_id', $installId)->get();
            return view('item.install_pay_finish', compact('installInfo', 'sells', 'msg', 'success'));
        }

        if($request->has('submitMemoInstallPay'))
        {
            $user = Auth::user()->name;
            $sells=Sell::where('instal_id', $request->instal_id)->get();
            $installment = Installment::find($request->instal_id);
            $customer=Customer::find($installment->cust_id);
            $install_pay = Installment_payment::where('instal_id', $request->instal_id)->latest('id')->first();
            $submit = 2;
             
            return view('item.create_memo', compact('sells', 'customer', 'installment', 'install_pay', 'submit', 'user'));
        }

        if($request->has('submitPayInstall')) {
            $msg = "Installment payment Failed";
            $success = 1;
            $instal_pay = Installment_payment::create($request->all());

            if (!empty($instal_pay))
            {
                $msg = "Installment has been Successfully paid";
                $success = 2;
                $installId = $request->instal_id;
                $installInfo = Installment::find($installId);
                $sells = Sell::where('instal_id', $installId)->get();
                $installment = Installment::find($instal_pay->instal_id);
                $paid = $request->amount;
                $interest = $request->interest;

                $installment->inst_paid = $installment->inst_paid+ 1;
                $installment->amount = $installment->amount - $paid;
                if($interest>0)
                {
                    $installment->amount = $installment->amount + ($installment->amount*$interest/100);
                }
                $installment->save();
            }
            return view('item.install_pay_finish', compact('installInfo', 'sells', 'msg', 'success'));
        }

    }

}
