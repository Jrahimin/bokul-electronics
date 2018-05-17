<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use app\User;

class CustomLoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $reqPath = $request->path();
        $request->all();
        //if($reqPath!="item/create") {
            if (Auth::attempt(['name' => $request->name, 'type' => $request->type, 'password' => $request->password])) {
                // Authentication passed...
                return redirect()->intended();
                //dd(auth::user()->type);

                //$userType = auth::user()->type;

            }
            else
            return redirect()->route('login');
    }

}