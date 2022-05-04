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
</head>
<body>


        @yield('content')




    <!-- Jquery 3.6.0 -->
    <script type="text/javascript" src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>            
    <!-- Bootstrap 4.1.3 js -->
    <script src="{{ asset("bootstrap_4/bootstrap.min.js") }}"></script>
    <!-- Sweetalert js -->
    <script src="{{asset('sweetalert2/sweetalert2.js')}}"></script>
    <!-- Github Buttons  --> 
    <script async defer src="https://buttons.github.io/buttons.js"></script>  
    <!-- JS File -->
    <script type="text/javascript" src="{{asset('scripts/js/users_account.js')}}"></script>
    <!-- AJAX Script -->
    @yield('jquery_ajax_script')
</body>
</html>