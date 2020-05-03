<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title> @yield('title') </title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/admin/favicon/apple-icon-120x120.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/admin/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/admin/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/admin/favicon/favicon-16x16.png')}}">
    <!--load progress bar-->
    <script src="{{ asset('assets/admin/vendor/pace/pace.min.js')}}"></script>
    <link href="{{ asset('assets/admin/vendor/pace/pace-theme-minimal.css')}}" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/loader-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/animate.css/animate.css')}}">

    <!--dataTable-->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/data-table/media/css/dataTables.bootstrap.min.css')}}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/toastr/toastr.min.css')}}">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/magnific-popup/magnific-popup.css')}}">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/stylesheets/css/style.css')}}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">



</head>

<body>
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <a href="index.html" class="on-click">
                    <img alt="logo" src="{{ asset('assets/admin/images/header-logo.png')}}" />
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- RIGHTSIDE header -->
        <div class="rightside-header">
            <div class="header-middle"></div>
            <!--SEARCH HEADERBOX-->
            <div class="header-section" id="search-headerbox">


            </div>
            <!--NOCITE HEADERBOX-->
            <div class="header-section hidden-xs" id="notice-headerbox">


            </div>
            <!--USER HEADERBOX -->
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <img alt="profile photo" src="{{ asset('assets/admin/images/avatar/avatar_user.jpg')}}" />
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-profile">{{ auth()->user()->is_admin === 1 ? 'Admin' : 'Super Admin' }}</span>
                    </div>
                    <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                            <li> <a href="pages_lock-screen.html"><i class="fa fa-lock" aria-hidden="true"></i> Lock Screen</a></li>
                            <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configurations</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">

                <a href="{{ route('logout') }}" data-toggle="tooltip" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
        <!-- LEFT SIDEBAR -->
        <!-- ========================================================= -->
        <div class="left-sidebar">
            <!-- left sidebar HEADER -->
            <div class="left-sidebar-header">
                <div class="left-sidebar-title">Navigation</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>
            <!-- NAVIGATION -->
            <!-- ========================================================= -->
            <div id="left-nav" class="nano">
                <div class="nano-content">
                    <nav>
                        <ul class="nav nav-left-lines" id="main-nav">
                            <!--HOME-->
                            <li class="{{ request()->is('home') ? 'active-item': '' }}"><a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                            <!--Brands-->
                            <!--TABLES-->
                            <li class="has-child-item {{ request()->is('brands','brands/*') ? 'open-item active-item': '' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Bands</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('brands/add') ? 'active-item': '' }}"><a href="{{ route('brand.create') }}">Add Band</a></li>
                                    <li class="{{ request()->is('brands') ? 'active-item': '' }}"><a href="{{ route('brand.manage') }}">Manage Band</a></li>
                                </ul>
                            </li>
                            <!--CATEGORIES-->
                            <li class="has-child-item {{ request()->is('categories','categories/*','sub-categories','sub-categories/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Categories</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('categories/add','categories/edit/*') ? 'active-item':'' }}"><a href="{{ route('categories.create') }}">Add Category</a></li>
                                    <li class="{{ request()->is('categories') ? 'active-item':'' }}"><a href="{{ route('categories.manage') }}">Manage Categories</a></li>
                                    <li class="{{ request()->is('sub-categories/add','sub-categories/edit/*') ? 'active-item':'' }}"><a href="{{ route('sub.category.create') }}">Add Sub Category</a></li>
                                    <li class="{{ request()->is('sub-categories') ? 'active-item':'' }}"><a href="{{ route('sub.category.manage') }}">Manage Sub Categories</a></li>
                                </ul>
                            </li>
                            <!--SLIDERS-->
                            <li class="has-child-item {{ request()->is('sliders','sliders/*') ? 'open-item active-item':'' }} close-item">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Sliders</span></a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('sliders/add','sliders/edit/*') ? 'active-item':'' }}"><a href="{{ route('sliders.create') }}">Add Slider</a></li>
                                    <li class="{{ request()->is('sliders') ? 'active-item':'' }}"><a href="{{ route('sliders.manage') }}">Manage Sliders</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
