<!DOCTYPE html>
<html>
<head>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	    <style>
        html, body{
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #ebfad1;
        }
        .image, .footer-image{
            position: relative;
        }
        img{
            display: block;
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
        .footer-image h4{
            position: absolute;
            top: 7%;
            text-align: center;
            width: 100%;
            font: bold 16px/30px Helvetica, Sans-Serif;
        }
        .container{
            min-height: 100%;
            height: auto;
            margin-left: 10%;
            margin-top: 5%;
            display: block;
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
        .sub{
            border-bottom: solid black 1px;
        }
       .nav ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .single{
            float: left;
            border-right: solid black 1px;
            width: 12.5%;
            border-bottom: solid black 1px;
        }
        .nav a:link{
            display: block;
            background-color: yellowgreen;
            color: floralwhite;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            padding: 8px;
        }
        .nav a:hover{
            background-color: darkgreen;
            color: floralwhite;
        }
        .nav a:active{
            background-color: darkgreen;
            color: floralwhite;
        }
        ul li:hover ul {
            display: block;
            color: floralwhite;
        }
        .footer{
            height: 60px;
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
        #successLabel{
            color: darkgreen;
            font-weight: bold;
            font-size: 16px;
        }
        #failedLabel{
            color: darkred;
            font-weight: bold;
            font-size: 16px;
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
            margin-top: -1%;
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

    <?php
    use Illuminate\Support\Facades\Auth;
    ?>

    @if(auth::check())
    <div class="nav">
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
                        <li class="sub"><a href="{{url('customer/general_cust')}}">General Customer</a></li>
                        <li class="sub"><a href="{{url('customer/create')}}">Installment Customer</a></li>
                        <li class="sub"><a href="{{url('customer/details')}}">Add Details</a></li>
                    </ul>
            </li>
        </ul>

        <ul>
            <li class="single">
                <a href="#">Item</a>
                <ul class="subMenu2">
                    <li class="sub"><a href="{{url('item/category')}}"> Add Category</a></li>
                    <li class="sub"><a href="{{url('item/create')}}"> Add Item</a></li>
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
        @endif
</div>

<div class="container">
    <div class="content">
    @yield('content')

    </div>
</div>

<div class="footer">
    <div class="footer-image">
    <img src="{{asset('bokul footer.jpg')}}" style="width: 100%; height: 60px;"/>
    <h4>&copy; Developed by <span style="color: darkgreen">BanglaSoftTech</span></h4>
    </div>
@yield('footer')
</div>

</body>
</html>
