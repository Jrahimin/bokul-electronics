<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Item;
use App\Stock;
use App\Customer;
use App\Installment;
use Illuminate\Support\Facades\Input;

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('customer/general_cust', 'CustomersController@general_cust');
    Route::get('customer/details', 'CustomersController@customer_details');
    Route::post('customer/detailsStore', 'CustomersController@detailsStore');
    Route::post('customer/details_result', 'CustomersController@details_result');
    Route::resource('/customer','CustomersController');

    Route::get('/item/category', 'ItemsController@category')->name('item.category');
    Route::get('/item/install_pay', 'ItemsController@install_pay');
    Route::post('/item/install_payStore', 'ItemsController@install_payStore');
    Route::post('/item/category/store', 'ItemsController@category_store');
    Route::get('/item-sell/create_memo', 'ItemsController@create_memo')->name('item.create_memo');
    Route::get('item-sell', 'ItemsController@item_sell');
    Route::get('item-sellOther', 'ItemsController@item_sellOther');
    Route::get('item-sellOther/install', 'ItemsController@create_installment');
    Route::post('/item-sell/storeOther', 'ItemsController@sellStoreOther');
    Route::get('/item-sell/storeInstall', 'ItemsController@installmentStore');
    Route::post('/item-sell/store', 'ItemsController@sellStore');
    Route::resource('/item','ItemsController');

    Route::get('/search/customer_search', 'SearchController@customer_search');
    Route::get('/search/installment', 'SearchController@installment_search');
    Route::post('/search/installment_result', 'SearchController@installment_search_process');
    Route::get('/search/customer_search_result', 'SearchController@customer_search_process');
    Route::get('/search/search', 'SearchController@search');
    Route::get('/search/search_process', 'SearchController@search_process');


    Route::resource('/user','UserController');


    Route::get('ajax-items',function (Request $request){

        $category_id=$request::input(['category_id']);
        $items=Item::where('category_id','=',$category_id)->get();
        return Response::json($items);
    });

    //to get stocks while selling
    Route::get('ajax-stocks',function (Request $request){

        $item_id=$request::input(['item_id']);
        $all_stocks=Stock::where('item_id','=',$item_id)->get();
        $stocks=collect([]);
        foreach ($all_stocks as $stock)
        {
            if($stock->numberOfItems>$stock->sold)
            {
                $stocks->push($stock);
            }
        }
        return Response::json($stocks);
    });

    //To get installment info while paying installment
    Route::get('ajax-install',function (Request $request){

        $phone = $request::input(['phone']);
        $customer = Customer::where('type', 'installment_cust')->where('phone', $phone)->first();

        $all_installs=Installment::where('cust_id', $customer->id)->where('amount', '>', 0)->get();
        $installs=collect([]);
        foreach ($all_installs as $install)
        {
            $installs->push($install);
        }
        return Response::json($installs);
    });

    Route::get('/stock/index','StockController@index');
    Route::get('/stock/search_result','StockController@search_result');
    Route::resource('/stock','StockController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/custom', 'CustomLoginController@login')->name('login.custom');