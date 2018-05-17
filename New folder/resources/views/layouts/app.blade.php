<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bokul Electronics</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        html, body{
            height: 100%;
            background-color: #ebfad1;
            margin: 0;
            padding: 0;
        }
        #app{
            min-height: 100%;
            margin-bottom: -60px;
        }
        .image, .footer-image{
            position: relative;
        }
        .text1{
            position: absolute;
            top: 25%;
            left: 15%;
            width: 100%;
            color: firebrick;
            font-family: Helvetica;
            font-weight: bold;
            font-size: 28px;
            letter-spacing: -1px;
        }
        .text2{
            position: absolute;
            top: 60%;
            left: 15%;
            width: 100%;
            color: #411c0e;
            font-size: 12px;
        }
        .text3{
            font-size: 13px;
            margin-top: -70px;
        }
        .text4{
            font-size: 13px;
            margin-left: 76px;
        }
        .text5{
            font-size: 13px;
        }
        .footer-image h4{
            position: absolute;
            top: 7%;
            text-align: center;
            width: 100%;
            color: black;
            font: bold 16px/30px Helvetica, Sans-Serif;
        }
        a{
            color: floralwhite;
        }
        .subMenu1, .subMenu2, .subMenu3{
            position: absolute;
            width: 12.5%;
            color: floralwhite;
            display: none;
        }
        .nave ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .single{
            float: left;
            color: floralwhite;
            border-right: solid black 1px;
            width: 12.5%;
            border-bottom: solid black 1px;
        }
        .nave a:link{
            display: block;
            background-color: yellowgreen;
            color: floralwhite;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            padding: 8px;
        }
        .nave a:hover, a:active{
            background-color: darkgreen;
            color: floralwhite;
        }
        .nave ul li:hover ul {display: block; color: floralwhite;}
        .footer{
            height: 50px;
        }
        .navbar{
            position: static;
        }
        .upper{
            position: absolute;
            margin-left: 85%;
            margin-top: -1%;
            color: black;
        }
        .singer{
            font-weight: bold;
            font-size: 20px;
            color: red;
        }
        .exclusive{
            margin-left: 50px;
            margin-top: -9px;
            font-size: 14px;
            font-weight: bold;
        }
    </style>

</head>
<body>

<div class="header">
    <div class="image">
        <img src="{{asset('bokul header.jpg')}}" style="width: 100%; height: 100px;"/>
        <p class="text1">Bokul Electronics</p>
        <p class="text2">College Market, Ranisonkail, Thakurgaon.</p>

        <div class="sing_pro" style="margin-top: -60px; margin-left: 32%;">
            <p class="singer">SINGER <span style="color: blue;">Pro</span></p>
            <p class="exclusive">Exclusive dealer<p/>
        </div>

        <div class="upper">
            <p class="text3">Contact No: 01723087831</p>
            <p class="text4">01911001211</p>
            <p class="text5">email: mrbokul@gmail.com</p>
        </div>
    </div>

    @yield('header')

    <div class="nave">
        <ul>
            <li class="single"><a href="{{url('home')}}">Home</a></li>
        </ul>

        <ul>
            <li class="single"><a href="{{url('register')}}">User</a></li>
        </ul>

        <ul>
            <li class="single">
                <a href="#">Customer</a>
                <ul class="subMenu1">
                    <li><a href="{{url('customer/general_cust')}}">General Customer</a></li>
                    <li><a href="{{url('customer/create')}}">Installment Customer</a></li>
                </ul>
            </li>
        </ul>

        <ul>
            <li class="single">
                <a href="#">Item</a>
                <ul class="subMenu2">
                    <li><a href="{{url('item/category')}}"> Add Category</a></li>
                    <li><a href="{{url('item/create')}}"> Add Item</a></li>
                </ul>
            </li>
        </ul>

        <ul>
            <li class="single">
                <a href="#">Stock</a>
                <ul class="subMenu3">
                    <li class="sub"><a href="{{url('stock/create')}}">Add to Stock</a></li>
                    <li class="sub"><a href="{{url('stock/index')}}">Search Stock</a></li>
                </ul>
            </li>
        </ul>
        <ul>
            <li class="single">
                <a href="#">Sell</a>
                <ul class="subMenu3">
                    <li class="sub"><a href="{{url('item-sell')}}">Cash Sell</a></li>
                    <li class="sub"><a href="{{url('item-sellOther/install')}}">Installment Sell</a></li>
                </ul>
        </ul>

        <ul>
            <li class="single"><a href="{{url('item/install_pay')}}">Pay Installment</a></li>
        </ul>

        <ul>
            <li class="single">
                <a href="#">Search</a>
                <ul class="subMenu3">
                    <li class="sub"><a href="{{url('search/search')}}">Cash Sell</a></li></li>
                    <li class="sub"><a href="{{url('search/installment')}}">Installment Sell</a></li></li>
                    <li class="sub"><a href="{{url('search/customer_search')}}">Customer</a></li></li>
                </ul>
        </ul>

    </div>
</div>
<br><br>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Add User</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

<div class="footer">
    <div class="footer-image">
        <img src="{{asset('bokul footer.jpg')}}" style="width: 100%; height: 60px;"/>
        <h4>&copy; Developed by <span style="color: darkgreen">BanglaSoftTech</span></h4>
    </div>
    @yield('footer')
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
