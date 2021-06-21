<!doctype html>
<html lang="en">

<head>
    <title>:: Lucid H :: Table Normal</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset ('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('public/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('public/assets/vendor/animate-css/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('public/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('public/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('public/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('public/assets/vendor/sweetalert/sweetalert.css') }}"/>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset ('public/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset ('public/assets/css/color_skins.css') }}">
    <style>
        td.details-control {
            background: url("{{ asset ('public/assets/images/details_open.png') }}") no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url("{{ asset ('public/assets/images/details_close.png') }}") no-repeat center center;
        }
    </style>
</head>
<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset ('public/assets/images/logo-icon.svg')}}" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.html"><img src="{{ asset ('public/assets/images/logo.svg')}}" alt="Lucid Logo" class="img-responsive logo"></a>
            </div>

            <div class="navbar-right">
                <form id="navbar-search" class="navbar-form search-form">
                    <input value="" class="form-control" placeholder="Search here..." type="text">
                    <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                </form>

                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <div class="user-account margin-0">
                                <div class="dropdown mt-0">
                                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                                        <img src="{{ asset ('public/assets/images/user.png')}}" class="rounded-circle user-photo" alt="User Profile Picture">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right account">
                                        <li>
                                            <span>Welcome,</span>
                                            <strong>Alizee Thomas</strong>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="navbar-btn">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                    <i class="lnr lnr-menu fa fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>


    @yield('content')

</div>

<script src="{{ asset ('public/assets/bundles/datatablescripts.bundle.js') }}"></script>

<!-- Javascript -->

<script src="{{ asset ('public/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset ('public/assets/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset ('public/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset ('public/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset ('public/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset ('public/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset ('public/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset ('public/assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>

<script src="{{ asset ('public/assets/vendor/sweetalert/sweetalert.min.js') }}"></script> <!-- SweetAlert Plugin Js -->


<script src="{{ asset ('public/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset ('public/assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset ('public/assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
@yield('script')
</body>
</html>
