<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="A high-quality &amp; ">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>

    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('styles/shards-dashboards.1.1.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/extras.1.1.0.min.css')}}">
    

    <!-- Bootstrap 4.1.3 -->
    <link rel="stylesheet" href="{{ asset("bootstrap_4/bootstrap.min.css") }}">
    <!-- Sweetalert theme bootstrap-4 -->
    <link rel="stylesheet" href="{{asset('sweetalert2/css-sweetalert-theme-bootstrap-4/bootstrap-4.css')}}">
    <!-- Hover css -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/lib/hover-min.css')}}">
    <!-- Circle Menu -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/lib/circle_menu.css')}}">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/users_account.css')}}">
    <!-- iconic-font CSS-->
    <link href="{{asset('styles/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <!-- Full calendar Css -->
    <link href='{{ asset('full_calendar_lib/main.css') }}' rel='stylesheet' /> 
    <!--Full calendar Style file-->
    <link rel="stylesheet" href="{{asset('styles/css/full_calendar_style/style.css')}}"> 
    <!--Waite Me css-->
    <link rel="stylesheet" href="{{asset('waitMe-gh-pages/waitMe.min.css')}}"> 
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{asset('datatables.net-dt/css/jquery.dataTables.min.css')}}">

    
    <!-- Jquery 3.6.0 -->
    <script type="text/javascript" src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script> 

</head>
<body>


        @yield('content')





    <!-- Bootstrap 4.1.3 js -->
    <script src="{{ asset("bootstrap_4/bootstrap.min.js") }}"></script>
    <!-- Sweetalert js -->
    <script src="{{asset('sweetalert2/sweetalert2.js')}}"></script>
    <!-- Github Buttons  --> 
    <!--<script async defer src="https://buttons.github.io/buttons.js"></script> -->
    <!-- Full calendar Js -->
    <script src='{{ asset('full_calendar_lib/main.js') }}'></script> 
    <!-- app js file -->
    <script src="{{ asset("js/app.js") }}"></script>
    <!-- JS File -->
    <script type="text/javascript" src="{{asset('scripts/js/users_account.js')}}"></script>
    <!--Waite Me js-->
    <script src="{{ asset("waitMe-gh-pages/waitMe.min.js") }}"></script>
    <!-- AJAX Script -->
    @yield('jquery_ajax_script')
    <!-- ---- Full calendar Script ---- -->
    <script src="{{ asset('full_calendar_lib/full_calendar_script.js')}}"></script>
    @yield('full_calendar_script')
    <!-- DataTables Js -->
    <script src='{{ asset('datatables.net-dt/js/jquery.dataTables.min.js')}}' defer></script>
    <!-- Historque  des demandes jquery script-->
    @yield('DataTables_script_hstrq_dmnd')
    <!-- contact modal jquery script -->
    @yield('contact_modal_jquery_script')
</body>
</html>