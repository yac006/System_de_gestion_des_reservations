<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
        <a class="navbar-brand w-100 mr-0" style="line-height: 25px;">
        <div class="d-table m-auto logo_cont">
            <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px; margin-left: -12px;" src="{{asset('images/shards-dashboards-logo.svg')}}" alt="Shards Dashboard">
            <span id="logo" class="d-none d-md-inline ml-1" style="font-weight: bold;font-size: 20px;">SGR-BL</span>
        </div>           
        </a>
        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
        </a>
    </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
    <div class="input-group input-group-seamless ml-3">
        <div class="input-group-prepend">
        <div class="input-group-text">
            <i class="fas fa-search"></i>
        </div>
        </div>
        <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
    </form>
    <div class="nav-wrapper">
    <ul class="nav flex-column">
        <div class="cont_user_img">
        <img src="{{ asset($arr_data['all_fields_user']->avatar_path) }}" class="rounded-circle">
        {{-- <span class="spn_user">{{ $arr_data['name'] }}</span> --}}
        </div>
        <li class="nav-item accueil_link" style="border-top: 1px solid #e1e5eb">
            <a class="nav-link accueil_a" href="{{ route('multiPages' , $param = "accueil")}}">                    
                <i class="zmdi zmdi-home zmdi-hc-5x " style="color:#c3c7cc; font-size: 18px;margin-top: -3px;"></i>
                <span>Accueil</span>
            </a>
        </li>
            <li class="nav-item pln_salles_link">
            <a class="nav-link pln_salles_a" href="{{ route('multiPages' , $param = "Planifications") }}" >
                <i class="zmdi zmdi-calendar-note zmdi-hc-5x " style="color:#c3c7cc; font-size: 18px;margin-top: -2px;"></i>
                <span>Planifications</span>
            </a>
        </li>
        {{-- <li class="nav-item suivi_rsv_link">
        <a class="nav-link " href="{{ route('multiPages' , $param = "suivi_rsv") }}">
            <i class="zmdi zmdi-assignment-o zmdi-hc-5x " style="color:#c3c7cc; font-size: 18px;"></i>
            <span>Suivi des Réservations</span>
        </a>
        </li> --}}
        <li class="nav-item contact_link">
            <a class="nav-link " href="{{ route('multiPages' , $param = "contact") }}">
                <i class="zmdi zmdi-email zmdi-hc-5x " style="color:#c3c7cc; font-size: 18px;"></i>
                <span>Contact &amp; Email</span>
            </a>
        </li>
        <li class="nav-item admin_link">
            <a class="nav-link administration_a" href="{{ route('multiPages' , $param = "administration") }}">
                <i class="zmdi zmdi-accounts zmdi-hc-5x " style="color:#c3c7cc; font-size: 18px;"></i>
                <span>Administration</span>
            </a>
        </li>
        <li class="nav-item param_link">
            @php
                serialize($param = ['param' => "réservation" , 'id_role' => $arr_data['id_role']]);
            @endphp
            <a class="nav-link reservation_a" href="{{ route('multiPages' , $param ) }}">
                <i class="zmdi zmdi-collection-plus zmdi-hc-5x " style="color:#c3c7cc; font-size: 18px;"></i>
                <span>Réservations</span>
            </a>
        </li>
        <li class="nav-item param_link">
            @php
                serialize($param = ['param' => "Demandes" , 'id_role' => $arr_data['id_role']]);
            @endphp
            <a class="nav-link validations_a" href="{{ route('multiPages' , $param ) }}">
                <i class="zmdi zmdi-shield-check zmdi-hc-5x " style="color:#c3c7cc; font-size: 18px;"></i>
                <span>Demandes</span>
            </a>
        </li>

        <li class="nav-item param_link gst_emp_li" hidden>
            @php
                serialize($param = ['param' => "gst_employes" , 'id_role' => $arr_data['id_role']]);
            @endphp
            <a class="nav-link gst_employes_a" href="{{ route('multiPages' , $param ) }}">
                <i class="zmdi zmdi-account-box zmdi-hc-5x" style="color:#c3c7cc; font-size: 18px;"></i>
                <span>Gestion employées</span>
            </a>
        </li>
        
        <li class="nav-item param_link gst_sal_li" hidden>
            @php
                serialize($param = ['param' => "gst_salles" , 'id_role' => $arr_data['id_role']]);
            @endphp
            <a class="nav-link gst_salle_a" href="{{ route('multiPages' , $param ) }}">
                <i class="zmdi zmdi-layers zmdi-hc-5x " style="color:#c3c7cc; font-size: 18px;"></i>
                <span>Gestion salles</span>
            </a>
        </li>
        <li class="nav-item param_link gst_vehc_li" hidden>
            @php
                serialize($param = ['param' => "gst_vehicules" , 'id_role' => $arr_data['id_role']]);
            @endphp
            <a class="nav-link gst_vehc_a" href="{{ route('multiPages' , $param ) }}">
                <i class="zmdi zmdi-car zmdi-hc-5x " style="color:#c3c7cc; font-size: 18px;"></i>
                <span>Gestion vehicules</span>
            </a>
        </li>
        
        
        <a href="#" id="show_other_elements_icon"><i class="zmdi zmdi-unfold-more zmdi-hc-2x  animated infinite pulse"></i></a>
        
    </ul>
    </div>
</aside>

@section('sidebar_script')
    <script>

        var status = "close";
        
        $("#show_other_elements_icon").click(function(){
            //Si l'etat de la list = close
            if (status == "close") {//ouvrir la list
                $(".cont_user_img img").prop('hidden' , true);
                $(".cont_user_img").animate({height: '0px', padding: '0'});
                
                $(".main-sidebar ul li").prop('hidden' , false);
                status = "open";

             //Si l'etat de la list = open
            }else{//Fermer la list
                $(".cont_user_img").animate({height: '170px', padding: '28px auto 10px'}, function(){

                    $(".cont_user_img img").prop('hidden' , false);
                    $(".gst_emp_li , .gst_sal_li , .gst_vehc_li").prop('hidden' , true);
                });
                status = "close";
            }
                
        });

    </script>
@endsection