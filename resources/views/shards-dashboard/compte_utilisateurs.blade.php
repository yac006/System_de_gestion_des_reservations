
@extends('layouts.compte_utl_master')


@section('content')
        <?php  $arr_data = Session::get(Session::get('user_email'))  ?>

        <!--Verification l'etat du compte actif/inactif -->
        @if ($arr_data['actif'] == 0) 
            <script>  
                  $(document).ready(function(){
                      $("#jumbotronModal").modal('show');
                  })
            </script>
        @else
            <script>  
                  $(document).ready(function(){
                      $("#jumbotronModal").modal('hide');
                  })
            </script>
        @endif

        <!-- NavBar -->
        <nav class="navbar navbar-dark bg-primary">
            <div class="nav_header">
                <div class="logo_cont">
                    <img src="images/img/11005.png" class="img-fluid rounded" alt="Responsive image" width="60%"  style="position: relative; top:-1px; height: 46px;">
                </div>
                <div class="search_cont">      
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </div>
                <div class="notif_cont">
                    <ul>
                      <li><i class="zmdi zmdi-email zmdi-hc-2x hvr-grow" style="color:#c3c7cc;"></i></li>
                      <li><i class="zmdi zmdi-notifications zmdi-hc-2x hvr-grow" style="color:#c3c7cc;"></i></li>
                      <li><i class="zmdi zmdi-settings-square zmdi-hc-2x hvr-grow" style="color:#c3c7cc;"></i></li>

                    </ul>
                </div>
            </div>
        </nav> 

        <!-- Main container  -->             
        <div class="main_cont">
              <!--  @include('../pages/Circle_Menu') -->
              @include('../pages/simple_menu') 
        </div> 
        <!-- Main container Ends -->
      
              
        

        <!------------------- Modals Container --------------------->

            {{-- Modal Réservation --}}
            <div class="modal fade" id="exampleModal_rsv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle réservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="nom_expidéteur" class="col-form-label">Nom & Prénom</label>
                        <input type="text" class="form-control" id="nom_expidéteur">
                      </div>
                      <div class="form-group">
                        <label for="tp_réservation" class="col-form-label">Type de réservation</label>
                        <select class="form-control" id="tp_réservation" name="type_rsv">
                          <option>Salle</option>
                          <option>Vehicule</option>
                      </select>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_envoyer" class="btn btn-primary">Envoyer</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- Modal Jumbotron --}}
            <div class="modal fade bd-example-modal-lg" id="jumbotronModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-lg" style="top: 40px">
                <div class="modal-content">
                      <!-- Jumbotron -->
                      <div class="jumbotron" style="margin-bottom: 8px">
                        <h1 class="display-4">Compte, Inactif !</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button" >Contact</a>
                      </div>
                </div>
              </div>
            </div>
        <!------------------- Modals container Ends --------------------->        

        
          <!-- Profile container  -->
        <div class="col-lg-4 cont_profile">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="{{ asset($arr_data['all_fields_user']['avatar_path']) }}" alt="User Avatar" width="110"> </div>
                    <h4 id="h4_user_name" class="mb-0">{{ $arr_data['name'] }}</h4>
                    <span class="text-muted d-block mb-2">Project Manager</span>
                    <a href="{{ route('logout') }}" type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2"> 
                      <i class="material-icons mr-1">input</i>Logout</a>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">Workload</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                            <span class="progress-value">74%</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span style="font-size: 15px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda </span>
                    </li>
                  </ul>
                </div>
        </div>


        <!-- Featured container -->
        {{-- <div class="Featured_cont">
                <div class="card text-center">
                    <div class="card-header">
                      Featured
                    </div>
                    <div class="card-body">
                      <!-- <h5 class="card-title">Special title treatment</h5> -->
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                    <div class="card-footer text-muted">
                      2 days ago
                    </div>
                </div>
        </div>      --}}
        <!-- Featured container ends  -->  

@endsection


<!-- --------  JQuery and Ajax Script -------- -->
@section('jquery_ajax_script')
      <script>
          $(document).ready(function(){

                      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                                    
                       //si le button Envoyer a été cliquer 
                      $('#btn_envoyer').click(function(){
                              let titre = $("#titre").val();
                              let type_rsv = $("#tp_réservation").val();
                              let user_name = $("#h4_user_name").text();  
                              
                              $.ajax({
                                      method: 'POST' ,
                                      url: 'sendNotif' ,
                                      data: {
                                              titre : titre ,
                                              type_rsv : type_rsv ,
                                              user_name : user_name 
                                            } ,
                                      success: function (){ 
                                            swal.fire({
                                                        title : "Envoyer" ,
                                                        text : "La demande a été envoyer avec succée ....",
                                                        icon : "success",                                       
                                                      });
                                            $("#exampleModal_rsv").modal('hide');
                                      },
                                      error: function (){
                                              alert("Error Ajax !!!");
                                      }
                              });
                      });                  

          });    
      </script>
@endsection



    
