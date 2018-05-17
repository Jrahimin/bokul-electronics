<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Customer_detail;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $success=0;
        return view('customer.create', compact('success'));
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

            'name'=>'required',
            'email'=>'email',
            'phone'=>'required|digits:11',
            'dateOfBirth'=>'date',

        ]);

        $success = 1;
        $customer = Customer::create($request->all());
        $last = DB::table('customers')->latest('id')->first();
        $lastId = $last->id;
        if(!empty($customer))
        {
            $success = 2;
            $msg = "Customer info is saved successfully as id: ".$lastId;
        }
        else{
            $msg = "Customer info is not saved.";
        }
        if(!empty($last->nationalId))
            return view('customer.create', compact('success', 'msg'));
        else
            return view('customer.general_cust', compact('success', 'msg'));
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
    
    public function general_cust()
    {
        $success=0;
        return view('customer.general_cust', compact('success'));
    }
    
    public function customer_details()
    {
        $detail = 0;
        $success=0;
        $customers = Customer::where('type', 'installment_cust')->orderBy('id', 'desc')->get();
        return view('customer.customer_details', compact('customers', 'success', 'detail'));
    }

    public function detailsStore(Request $request)
    {
        $success=1;
        $customers = Customer::where('type', 'installment_cust')->orderBy('id', 'desc')->get();
        $detail = Customer_detail::create($request->all());
        if(!empty($detail))
        {
            $success = 2;
            $msg = "আবেদন সম্পন্ন হয়েছে";
        }
        else{
            $msg = "দুঃখিত। আবেদন সম্পন্ন হয়নি। পুনরায় আবেদন করুন";
        }
        return view('customer.customer_details', compact('success', 'customers', 'msg', 'detail'));
    }

    public function details_result(Request $request)
    {
        $detail = Customer_detail::find($request->detail_id);
        return view('customer.customer_details_result', compact('detail'));
    }
}
