<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shards Dashboard Lite</title>
    <meta name="description" content="A high-quality &amp; ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 4.1.3 -->
    <link rel="stylesheet" href="{{ asset("bootstrap_4/bootstrap.min.css") }}">
    <!-- Fonts -->
    {{-- <link href="{{asset('styles\css\lib\font_awesome_v5.0.6/all.css')}}" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}

    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('styles/shards-dashboards.1.1.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/extras.1.1.0.min.css')}}">
    <!-- iconic-font CSS-->
    <link href="{{asset('styles/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all"> 
    <!-- Hover css -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/lib/hover-min.css')}}">
    <!-- Sweetalert theme bootstrap-4 -->
    <link rel="stylesheet" href="{{asset('sweetalert2/css-sweetalert-theme-bootstrap-4/bootstrap-4.css')}}">
    <!-- Full calendar Css -->
    <link href='{{ asset('full_calendar_lib/main.css') }}' rel='stylesheet' /> 
    <!--Full calendar Style file-->
    <link rel="stylesheet" href="{{asset('styles/css/full_calendar_style/style.css')}}">

    <!---admin_panel Css file -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/index_style.css')}}">
</head>

<body class="h-100">




            @yield('content')
            









    <!-- Jquery 3.6.0 -->
    <script type="text/javascript" src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap 4.1.3 js -->
    <script src="{{ asset("bootstrap_4/bootstrap.min.js") }}"></script>
    <!-- app js file -->
    <script src="{{ asset("js/app.js") }}"></script>
    <!-- Sweetalert js -->
    <script src="{{asset('sweetalert2/sweetalert2.js')}}"></script>
    <!-- js file -->
    <script src="{{asset('scripts/js/index.js')}}"></script>
    <!-- Full calendar Js -->
    <script src='{{ asset('full_calendar_lib/main.js') }}'></script>

    <!-- -------- Ajax Script -------- -->
    @yield('ajax_script')
    <!-- ---- Full calendar Script ---- -->
    <script src="{{ asset('full_calendar_lib/full_calendar_script.js')}} "></script>
    @yield('full_calendar_script')


    <!-- ---------- CDN to Local----------- -->         
    <script async defer src="{{ asset('scripts/cdn_to_local/buttons.js') }}"></script>
    <script src="{{ asset('scripts/cdn_to_local/popper.min.js') }}" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ asset('scripts/cdn_to_local/shards.min.js')}}"></script>
    <script src="{{ asset('scripts/cdn_to_local/jquery.sharrre.min.js')}}"></script>  
    <script src="{{ asset('scripts/cdn_to_local/Chart.min.js')}}"></script> 
    
    <!-- local links -->  
    <script src="{{asset('scripts/extras.1.1.0.min.js')}}"></script>
    <script src="{{asset('scripts/shards-dashboards.1.1.0.min.js')}}"></script>
    {{-- <script src="{{asset('scripts/app/app-blog-overview.1.1.0.js')}}"></script> --}}



</body>
</html>