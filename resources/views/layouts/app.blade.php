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
        .navbar{
            position: static;
        }

        *{margin:0;padding:0;font-family: Verdana;}body{background-color:#ebfad1;}
        .headwrapper {
            background: #BBC191;
            background: -webkit-linear-gradient(left, #BBC191 , #E7A293);
            background: -o-linear-gradient(right, #BBC191, #E7A293);
            background: -moz-linear-gradient(right, #BBC191, #E7A293);
            background: linear-gradient(to right, #BBC191 , #E7A293);
            box-shadow:1px 1px 2px 1px black;
        }
        .bokulelectro{
            font-size:1.9em;
            font-weight: bold;
            color:rgb(187,22,4);
            margin-left: -10%;
        }
        .bokuladdress{
            font-size: 0.8em;
            margin-top: -2%;
            margin-left: -10%;
        }
        .dealer{
            font-weight: bold;
            font-size: 0.9em;
            margin-left: 40%;
        }
        .bokuldetails{
            font-size: .9em;
            text-align: right;
            margin-right: 8%;
        }
        *{margin:0;padding:0;text-decoration:none}

        header{position:relative;width:100%;background:rgb(22,105,20);}
        nave{position:relative;width:980px;margin:0 auto;}
        #cssmenu,#cssmenu ul,#cssmenu ul li,#cssmenu ul li a,#cssmenu #head-mobile{border:0;list-style:none;line-height:1;display:block;position:relative;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
        #cssmenu:after,#cssmenu > ul:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0}
        #cssmenu #head-mobile{display:none}
        #cssmenu{font-family:sans-serif;background:rgb(22,105,20);}
        #cssmenu > ul > li{float:left}
        #cssmenu > ul > li > a{padding:15px;font-size:12px;letter-spacing:1px;text-decoration:none;color:#ddd;font-weight:700;}
        #cssmenu > ul > li:hover > a,#cssmenu ul li.active a{color:#fff}
        #cssmenu > ul > li:hover,#cssmenu ul li.active:hover,#cssmenu ul li.active,#cssmenu ul li.has-sub.active:hover{background:#448D00!important;-webkit-transition:background .3s ease;-ms-transition:background .3s ease;transition:background .3s ease;}
        #cssmenu > ul > li.has-sub > a{padding-right:30px}
        #cssmenu > ul > li.has-sub > a:after{position:absolute;top:22px;right:11px;width:8px;height:2px;display:block;background:#ddd;content:''}
        #cssmenu > ul > li.has-sub > a:before{position:absolute;top:19px;right:14px;display:block;width:2px;height:8px;background:#ddd;content:'';-webkit-transition:all .25s ease;-ms-transition:all .25s ease;transition:all .25s ease}
        #cssmenu > ul > li.has-sub:hover > a:before{top:23px;height:0}
        #cssmenu ul ul{position:absolute;left:-9999px}
        #cssmenu ul ul li{height:0;-webkit-transition:all .25s ease;-ms-transition:all .25s ease;background:#333;transition:all .25s ease}
        #cssmenu ul ul li:hover{}
        #cssmenu li:hover > ul{left:auto}
        #cssmenu li:hover > ul > li{height:35px}
        #cssmenu ul ul ul{margin-left:100%;top:0}
        #cssmenu ul ul li a{border-bottom:1px solid rgba(150,150,150,0.15);padding:11px 15px;width:170px;font-size:12px;text-decoration:none;color:#ddd;font-weight:400;}
        #cssmenu ul ul li:last-child > a,#cssmenu ul ul li.last-item > a{border-bottom:0}
        #cssmenu ul ul li:hover > a,#cssmenu ul ul li a:hover{color:#fff}
        #cssmenu ul ul li.has-sub > a:after{position:absolute;top:16px;right:11px;width:8px;height:2px;display:block;background:#ddd;content:''}
        #cssmenu ul ul li.has-sub > a:before{position:absolute;top:13px;right:14px;display:block;width:2px;height:8px;background:#ddd;content:'';-webkit-transition:all .25s ease;-ms-transition:all .25s ease;transition:all .25s ease}
        #cssmenu ul ul > li.has-sub:hover > a:before{top:17px;height:0}
        #cssmenu ul ul li.has-sub:hover,#cssmenu ul li.has-sub ul li.has-sub ul li:hover{background:#363636;}
        #cssmenu ul ul ul li.active a{border-left:1px solid #333}
        #cssmenu > ul > li.has-sub > ul > li.active > a,#cssmenu > ul ul > li.has-sub > ul > li.active> a{border-top:1px solid #333}

        @media screen and (max-width:1000px){
            nave{width:100%;}
            #cssmenu{width:100%}
            #cssmenu ul{width:100%;display:none}
            #cssmenu ul li{width:100%;border-top:1px solid #444}
            #cssmenu ul li:hover{background:#363636;}
            #cssmenu ul ul li,#cssmenu li:hover > ul > li{height:auto}
            #cssmenu ul li a,#cssmenu ul ul li a{width:100%;border-bottom:0}
            #cssmenu > ul > li{float:none}
            #cssmenu ul ul li a{padding-left:25px}
            #cssmenu ul ul li{background:#333!important;}
            #cssmenu ul ul li:hover{background:#363636!important}
            #cssmenu ul ul ul li a{padding-left:35px}
            #cssmenu ul ul li a{color:#ddd;background:none}
            #cssmenu ul ul li:hover > a,#cssmenu ul ul li.active > a{color:#fff}
            #cssmenu ul ul,#cssmenu ul ul ul{position:relative;left:0;width:100%;margin:0;text-align:left}
            #cssmenu > ul > li.has-sub > a:after,#cssmenu > ul > li.has-sub > a:before,#cssmenu ul ul > li.has-sub > a:after,#cssmenu ul ul > li.has-sub > a:before{display:none}
            #cssmenu #head-mobile{display:block;padding:23px;color:#ddd;font-size:12px;font-weight:700}
            .button{width:55px;height:46px;position:absolute;right:0;top:0;cursor:pointer;z-index: 12399994;}
            .button:after{position:absolute;top:22px;right:20px;display:block;height:4px;width:20px;border-top:2px solid #dddddd;border-bottom:2px solid #dddddd;content:''}
            .button:before{-webkit-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease;position:absolute;top:16px;right:20px;display:block;height:2px;width:20px;background:#ddd;content:''}
            .button.menu-opened:after{-webkit-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease;top:23px;border:0;height:2px;width:19px;background:#fff;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-ms-transform:rotate(45deg);-o-transform:rotate(45deg);transform:rotate(45deg)}
            .button.menu-opened:before{top:23px;background:#fff;width:19px;-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);-ms-transform:rotate(-45deg);-o-transform:rotate(-45deg);transform:rotate(-45deg)}
            #cssmenu .submenu-button{position:absolute;z-index:99;right:0;top:0;display:block;border-left:1px solid #444;height:46px;width:46px;cursor:pointer}
            #cssmenu .submenu-button.submenu-opened{background:#262626}
            #cssmenu ul ul .submenu-button{height:34px;width:34px}
            #cssmenu .submenu-button:after{position:absolute;top:22px;right:19px;width:8px;height:2px;display:block;background:#ddd;content:''}
            #cssmenu ul ul .submenu-button:after{top:15px;right:13px}
            #cssmenu .submenu-button.submenu-opened:after{background:#fff}
            #cssmenu .submenu-button:before{position:absolute;top:19px;right:22px;display:block;width:2px;height:8px;background:#ddd;content:''}
            #cssmenu ul ul .submenu-button:before{top:12px;right:16px}
            #cssmenu .submenu-button.submenu-opened:before{display:none}
            #cssmenu ul ul ul li.active a{border-left:none}
            #cssmenu > ul > li.has-sub > ul > li.active > a,#cssmenu > ul ul > li.has-sub > ul > li.active > a{border-top:none}
        }
        @media(max-width: 750px){.bokuldetails{font-size:0.8em;}.singhisking{width: 80%;}.bokulelectro{font-size: 1.4em;}.bokuladdress{font-size: 0.6em;}.dealer{font-size: 0.8em;}}
        @media(max-width: 550px){.bokuldetails{font-size:0.7em;}.singhisking{width: 100%;}.bokulelectro{font-size: 1.2em;}.bokuladdress{font-size: 0.4em;}.dealer{font-size: 0.7em;}}

        .footer-image{
            position: relative;
        }
        img{
            display: block;
        }
        .footer-image h4{
            position: absolute;
            top: 7%;
            text-align: center;
            width: 100%;
            font: bold 16px/30px Helvetica, Sans-Serif;
        }
        .container{
            min-height: 600px;
            height: auto;
            margin-left: 10%;
            margin-top: 5%;
            display: block;
        }
        a{
            color: floralwhite;
        }
        .sub{
            border-bottom: solid black 1px;
        }
        .footer{
            height: 60px;
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
    </style>

</head>
<body>

<div class="headwrapper" style="padding: 8px;">

    <table style="width: 100%; margin-left: 2%;">
        <tr>
            <td width="10%">
                <img class="bokullogo" style="display: inline-block; width: 60%; height: 25%;" src="{{asset('bokul_logo.png')}} "/>

            </td>
            <td width="19%">
                <p class="bokulelectro">Bokul Electronics</p>
                <p class="bokuladdress">College Market, Ranisonkail, Thakurgaon.</p>
            </td>

            <td style="width: 20%;">
                <img class="singhisking" width="60%" src="{{asset('singer_pro.png')}}"/>
                <p class="dealer">Exclusive Dealer</p>
            </td>

            <td width="30%">
                <p class="bokuldetails">
                    <b>Contact No:</b><br/> 01723087831, 01911001211<br/>
                    <b>Email:</b> <br/>mrbokul@gmail.com
                </p>
            </td>
        </tr>
    </table>

</div>

<header>
    @yield('header')

        <nave id='cssmenu'>
            <div id="head-mobile"></div>
            <div class="button"></div>
            <ul>
                <li class='active'><a href="{{url('home')}}">HOME</a></li>
                <li><a href="{{url('register')}}">USER</a></li>
                <li><a href='#'>Customer</a>
                    <ul>
                        <li><a href="{{url('customer/general_cust')}}">General Customer</a></li>
                        <li><a href="{{url('customer/create')}}">Installment Customer</a></li>
                        <li><a href="{{url('customer/details')}}">Add Details</a></li>
                    </ul>
                </li>

                <li><a href='#'>Item</a>
                    <ul>
                        <li><a href="{{url('item/category')}}"> Add Category</a></li>
                        <li><a href="{{url('item/create')}}"> Add Item</a></li>
                    </ul>
                </li>

                <li><a href='#'>Stock</a>
                    <ul>
                        <li class="sub"><a href="{{url('stock/create')}}">Add to Stock</a></li>
                        <li class="sub"><a href="{{url('stock/index')}}">Search Stock</a></li>
                    </ul>
                </li>

                <li><a href='#'>Sell</a>
                    <ul>
                        <li class="sub"><a href="{{url('item-sell')}}">Cash Sell</a></li>
                        <li class="sub"><a href="{{url('item-sellOther/install')}}">Installment Sell</a></li>
                    </ul>
                </li>
                <li><a href="{{url('item/install_pay')}}">Pay Installment</a></li>
                <li><a href='#'>Search</a>
                    <ul>
                        <li><a href="{{url('search/search')}}">Cash Sell</a></li>
                        <li><a href="{{url('search/installment')}}">Installment Sell</a></li>
                        <li><a href="{{url('search/customer_search')}}">Customer</a></li>
                    </ul>
                </li>
            </ul>
        </nave>
</header>


    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 3%;">
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

<script src="jq.js">
</script>
<script>
    (function($) {
        $.fn.menumaker = function(options) {
            var cssmenu = $(this), settings = $.extend({
                format: "dropdown",
                sticky: false
            }, options);
            return this.each(function() {
                $(this).find(".button").on('click', function(){
                    $(this).toggleClass('menu-opened');
                    var mainmenu = $(this).next('ul');
                    if (mainmenu.hasClass('open')) {
                        mainmenu.slideToggle().removeClass('open');
                    }
                    else {
                        mainmenu.slideToggle().addClass('open');
                        if (settings.format === "dropdown") {
                            mainmenu.find('ul').show();
                        }
                    }
                });
                cssmenu.find('li ul').parent().addClass('has-sub');
                multiTg = function() {
                    cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                    cssmenu.find('.submenu-button').on('click', function() {
                        $(this).toggleClass('submenu-opened');
                        if ($(this).siblings('ul').hasClass('open')) {
                            $(this).siblings('ul').removeClass('open').slideToggle();
                        }
                        else {
                            $(this).siblings('ul').addClass('open').slideToggle();
                        }
                    });
                };
                if (settings.format === 'multitoggle') multiTg();
                else cssmenu.addClass('dropdown');
                if (settings.sticky === true) cssmenu.css('position', 'fixed');
                resizeFix = function() {
                    var mediasize = 1000;
                    if ($( window ).width() > mediasize) {
                        cssmenu.find('ul').show();
                    }
                    if ($(window).width() <= mediasize) {
                        cssmenu.find('ul').hide().removeClass('open');
                    }
                };
                resizeFix();
                return $(window).on('resize', resizeFix);
            });
        };
    })(jQuery);

    (function($){
        $(document).ready(function(){
            $("#cssmenu").menumaker({
                format: "multitoggle"
            });
        });
    })(jQuery);
</script>