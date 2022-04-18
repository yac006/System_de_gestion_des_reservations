<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	

    <!-- Bootstrap 4.1.3 -->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap_4/bootstrap.min.css')}}">



    <!-- Sweet Alert2 css-->
    <link rel="stylesheet" href="{{ asset('sweet_alert2/sweetalert2.min.css') }}">

    
</head>
<body>
        
        @yield('content')
        
        

        <!-- JQuery -->
        <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>

        <!-- bootstrap 4 Js -->
        <script src="{{asset('bootstrap_4/bootstrap.min.js')}}"></script>

       

        <!-- Sweet Alert2-->
        <script src="{{ asset('sweet_alert2/sweetalert2.min.js') }}"></script>
        
        

        
</body>
</html>


