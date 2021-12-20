<!DOCTYPE html>

<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Admin page</title>
    <link rel="apple-touch-icon" href="{{ asset('images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    @yield('style')

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/bordered-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/semi-dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">

    @yield('style2')

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top">
                            <i class="ficon" data-feather="mail"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top">
                            <i class="ficon" data-feather="message-square"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top">
                            <i class="ficon" data-feather="calendar"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top">
                            <i class="ficon" data-feather="check-square"></i>
                        </a>
                    </li>
                </ul>

            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-language">
                    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flag-icon flag-icon-uz"></i>
                        <span class="selected-language">O'zbek</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                        <a class="dropdown-item" href="javascript:void(0);" data-language="uz">
                            <i class="flag-icon flag-icon-uz"></i> O'zbek
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                            <i class="flag-icon flag-icon-us"></i> English
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="ru">
                            <i class="flag-icon flag-icon-ru"></i> Rus
                        </a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style"><i class="ficon" data-feather="sun"></i></a>
                </li>
                <li class="nav-item nav-search">
                    <a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                    <div class="search-input">
                        <div class="search-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Izlash..." tabindex="-1" data-search="search">
                        <div class="search-input-close"><i data-feather="x"></i></div>
                        <ul class="search-list search-list-main"></ul>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">{{ Auth::user()->full_name }}</span>
                            <span class="user-status">{{ Auth::user()->username }}</span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{ asset('images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="#"><i class="mr-50" data-feather="settings"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="mr-50" data-feather="credit-card"></i> Pricing</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mr-50" data-feather="power"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="">
                        <span class="brand-logo"><svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                      <defs>
                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                          <stop stop-color="#000000" offset="0%"></stop>
                          <stop stop-color="#FFFFFF" offset="100%"></stop>
                        </lineargradient>
                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                          <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                          <stop stop-color="#FFFFFF" offset="100%"></stop>
                        </lineargradient>
                      </defs>
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                          <g id="Group" transform="translate(400.000000, 178.000000)">
                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                          </g>
                        </g>
                      </g>
                    </svg></span>
                        <h2 class="brand-text">Skyzone</h2></a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


                <li class="nav-item @if(Request::segment(1) == 'phone') active @endif">
                    <a class="d-flex align-items-center" href="{{ route('phone.index') }}">
                        <i data-feather="phone"></i>
                        <span class="menu-item text-truncate">Telefon raqamlar</span>
                    </a>
                </li>

                <li class="nav-item @if(Request::segment(1) == 'phone-import') active @endif">
                    <a class="d-flex align-items-center" href="{{ route('phoneImport.index') }}">
                        <i data-feather="file"></i>
                        <span class="menu-item text-truncate">Fayl yuklash</span>
                    </a>
                </li>
                @if(Auth::user()->sys_admin == 1)
                    <li class="nav-item @if(Request::segment(1) == 'client') active @endif">
                        <a class="d-flex align-items-center" href="{{ route('client.index') }}">
                            <i data-feather="users"></i>
                            <span class="menu-item text-truncate">Clients</span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->

        @yield('content')

    <!-- BEGIN: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);"><i class="spinner" data-feather="settings"></i></a><div class="customizer-content">
            <!-- Customizer header -->
            <div class="customizer-header px-2 pt-1 pb-0 position-relative">
                <h4 class="mb-0">Theme Customizer</h4>
                <p class="m-0">Customize & Preview in Real Time</p>

                <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
            </div>

            <hr />

            <!-- Styling & Text Direction -->
            <div class="customizer-styling-direction px-2">
                <p class="font-weight-bold">Skin</p>
                <div class="d-flex">
                    <div class="custom-control custom-radio mr-1">
                        <input
                            type="radio"
                            id="skinlight"
                            name="skinradio"
                            class="custom-control-input layout-name"
                            checked
                            data-layout=""
                        />
                        <label class="custom-control-label" for="skinlight">Light</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input
                            type="radio"
                            id="skinbordered"
                            name="skinradio"
                            class="custom-control-input layout-name"
                            data-layout="bordered-layout"
                        />
                        <label class="custom-control-label" for="skinbordered">Bordered</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input
                            type="radio"
                            id="skindark"
                            name="skinradio"
                            class="custom-control-input layout-name"
                            data-layout="dark-layout"
                        />
                        <label class="custom-control-label" for="skindark">Dark</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input
                            type="radio"
                            id="skinsemidark"
                            name="skinradio"
                            class="custom-control-input layout-name"
                            data-layout="semi-dark-layout"
                        />
                        <label class="custom-control-label" for="skinsemidark">Semi Dark</label>
                    </div>
                </div>
            </div>

            <hr />

            <!-- Menu -->
            <div class="customizer-menu px-2">
                <div id="customizer-menu-collapsible" class="d-flex">
                    <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
                    <div class="custom-control custom-control-primary custom-switch">
                        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch" />
                        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
                    </div>
                </div>
            </div>
            <hr />

            <!-- Layout Width -->
            <div class="customizer-footer px-2">
                <p class="font-weight-bold">Layout Width</p>
                <div class="d-flex">
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="layout-width-full" name="layoutWidth" class="custom-control-input" checked />
                        <label class="custom-control-label" for="layout-width-full">Full Width</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="layout-width-boxed" name="layoutWidth" class="custom-control-input" />
                        <label class="custom-control-label" for="layout-width-boxed">Boxed</label>
                    </div>
                </div>
            </div>
            <hr />

            <!-- Navbar -->
            <div class="customizer-navbar px-2">
                <div id="customizer-navbar-colors">
                    <p class="font-weight-bold">Navbar Color</p>
                    <ul class="list-inline unstyled-list">
                        <li class="color-box bg-white border selected" data-navbar-default=""></li>
                        <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                        <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                        <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                        <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                        <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                        <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                        <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                    </ul>
                </div>

                <p class="navbar-type-text font-weight-bold">Navbar Type</p>
                <div class="d-flex">
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="nav-type-floating" name="navType" class="custom-control-input" checked />
                        <label class="custom-control-label" for="nav-type-floating">Floating</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="nav-type-sticky" name="navType" class="custom-control-input" />
                        <label class="custom-control-label" for="nav-type-sticky">Sticky</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="nav-type-static" name="navType" class="custom-control-input" />
                        <label class="custom-control-label" for="nav-type-static">Static</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="nav-type-hidden" name="navType" class="custom-control-input" />
                        <label class="custom-control-label" for="nav-type-hidden">Hidden</label>
                    </div>
                </div>
            </div>
            <hr />
        </div>

    </div>
    <!-- End: Customizer-->


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <button class="btn btn-primary btn-icon scroll-top" type="button">
        <i data-feather="arrow-up"></i>
    </button>
    <!-- END: Footer-->

    @include('layouts.deleteModal')

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('js/core/app.min.js') }}"></script>
<script src="{{ asset('js/scripts/customizer.min.js') }}"></script>
<!-- END: Theme JS-->

<script src="{{ asset('js/functionDelete.js') }}"></script>

@yield('script')

<script>
    $(window).on('load',  function(){
        if (feather) {
            feather.replace({ width: 14, height: 14 });
        }
    })
</script>
</body>
<!-- END: Body-->
</html>
