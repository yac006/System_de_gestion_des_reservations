
@extends('layouts.compte_utl_master')


@section('content')

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
            <div class="card mb-3 " id="box_one">
              <div class="card-header">Réservation</div>
                  <div class="cont_icon hvr-radial-out">
                      <i class="zmdi zmdi-calendar-note zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc;"></i>
                  </div>
            </div>
            <!--*****-->
            <div class="card mb-3" id="box_two">
              <div class="card-header">Contact</div>
                  <div class="cont_icon hvr-radial-out">
                      <i class="zmdi zmdi-email zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
                  </div>
            </div>
            <!--*****-->
            <div class="card mb-3 " id="box_three">
              <div class="card-header">Historique</div>
                  <div class="cont_icon hvr-radial-out">
                      <i class="zmdi zmdi-help-outline zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
                  </div>
            </div>
        </div> 
        <!-- Main container Ends -->
                

        <!-- Profile container  -->
        <div class="col-lg-4 cont_profile">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="images/avatars/1.jpg" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0">Sierra Brooks</h4>
                    <span class="text-muted d-block mb-2">Project Manager</span>
                    <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                      <i class="material-icons mr-1">person_add</i>Follow</button>
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
        <div class="Featured_cont">
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
        </div>     
        <!-- Featured container ends  -->  

@endsection


<!-- --------  JQuery and Ajax Script -------- -->
@section('jquery_ajax_script')
      <script>

      </script>
@endsection



    
