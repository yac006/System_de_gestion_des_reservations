<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('bootstrap_4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/auth_views/admin_panel_style.css')}}">

</head>
<body>

    @yield('content')
    

    <script src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('bootstrap_4/bootstrap.min.js')}}"></script>
    @yield('jqry_ajax_script')
</body>
</html>