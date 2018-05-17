<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Item;
use App\Stock;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('stock.index',compact('categories'));

    }

    public function search_result(Request $request)
    {
        $userType = auth::user()->type;

        if($request->has('submit'))
        {
            if($request->has('item_id'))
            {
                $all_stocks=Stock::where('item_id',$request->item_id)->get();
            }
            else if($request->has('category_id'))
            {
                $category = Category::find($request->category_id);
                $items = $category->items;
                $all_stocks = collect([]);
                foreach ($items as $item)
                {
                    $stocks = $item->stocks;

                    foreach ($stocks as $stock)
                    {
                        $all_stocks->push($stock);
                    }
                }
            }

        }
        else if($request->has('allSubmit'))
        {
            $all_stocks = Stock::all();
        }

        $stocks=collect([]);
        foreach ($all_stocks as $stock)
        {
            if($stock->numberOfItems>$stock->sold)
            {
                $stocks->push($stock);
            }
        }
        return view('stock.search_result',compact('stocks', 'userType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $success=0;
        $items = Item::all();
        $userId = auth::user()->id;
        return view('stock.create', compact('items', 'userId', 'success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'item_id'=>'required',
            'numberOfItems'=>'required|numeric',
            'price'=>'required|numeric',
            'user_id'=>'required',
            'date'=>'required',

        ]);

        $success = 1;
        $stock = Stock::create($request->all());
        $last = DB::table('stocks')->latest('id')->first();
        $lastId = $last->id;

        //variables to show the stock/create page elements
        $items = Item::all();
        $userId = auth::user()->id;

        if(!empty($stock))
        {
            $success = 2;
            $msg = "Product is successfully added to the stock as id: ".$lastId;
        }
        else{
            $msg = "Adding product to the stock is failed.";
        }

        return view('stock.create', compact('success', 'msg', 'items', 'userId'));

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

}
