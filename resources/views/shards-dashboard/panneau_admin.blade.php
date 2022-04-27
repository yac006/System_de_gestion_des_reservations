
@extends('../layouts/pan_admin_master')



@section('content')
<!-- Stockage des données de la session d'utilisateur dans la variable "arr_data" -->
<?php  $arr_data = Session::get(Session::get('user_email'))  ?>

    {{-- <div class="color-switcher animated">
        <h5>Accent Color</h5>
        <ul class="accent-colors">
          <li class="accent-primary active" data-color="primary">
            <i class="material-icons">check</i>
          </li>
          <li class="accent-secondary" data-color="secondary">
            <i class="material-icons">check</i>
          </li>
          <li class="accent-success" data-color="success">
            <i class="material-icons">check</i>
          </li>
          <li class="accent-info" data-color="info">
            <i class="material-icons">check</i>
          </li>
          <li class="accent-warning" data-color="warning">
            <i class="material-icons">check</i>
          </li>
          <li class="accent-danger" data-color="danger">
            <i class="material-icons">check</i>
          </li>
        </ul>
        <div class="actions mb-4">
          <a class="mb-2 btn btn-sm btn-primary w-100 d-table mx-auto extra-action" href="#">
            <i class="material-icons">cloud</i> Download</a>
          <a class="mb-2 btn btn-sm btn-white w-100 d-table mx-auto extra-action" href="#">
            <i class="material-icons">book</i> Documentation</a>
        </div>
        <div class="social-wrapper">
          <div class="social-actions">
            <h5 class="my-2">Help us Grow</h5>
            <div class="inner-wrapper">
              <a class="github-button" href="#" data-icon="octicon-star" data-show-count="true" aria-label="Star DesignRevision/shards-dashboard on GitHub">Star</a>
              <!-- <iframe style="width: 91px; height: 21px;"src="https://yvoschaap.com/producthunt/counter.html#href=https%3A%2F%2Fwww.producthunt.com%2Fr%2Fp%2F112998&layout=wide" width="56" height="65" scrolling="no" frameborder="0" allowtransparency="true"></iframe> -->
            </div>
          </div>
          <div id="social-share" data-url="#" data-text="🔥 Check out Shards Dashboard Lite, a free and beautiful Bootstrap 4 admin dashboard template!" data-title="share"></div>
          <div class="loading-overlay">
            <div class="spinner"></div>
          </div>
        </div>
        <div class="close">
          <i class="material-icons">close</i>
        </div>
      <div class="color-switcher-toggle animated pulse infinite">
        <i class="material-icons">settings</i>
      </div>
    </div> --}}

      <div class="container-fluid">
        <div class="row">
          <!-- Main Sidebar -->
          <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
            <div class="main-navbar">
              <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                  <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{asset('images/shards-dashboards-logo.svg')}}" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">Shards Dashboard</span>
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
                  <img src="{{ asset('images/avatars/1.jpg') }}" class="rounded-circle">
                  {{-- <span class="spn_user">{{ $arr_data['name'] }}</span> --}}
                </div>
                <li class="nav-item accueil_link" style="border-top: 1px solid #e1e5eb">
                  <a class="nav-link accueil_a" href="{{ route('multiPages' , $param = "accueil")}}">                    
                    <i class="material-icons">home</i>
                    <span>Accueil</span>
                  </a>
                </li>
                <li class="nav-item pln_salles_link">
                  <a class="nav-link pln_salles_a" href="{{ route('multiPages' , $param = "pln_salles") }}" >
                    <i class="material-icons">date_range</i>
                    <span>Planning de Salles</span>
                  </a>
                </li>
                <li class="nav-item suivi_rsv_link">
                  <a class="nav-link " href="">
                    <i class="material-icons">vertical_split</i>
                    <span>Suivi des Réservations</span>
                  </a>
                </li>
                <li class="nav-item contact_link">
                  <a class="nav-link " href="">
                    <i class="material-icons">mail</i>
                    <span>Contact &amp; Email</span>
                  </a>
                </li>
                <li class="nav-item admin_link">
                  <a class="nav-link " href="">
                    <i class="material-icons">person</i>
                    <span>Administration</span>
                  </a>
                </li>
                <li class="nav-item param_link">
                  <a class="nav-link " href="">
                    <i class="material-icons">settings</i>
                    <span>Paramètres</span>
                  </a>
                </li>
              </ul>
            </div>
          </aside>
          <!-- End Main Sidebar -->
  
          <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <!-- Main Navbar -->
            <div class="main-navbar sticky-top bg-white">
              <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                <!-- Search form -->
              <div class="input-group">
                    <div class="form-group has-search">
                        <i class="form-control-feedback material-icons" style="top:6px">search</i>
                        <input type="text" class="form-control" placeholder="Search" style="border-radius: 15px;">
                    </div>
              </div>  
                <!-- <form action="" method="" class="search_form">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form> -->
                <ul class="navbar-nav border-left flex-row ">
                  <!-- li 01 -->
                  <li class="nav-item border-right dropdown notifications">
                    <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="nav-link-icon__wrapper">
                        <i class="zmdi zmdi-email" style="color:#c3c7cc; font-size: 1.4925rem; margin-top: -3px;"></i>
                        <span hidden class="badge badge-pill badge-danger"></span>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">
                        <div class="notification__icon-wrapper">
                          <div class="notification__icon">
                            <i class="material-icons">&#xE6E1;</i>
                          </div>
                        </div>
                        <div class="notification__content">
                          <span class="notification__category">Analytics</span>
                          <p>Your website’s active users count increased by
                            <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
                        </div>
                      </a>
                      <a class="dropdown-item" href="#">
                        <div class="notification__icon-wrapper">
                          <div class="notification__icon">
                            <i class="material-icons">&#xE8D1;</i>
                          </div>
                        </div>
                        <div class="notification__content">
                          <span class="notification__category">Sales</span>
                          <p>Last week your store’s sales count decreased by
                            <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                        </div>
                      </a>
                      <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                    </div>
                  </li>
                  <!-- end li 01 -->
  
                  <!-- li 02 -->
                  <li class="nav-item border-right dropdown notifications principale_li">
                    <a class="nav-link nav-link-icon text-center notif_btn" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="nav-link-icon__wrapper">
                        <i class="material-icons">&#xE7F4;</i>
                        <span id="notif_badge" class="badge badge-pill badge-danger"></span>
                      </div>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-small li_cont" aria-labelledby="dropdownMenuLink" style="max-height: 567px; overflow:auto;">
                      <!-- first Notif  -->
                      {{-- @foreach( $arr_data['all_fields_user']['notifications']  as $notif)
                          <a class="dropdown-item" id="notif_item"  data-toggle="modal" data-target="" data-whatever="@mdo">
                            <div class="notification__icon-wrapper">
                              <div class="notification__icon">
                                <i class="material-icons">&#xE6E1;</i>
                              </div>
                            </div>
                            <div class="notification__content">
                              <span class="notification__category">{{ $notif->data['nom_expd'] }}</span>  
                              <p>Vous avez reçue une demande par<span class="text-success text-semibold">{{ $notif->data['nom_expd'] }}</span> pour une réservation d'une salle</p> 
                            </div>
                          </a>
                      @endforeach --}}
                      <!-- first Notif Ends -->
                      
                      {{-- <button id="view_all_ntf_btn" class="dropdown-item notification__all text-center" data-toggle="modal" data-target="#all_notif_modal" data-whatever="@mdo"> View all Notifications </button> --}}
                    </div>
                  </li>
                  <!-- end li 02 -->
  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-nowrap px-3" id="img_cont" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      <img class="user-avatar rounded-circle mr-2" src="{{ asset('images/avatars/1.jpg') }}" alt="User Avatar">
                      <span class="d-none d-md-inline-block">{{ $arr_data['name'] }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small">
                      <a class="dropdown-item" href="user-profile-lite.html">
                        <i class="material-icons">&#xE7FD;</i> Profile</a>
                      <a class="dropdown-item" href="components-blog-posts.html">
                        <i class="material-icons">vertical_split</i> Blog Posts</a>
                      <a class="dropdown-item" href="add-new-post.html">
                        <i class="material-icons">note_add</i> Add New Post</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="{{ route('logout')}}">
                        <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                    </div>
                  </li>
                </ul>
                <nav class="nav">
                  <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                    <i class="material-icons">&#xE5D2;</i>
                  </a>
                </nav>
              </nav>
            </div>
            <!-- / .main-navbar ends-->
  
  
            <!-- ----- Models ----- -->
            <!-- Model qui affiche la list de tout les notifications --> 
            <div class="modal fade" id="all_notif_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document" style="left:124px">
                <div class="modal-content">
                  <div class="modal-header" >
                    <h6 class="modal-title " id="exampleModalLabel">Liste des Notifications</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                  
                  <div class="modal-body principle_cont" style="padding: 0"><!-- body -->
                      <!-- Discussions Component -->
                      {{-- @foreach ($arr_data['all_fields_user']['notifications'] as $notif)  --}}
                        {{-- <div class="col-md-12 col-sm-12" style="padding:0">
                              <div class="card card-small blog-comments notif_box">
                                <div class="card-body p-0">                                                     
                                    <div class="blog-comments__item d-flex p-3">
                                      <div class="blog-comments__avatar mr-3">
                                        <img src="{{ asset('images/avatars/1.jpg') }}" alt="User avatar" /> 
                                      </div>
                                      <div class="blog-comments__content">
                                        <div class="blog-comments__meta text-muted">
                                          <a class="text-secondary" href="#" >{{ $notif->data['nom_expd'] }}</a> a été demander une réservation d'une
                                          <a class="text-secondary" href="#">{{ $notif->data['type'] }}</a>
                                          <span class="text-muted">– 3 days ago</span>
                                        </div>
                                        <p class="m-0 my-1 mb-2 text-muted"></p>
                                                      <!---->
                                        <div class="blog-comments__actions">
                                          <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-white">
                                              <span class="text-success">
                                                <i class="material-icons">check</i>
                                              </span> valider </button>
                                            <button type="button" class="btn btn-white">
                                              <span class="text-danger">
                                                <i class="material-icons">clear</i>
                                              </span> Supprimer </button>
                                            <button type="button" class="btn btn-white">
                                              <span class="text-light">
                                                <i class="material-icons">more_vert</i>
                                              </span> voir </button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                        </div> --}}
                      {{-- @endforeach   --}}
                        <!-- End Discussions Component -->
                  </div><!------->
                  <div class="modal-footer" style="padding:5px">
                  
                  </div>
                </div>
              </div>
            </div><!-- Model ends --> 
  
            <!-- Model qui affiche les informations de la demande de rsv -->
            <div class="modal fade" id="Modal_show_rsv_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div><!-- Model ends -->
            <!-- --- Models ends --- -->

            <!-- ***** content-container ***** -->
            <div class="main-content-container container-fluid px-4">
                @if (Session::has('dashboard') or Session::has('pln_salle'))
                      @includeWhen(Session::get('dashboard') , '../pages.dashboard')
                      @includeWhen(Session::get('pln_salle') , '../pages.planning_salles')
                @else
                      @includeWhen($dashboard = true , '../pages.dashboard')
                @endif

                {{-- {{ dd(Session::all()) }} --}}
                
            </div>
            <!-- ***** content-container ends ***** -->
            
            <footer class="main-footer d-flex p-2 px-3 bg-white border-top" style="height: 2.50rem; font-size:13px">
              <span class="copyright ml-auto my-auto mr-2">Copyright © 2018
                <a href="https://designrevision.com" rel="nofollow">DesignRevision</a>
              </span>
            </footer>
          </main>
        </div>
      </div>
@endsection

@section('ajax_script')
<script>
    
    $(document).ready(function(){

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

            //afficher dans le badge le nombre de notification non lue "without click in notif icon"
            let user_id = {{ $arr_data['id'] }} ;
            $.ajax({
                      method: 'GET' ,
                      url: 'showNotifBadge' ,
                      data: {user_id: user_id} ,
                      success: function (number_notif){                            
                          if (number_notif > 0) {
                            $("#notif_badge").show();
                            $("#notif_badge").text(number_notif);
                          }  
                      },
                      error: function (){
                              alert("Error Ajax !!!");
                      }
                    });
            
            
            //si l'icon notification a été cliquer 
            $('.notif_btn').click(function(){
                    
                    let user_id = {{$arr_data['id']}} ;                               

                    $.ajax({
                            method: 'GET' ,
                            url: 'markAsRead' ,
                            data: { user_id : user_id } ,

                            success: function (data){
                                //Cacher le badge                        
                                $("#notif_badge").hide();

                                //console.log(data);  
                                var new_arr = [];

                                for (let i = 0; i < data.length; i++) {
                                  
                                  let objects = JSON.parse(data[i]['data']); 

                                  new_arr.push(objects);
                                }; 
                                //console.log(new_arr);
                                $(".li_cont").empty(); //vider la list 

                                $.each( new_arr ,function(key,value){

                                        $(".li_cont").prepend('<a class="dropdown-item" id="notif_item"  data-toggle="modal" data-target="" data-whatever="@mdo"><div class="notification__icon-wrapper"><div class="notification__icon"><i class="material-icons">&#xE6E1;</i></div></div><div class="notification__content"><span class="notification__category">'+value.nom_expd+'</span><p>Vous avez reçue une demande par <span class="text-success text-semibold">'+value.nom_expd+'</span> pour une réservation d une salle</p></div></a>');
                                });

                                $(".li_cont").append('<button id="view_all_ntf_btn" class="dropdown-item notification__all text-center" data-toggle="modal" data-target="#all_notif_modal" data-whatever="@mdo"> View all Notifications </button>');
                                
                            },
                            error: function (){
                                alert("Error Ajax !!!");
                            }
                    });
            });

            

            //si le button view all notifications a été cliquer 
            $('#view_all_ntf_btn').click(function(){
              let user_id = {{ $arr_data['id'] }} ;
              $.ajax({
                      method: 'GET' ,
                      url: 'retriveAllNotif' ,
                      data: {user_id: user_id} ,
                      success: function (data){
                          alert(data);
                          var new_arr = [];
                          for (let i = 0; i < data.length; i++) {
                            
                            let objects = JSON.parse(data[i]['data']); 
                            new_arr.push(objects);
                          };
                          
                          $(".principle_cont").empty(); //vider la list

                          $.each( new_arr ,function(key,value){

                            $(".principle_cont").prepend('<div class="col-md-12 col-sm-12" style="padding:0"><div class="card card-small blog-comments notif_box"><div class="card-body p-0"><div class="blog-comments__item d-flex p-3"><div class="blog-comments__avatar mr-3"><img src="{{ asset('images/avatars/1.jpg') }}" alt="User avatar" /></div><div class="blog-comments__content"><div class="blog-comments__meta text-muted"><a class="text-secondary" href="#" >'+value.nom_expd+'</a> a été demander une réservation d une <a class="text-secondary" href="#">'+value.type+'</a><span class="text-muted">– 3 days ago</span></div><p class="m-0 my-1 mb-2 text-muted"></p><div class="blog-comments__actions"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-white"><span class="text-success"><i class="material-icons">check</i></span>valider</button><button type="button" class="btn btn-white"><span class="text-danger"><i class="material-icons">clear</i></span>supprimer</button><button type="button" class="btn btn-white"><span class="text-light"><i class="material-icons">more_vert</i></span>voir</button></div></div></div></div></div></div></div>');
                          });


                      },
                      error: function (){
                              alert("Error Ajax !!!");
                      }
                    });
            });            
        });
</script>           

    
@endsection























    

