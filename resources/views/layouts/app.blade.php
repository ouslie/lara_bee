<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Wunder - Bootstrap Material Admin Dashboard Template</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/material.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/css/wunder.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="{{ asset('assets/vendors/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <style>
        .loading {
            background: lightgrey;
            padding: 15px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            text-align: center;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }

       
        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <nav class="sidebar" data-background-color="white">
            <div class="logo">
                <a href="#" class="simple-text">
                   LaraBee
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    LB
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav flex-column">
                    <li class="nav-item">
                    <a class="nav-link active" href="{{ route('hives.index') }}">
                            <i class="material-icons">dashboard</i>
                            <p>
                                Mes ruches
                            </p>
                        </a>
                    </li>
                
                </ul>
            </div>
        </nav>
        <div class="main-panel">
            <nav class="navbar navbar-toggleable-md navbar-default navbar-absolute navbar-inverse" data-topbar-color="yellow">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular f-26">keyboard_arrow_left</i>
                        <i class="material-icons visible-on-sidebar-mini f-26">keyboard_arrow_right</i>
                    </button>
                </div>
                <div class="navbar-header d-flex">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Dashboard </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">6</span>
                                <p class="hidden-lg-up">
                                    Notifications
                                    <i class="material-icons">arrow_drop_down</i>
                                </p>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">You have 5 new messages</a>
                                <a class="dropdown-item" href="#">You're now friend with Mike</a>
                                <a class="dropdown-item" href="#">Wish Mary on her birthday!</a>
                                <a class="dropdown-item" href="#">5 warnings in Server Console</a>
                                <a class="dropdown-item" href="#">Jane completed 'Induction Training'</a>
                                <a class="dropdown-item" href="#">'Prepare Marketing Report' is overdue</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#pablo" class="nav-link" data-toggle="dropdown">
                                <i class="material-icons">apps</i>
                                <p class="hidden-lg-up">Apps</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#pablo" class="nav-link" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg-up">Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#pablo" class="nav-link" data-toggle="dropdown">
                                <i class="material-icons">settings</i>
                                <p class="hidden-lg-up">Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="material-icons">power_settings_new</i>
                                <p class="hidden-lg-up">power</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg-up"></li>
                    </ul>
                </div>
            </nav>
            <div class="content">
                <div id="app">
                    @yield('content')
                </div>
            </div>
            <footer class="footer ">
                <div class="container ">
                    <nav class="float-left ">
                        <ul>
                            <li>
                                <a href="# ">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="# ">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="# ">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="# ">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright float-right ">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())

                        </script>
                        <a href="# ">Wunder</a> BootStrap Admin Dashboard
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>

<!--   Core JS Files   -->
<script src="{{ asset('assets/vendors/jquery-3.1.1.min.js') }}" type="text/javascript "></script>
<script src="{{ asset('assets/vendors/jquery-ui.min.js') }}" type="text/javascript "></script>
<script src="{{ asset('assets/vendors/tether.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrap.min.js') }} " type="text/javascript "></script>
<script src="{{ asset('assets/vendors/perfect-scrollbar.jquery.min.js') }} " type="text/javascript "></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('assets/vendors/jquery.validate.min.js') }} "></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('assets/vendors/moment.min.js') }} "></script>
<!--  Charts Plugin -->
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.resize.js') }} "></script>
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.pie.js') }} "></script>
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.stack.js') }} "></script>
<script src="{{ asset('assets/vendors/charts/flot/jquery.flot.categories.js') }} "></script>
<script src="{{ asset('assets/vendors/charts/chartjs/Chart.min.js') }} " type="text/javascript "></script>


<!--  DataTables.net Plugin    -->

<script src="{{ asset('assets/vendors/datatable/dataTables.bootstrap4.js') }} "></script>
<script src="{{ asset('assets/vendors/datatable/jquery.dataTables.min.js') }} "></script>


<!--  Plugin for the Wizard -->
<script src="{{ asset('assets/vendors/jquery.bootstrap-wizard.js') }} "></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/vendors/bootstrap-notify.js') }} "></script>
<!-- DateTimePicker Plugin -->
<script src="{{ asset('assets/vendors/bootstrap-datetimepicker.js') }} "></script>
<!-- Vector Map plugin -->
<script src="{{ asset('assets/vendors/jquery-jvectormap.js') }} "></script>
<!-- Sliders Plugin -->
<script src="{{ asset('assets/vendors/nouislider.min.js') }} "></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="{{ asset('assets/vendors/jquery.select-bootstrap.js') }} "></script>
<!--  DataTables.net Plugin    -->
<script src="../../assets/vendors/datatable/jquery.dataTables.min.js"></script>
<script src="../../assets/vendors/datatable/dataTables.bootstrap4.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('assets/vendors/sweetalert/sweetalert2.min.js') }}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('assets/vendors/jasny-bootstrap.min.js') }} "></script>
<!--  Full Calendar Plugin    -->
<script src="{{ asset('assets/vendors/fullcalendar.min.js') }} "></script>
<!-- TagsInput Plugin -->
<script src="{{ asset('assets/vendors/jquery.tagsinput.js') }} "></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('assets/js/wunder.min.js') }} "></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/demo.js') }} "></script>
<script src="{{ asset('assets/js/charts/flot-charts.min.js') }} "></script>
<script src="{{ asset('assets/js/charts/chartjs-charts.min.js') }} "></script>



</html>
