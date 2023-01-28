<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Panneau d'administration</title>
    <meta name="description" content="A high-quality &amp; ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 4.1.3 -->
    <link rel="stylesheet" href="{{ asset("bootstrap_4/bootstrap.min.css") }}">

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
    <!--page_administration_style -->
    <link href='{{ asset('styles/css/pages_styles/page_administration_style.css') }}' rel='stylesheet' /> 
    <!--page_planning_réservation_style -->
    <link href='{{ asset('styles/css/pages_styles/page_planning_reservations.css') }}' rel='stylesheet' /> 
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{asset('datatables.net-dt/css/jquery.dataTables.min.css')}}">
    <!-- page_demandes_style -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/pages_styles/page_demandes_style.css')}}">
    <!---admin_panel Css file -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/index_style.css')}}">
    <!-- page_historique_des_demandes_style -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/pages_styles/historique_des_demandes_style.css')}}">
    <!-- page gestion_employes style  -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/pages_styles/gest_employes_style.css')}}">
    <!-- page admins réservation style  -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/pages_styles/admin_reservations_style.css')}}">
    <!-- page dashbord style   -->
    <link rel="stylesheet" type="text/css" href="{{asset('styles/css/pages_styles/page_dashbord_style.css')}}">
    <!-- page Contact form style   -->
    <link rel="stylesheet" href="{{asset('styles/css/pages_styles/page_contact_form_style.css')}}">
    <!-- page gestion salles style   -->
    <link rel="stylesheet" href="{{asset('styles/css/pages_styles/page_gestion_salle_style.css')}}">
    <!-- page gestion vehicules style   -->
    <link rel="stylesheet" href="{{asset('styles/css/pages_styles/page_gestion_vehicules_style.css')}}">
    <!-- pdf document style style   -->
    <link rel="stylesheet" href="{{asset('styles/css/components_style/pdf_document_style.css')}}">
    <!--Waite Me css-->
    <link rel="stylesheet" href="{{asset('waitMe-gh-pages/waitMe.min.css')}}"> 
</head>

<body class="h-100">




            @yield('content')
            





    <!-- Jquery 3.6.0 -->
    <script type="text/javascript" src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap 4.1.3 js -->
    <script src="{{ asset("bootstrap_4/bootstrap.min.js") }}"></script>
    <!-- Sidebar Script -->
    @yield('sidebar_script')
    <!-- app js file -->
    <script src="{{ asset("js/app.js") }}"></script>
    <!-- Sweetalert js -->
    <script src="{{asset('sweetalert2/sweetalert2.js')}}"></script>
    <!-- js file -->
    <script src="{{asset('scripts/js/index.js')}}"></script>
    <!-- Full calendar Js -->
    <script src='{{ asset('full_calendar_lib/main.js') }}'></script>
    <!--Waite Me js-->
    <script src="{{ asset("waitMe-gh-pages/waitMe.min.js") }}"></script>
    <!-- Historique dmnd script -->
    @yield('Historique_dmnd_script')
    <!-- -------- Ajax Script -------- -->
    @yield('ajax_script')
    <!-- ---- Full calendar Script ---- -->
    <script src="{{ asset('full_calendar_lib/full_calendar_script.js')}} "></script>
    @yield('full_calendar_script')

    <!-- -- Réservation des admins script -- --> 
    @yield('admins_rsv_script')
    <!-- DataTables Js -->
    <script src='{{ asset('datatables.net-dt/js/jquery.dataTables.min.js') }}' defer></script>
    <!-- DataTables Script -->
    @yield('DataTables_script')
    <!-- Contact page Script -->
    @yield('contact_page_script')
    <!-- administration accounts script-->
    @yield('administration_accounts_script')

    <!-- canvas js -->  
    <script src="{{asset('canvas_js/jquery.canvasjs.min.js')}}"></script>
    <!-- Chart js -->  
    <script src="{{asset('chart_js_3.8.2/chart.min.js')}}"></script>

    <!-- chart_pie_script -->
    @yield('chart_pie_script')
    <!-- chart_line_script -->
    @yield('chart_line_script')



    <!-- ---------- CDN to Local----------- -->         
    {{-- <script async defer src="{{ asset('scripts/cdn_to_local/buttons.js') }}"></script>
    <script src="{{ asset('scripts/cdn_to_local/popper.min.js') }}" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ asset('scripts/cdn_to_local/shards.min.js')}}"></script>
    <script src="{{ asset('scripts/cdn_to_local/jquery.sharrre.min.js')}}"></script>   --}}

    <!-- local links -->  
    {{-- <script src="{{asset('scripts/extras.1.1.0.min.js')}}"></script> --}}

    {{-- <script src="{{ asset('scripts/cdn_to_local/Chart.min.js')}}"></script> 
    <script defer src="{{asset('scripts/app/app-blog-overview.1.1.0.js')}}"></script> 
    <script defer src="{{asset('scripts/shards-dashboards.1.1.0.min.js')}}"></script>  --}}

    



</body>
</html>