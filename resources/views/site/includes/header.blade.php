<!doctype html>
<html lang="en">

    <head>
        <title>{{config('company.name')}}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
            content="This site has been created by Techclouds Team under best developers and is fully funcioning. Joshua Jayrous- Chief Designer and Programmer, Edrick Katabarula- Principle Designer and Editor, Erick Alex- Security engineer, Briyson Lema- Designer and Programmer">

        <link rel="stylesheet" href="assets/css/custom-bs.css">
        <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
        <link rel="stylesheet" href="assets/fonts/line-icons/style.css">
        <link rel="stylesheet" href="assets/css/parsley.css">
        <link href="assets/fonts/font-awesome-4.7.0/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="/storage/images/logo/logo.svg">
        <!-- <link rel="stylesheet" href="assets/css/carousel.css"> -->
        <!-- <link rel="stylesheet" href="assets/css/carousel.css"> -->

        <!-- MAIN CSS -->
        @include("site/includes/navigation")
        <link rel="stylesheet" href="assets/css/style.css">
        <style>
        .nav-links {
            color: #ffc107;
        }

        .success {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            /* Adjust the z-index as needed to ensure it's above other content */
            padding: 15px;
            /* Adjust padding to style the notification box */
            text-align: center;
            /* Center the text horizontally */
            width: 300px;
            /* Set a width for the notification box */
            background-color: #4CAF50;
            border: 1px solid #fff;
            /* Background color for success */
            color: #fff;
            /* Text color */
            border-radius: 5px;
            /* Rounded corners for the box */
        }

        .error {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            /* Adjust the z-index as needed to ensure it's above other content */
            padding: 15px;
            /* Adjust padding to style the notification box */
            text-align: center;
            /* Center the text horizontally */
            width: 300px;
            /* Set a width for the notification box */
            background-color: red;
            border: 1px solid #fff;
            /* Background color for success */
            color: #fff;
            /* Text color */
            border-radius: 5px;
            /* Rounded corners for the box */
        }
        </style>
    </head>

    <body>

        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>


        <div class="super_container" id="top">

            <!-- Header -->

            <header class="header trans_300">

                <!-- Top Navigation -->

                <div class="top_nav">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="top_nav_left">the home of outstanding computer technology solutions</div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="top_nav_right">
                                    <div class="top_nav_left">Designed by {{config('company.name')}} &copy;<script>
                                        document.write(new Date().getFullYear());
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Navigation -->

                <div class="main_nav_container">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <div class="logo_container">
                                    <a href="{{route('home')}}"><img src="/storage/images/logo/logob.png"
                                            style="width: 100px; height:auto"></a>
                                </div>
                                <nav class="navbar">
                                    <ul class="navbar_menu">
                                        <li><a href="{{'/'}}" class="nav-links">Home</a></li>
                                        <li><a href="{{'/about'}}">About</a></li>
                                        <li><a href="{{'/projects'}}">Projects</a></li>
                                        <li><a href="{{'/services'}}">Services</a></li>
                                        <li><a href="{{'/contact'}}">Contact</a></li>
                                        <li><a href="{{'/gallery'}}">Gallery</a>
                                    </ul>
                                    <ul class="navbar_user">


                                        @if (Route::has('login'))
                                        <li class="account">
                                            @auth
                                            <a data-target="#myModal" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <img src="{{Auth::user()->profile_photo_path ? '/storage/'.Auth::user()->profile_photo_path : '/storage/profile-photos/profile.jpg'}}"
                                                    width="30px" height="auto" class="rounded-circle img-fluid">
                                            </a>

                                            <ul class="account_selection">
                                                <li>
                                                    <a class="dropdown-item account-link" href="{{'/dashboard'}}">My
                                                        Account</a>
                                                </li>
                                                <div class="dropdown-divider"></div>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                                </li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                        @else
                                        <!-- else if not logged in -->
                                        <li class="account user">
                                            <a href="#" role="button" data-target="#myModal" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="icon-user profile_user"></i> </a>

                                            <ul class="account_selection">
                                                <li>
                                                    <a href="{{ route('login') }}">Login</a>
                                                </li>
                                                @if (Route::has('register'))
                                                <li>
                                                    <a href="{{ url('/register') }}"> Register
                                                    </a>
                                                </li>
                                                @endif
                                                @endauth
                                            </ul>
                                        </li>
                                        <!-- end if -->
                                        @endif
                                    </ul>
                                    <div class="hamburger_container">
                                        <i class="icon-bars" aria-hidden="true"></i>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </header>

            <div class="fs_menu_overlay"></div>
            <div class="hamburger_menu">
                <div class="hamburger_close"><i class="icon-times" aria-hidden="true"></i></div>
                <div class="hamburger_menu_content text-left">
                    <ul class="menu_top_nav">
                        <li class="menu_item"><a href="{{'/'}}">Home</a></li>
                        <li class="menu_item"><a href="{{'/about'}}">About</a></li>
                        <li class="menu_item"><a href="{{'/projects'}}">Projects</a></li>
                        <li class="menu_item"><a href="{{'/services'}}">Services</a></li>
                        <li class="menu_item"><a href="{{'/contact'}}">Contact</a></li>
                        <li class="menu_item"><a href="{{'/gallery'}}">Gallery</a>
                    </ul>
                </div>
            </div>