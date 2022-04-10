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
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('styles/shards-dashboards.1.1.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/extras.1.1.0.min.css')}}">
    <!-- iconic-font CSS-->
    <link href="{{asset('styles/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all"> 
    <!-- Hover css -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/lib/hover-min.css')}}">
    <!--- Css file -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/index_style.css')}}">
</head>

<body class="h-100">



            @yield('content')






    <!-- Jquery 3.6.0 -->
    <script type="text/javascript" src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap 4.1.3 js -->
    <script src="{{ asset("bootstrap_4/bootstrap.min.js") }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>     --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="{{asset('scripts/extras.1.1.0.min.js')}}"></script>
    <script src="{{asset('scripts/shards-dashboards.1.1.0.min.js')}}"></script>
    <script src="{{asset('scripts/app/app-blog-overview.1.1.0.js')}}"></script>
    
    @yield('jquery_ajax_script')
</body>
</html>