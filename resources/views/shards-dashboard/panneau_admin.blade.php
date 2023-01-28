
@extends('../layouts/pan_admin_master')



@section('content')
<!-- Stockage des données de la session d'utilisateur dans la variable "arr_data" -->
@php
    $arr_data = Session::get(Session::get('user_id_var'))   
@endphp  

<!-- ------------------------------  -->
<input type="text" id="user_id_input" value="{{ $arr_data['id'] }}" hidden>
<input type="text" id="user_id_role_input" value="{{ $arr_data['id_role'] }}" hidden>
<!-- ------------------------------  -->

      <div class="container-fluid">
        <div class="row">
          <!-- Main Sidebar -->
          @include('components.main_sidebar')
          <!-- End Main Sidebar -->
  
          <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <!-- Main Navbar -->
            @include('components.main_navbar')
            <!-- / .main-navbar ends-->
  
  
            <!-- ----- *********** Models *********** ----- -->
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
                  <div class="modal-body principle_cont" style="padding: 0; max-height: 567px; overflow: auto;">
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

            <!-- Model qui affiche les information de notification --> 
            <div class="modal fade" id="Modal_show_notif_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width:648px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Détails</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" style="padding: 32px; height: 310px; margin-bottom: 12px; margin-top:-12px">
                          {{-- @include('../pages.small_table') --}}
                          <div class="card card-margin card_container">
                            {{-- <div class="card-header no-border">
                                <h5 class="card-title">Num :</h5>
                            </div> --}}
                            <div class="card-body pt-0 new_body_card">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                        <div class="widget-49-date-primary">
                                            <span class="widget-49-date-day" id="spn_day">?</span>
                                            <span class="widget-49-date-month" id="spn_month">?</span>
                                        </div>
                                        <div class="widget-49-meeting-info">
                                            <span class="widget-49-pro-title">Num demande : <span id="num_dmnd"></span></span>
                                            <span class="widget-49-meeting-time"><span id="date_dmnd"></span></span>
                                        </div>
                                    </div>
                                    <!--------- DEMANDE SALLES  ---------->
                                    <ol class="widget-49-meeting-points" id="_for_salles">
                                      <div class="row">
                                        <div class="col-md-7">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Type demande :</span><span id="type_dmnd"> ? </span></span></li>
                                        </div>
                                        <div class="col-md-5">
                                          <li class="widget-49-meeting-item" ><span><span class="chmp_style">Heur début :</span><span id="heur_d"> ? </span></span></li>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-7">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Date réservation :</span><span id="date_rsv_sal"> ? </span></span></li>
                                        </div>
                                        <div class="col-md-5">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Heur fin :</span><span id="heur_f"> ? </span></span></li>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-7">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Salle :</span><span id="salle"> ? </span></span></li>
                                        </div>
                                      </div>   
                                    </ol>
                                    <!--------- DEMANDE VEHICULES  ---------->
                                    <ol class="widget-49-meeting-points" id="_for_vehc">
                                      <div class="row">
                                        <div class="col-md-5">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Type demande :</span><span id="type_dmnd_v"> ? </span></span></li>
                                        </div>
                                        <div class="col-md-6">
                                          <li class="widget-49-meeting-item" ><span><span class="chmp_style">Date réservation :</span><span id="date_rsv_vehc"> ? </span></span></li>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-5">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Motif :</span><span id="motif"> ? </span></span></li>
                                        </div>
                                        <div class="col-md-6">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Déstination :</span><span id="dest"> ? </span></span></li>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-5">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Date départ :</span><span id="date_dep"> ? </span></span></li>
                                        </div>
                                        <div class="col-md-6">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Date estimé de retour :</span><span id="date_est_retr"> ? </span></span></li>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-5">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Heure départ :</span><span id="heure_dep"> ? </span></span></li>
                                        </div>
                                        <div class="col-md-6">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Heure retour :</span><span id="heure_retr"> ? </span></span></li>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-8">
                                          <li class="widget-49-meeting-item"><span><span class="chmp_style">Type vehicule :</span><span id="vehicule"> ? </span></span></li>
                                        </div>
                                      </div>
                                    </ol>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer modal_ftr_dmnd_info">
                    <button type="button" class="btn btn-secondary" id="btn_reject">Refuser</button>
                    <button type="button" class="btn btn-primary" id="btn_valider">Valider</button>
                  </div>
                </div>
              </div>
            </div><!-- Model ends -->

            <!-- Model qui affiche les informations de la notification de nouveau compte-->
            <div class="modal fade" id="Modal_notif_nv_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width: 635px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" style="padding: 1.175rem 2.1875rem;">
                    <table class="table">
                      <thead style="background-color: rgba(0,0,0,.03);">
                        <tr>
                          <th class="th_img_cont" scope="col"> 
                            <img 
                              id="account_img" 
                              src="" 
                              style="width: 48px; height: 48px" 
                              class="rounded-circle"/>
                          </th>
                              <th scope="col" class="title_item it_pseudo" style="line-height: 2.5"></th>
                              <th scope="col" class="title_item"></th>
                              <th scope="col" class="title_item"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- --------- -->
                        <input type="text" id="inpt_id" value="" hidden>
                        <!-- --------- -->
                        

                        <tr>
                          <th>Nom</th>
                          <td class="it_name" style="line-height: 1.5"></td>
                          <th>Prénom</th>
                          <td class="it_prenom"></td>
                        </tr>
                        <tr>
                          <th>Modifiée le</th>
                          <td class="it_update_at"></td>
                          <th>Crée le</th>
                          <td class="it_create_at"></td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td class="it_email"></td>
                          <th></th>
                          <td ></td>
                        </tr>        
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button id="_btn_refuser" type="button" class="btn btn-secondary" data-dismiss="modal">Refuser</button>
                    <button id="_btn_valider" type="button" class="btn btn-primary">Valider</button>
                  </div>
                </div>
              </div>
            </div><!-- Model ends -->

  

            <!-- --- *********** Models ends *********** --- -->



            <!-- ***** content-container ***** -->
            <div class="main-content-container container-fluid px-4">

                @if (Session::has('dashboard') or Session::has('Planifications') or Session::has('administration') or Session::has('suivi_rsv')
                or Session::has('Demandes') or Session::has('gest_employes') or Session::has('admin_rsv')
                or Session::has('gest_salles') or Session::has('gest_vehicules'))
                      @includeWhen(Session::get('dashboard') , '../pages.dashboard')
                      @includeWhen(Session::get('Planifications') , '../pages.planning_reservations')
                      @includeWhen(Session::get('administration') , '../pages.administration')
                      @includeWhen(Session::get('suivi_rsv') , '../pages.suivi_des_reservations')
                      @includeWhen(Session::get('contact') , '../pages.contact_page')
                      @includeWhen(Session::get('Demandes') , '../pages.demandes')
                      @includeWhen(Session::get('gest_employes') , '../pages.gestion_des_employées')
                      @includeWhen(Session::get('admin_rsv') , '../pages.admins_reservations')
                      @includeWhen(Session::get('gest_salles') , '../pages.gestion_salles')
                      @includeWhen(Session::get('gest_vehicules') , '../pages.gestion_vehicules')

                @else
                      @includeWhen($dashboard = true , '../pages.dashboard')
                @endif

                {{-- {{ dd(Session::all()) }} --}}
                
            </div>
            <!-- ***** content-container ends ***** -->
            
            <footer class="main-footer d-flex p-2 px-3 bg-white border-top" style="height: 2.50rem; font-size:13px">
              <span class="copyright ml-auto my-auto mr-2">Copyright © 2022
                <a href="#" rel="nofollow" style="color:orange">Ikken Yacine</a>
              </span>
            </footer>
          </main>
        </div>
      </div>
@endsection

@section('ajax_script')
<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        
    $(document).ready(function(){//*** NOTIFICATIONS CONCERNE LES DEMANDE DE RESERVATION **//

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
                  })//end ajax;
          
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
                              console.log(data);  
                              var new_arr = [];

                              for (let i = 0; i < data.length; i++) { 
                                var objects = JSON.parse(data[i]['data']);
                                objects.num_notif = JSON.parse(data[i]['num_notif']);
                                new_arr.push(objects);
                              }; 
                              //console.log(new_arr);
                              $(".li_cont").empty(); //vider la list 

                              $.each( new_arr ,function(key ,value){
                                      $(".li_cont").prepend('<a class="dropdown-item notif_item" id="'+value.num_notif+'"  data-toggle="modal" data-target="" data-whatever="@mdo"><div class="notification__icon-wrapper"><div class="notification__icon"><img style="width:20px ; height: 20px ; border-radius:30px"  src="'+value.avatar_path+'" /></div></div><div class="notification__content"><span class="notification__category">'+value.nom+' '+value.prenom+'</span><p>Vous avez reçue une demande de <span class="text-success text-semibold">'+value.nom+' '+value.prenom+'</span> pour une réservation.</p></div></a>');
                              });

                              $(".li_cont").append('<button id="view_all_ntf_btn" class="dropdown-item notification__all text-center" data-toggle="modal" data-target="#all_notif_modal" data-whatever="@mdo"> View all Notifications </button>');
                              
                          },
                          error: function (){
                              alert("Error Ajax !!!");
                          }
                  });
          });

          
          //si le button view all notifications a été cliquer 
          $('.li_cont').on('click' , '#view_all_ntf_btn' , function(){
            //alert('delegation is work ...');
            let user_id = {{ $arr_data['id'] }} ;
            $.ajax({
                    method: 'GET' ,
                    url: 'retriveAllNotif' ,
                    data: {user_id: user_id} ,
                    success: function (data){
                        //alert(data);
                        var new_arr = [];
                        for (let i = 0; i < data.length; i++) {
                          let objects = JSON.parse(data[i]['data']); 
                          new_arr.push(objects);
                        };

                        $(".principle_cont").empty(); //vider la list

                        $.each( new_arr ,function(key,value){
                          //console.log(value.avatar_path);
                          $(".principle_cont").prepend('<div class="col-md-12 col-sm-12" style="padding:0"><div class="card card-small blog-comments notif_box"><div class="card-body p-0"><div class="blog-comments__item d-flex p-3"><div class="blog-comments__avatar mr-3"><img src="'+value.avatar_path+'" alt="User avatar" /></div><div class="blog-comments__content"><div class="blog-comments__meta text-muted"><a class="text-secondary" href="#" >'+value.nom_expd+'</a> a été demander une réservation d une <a class="text-secondary" href="#">'+value.type+'</a><span class="text-muted">– 3 days ago</span></div><p class="m-0 my-1 mb-2 text-muted"></p><div class="blog-comments__actions"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-white"><span class="text-success"><i class="material-icons">check</i></span>valider</button><button type="button" class="btn btn-white"><span class="text-danger"><i class="material-icons">clear</i></span>supprimer</button><button type="button" class="btn btn-white"><span class="text-light"><i class="material-icons">more_vert</i></span>voir</button></div></div></div></div></div></div></div>');
                        });


                    },
                    error: function (){
                            alert("Error Ajax !!!");
                    }
                  });
          });  
          
          
          //si une notification a été cliquer 
          $('.li_cont').on('click' , '.notif_item' , function(){
            
                $("#Modal_show_notif_data").modal('show');

                function animation_func() {  
                    $(".card_container").css('opacity','0'); 
                    $(".card_container").css('top','-17px');
                    $(".card_container").css('left','-27px');
                    //Animation pour modal d'affichage les informations de demande 
                    $(".card_container").animate({opacity:'1' , top:'3px' , left:'0px'} , 2000);
                }
                
                animation_func(); //call func
                
                let user_id_role = $("#user_id_role_input").val(); 
                
                let notif_id = $(this).attr('id');

                //Verifier si l'admin est un chef depart
                // if (user_id_role !== 3 || user_id_role !== 5) {
                //     $(".modal_ftr_dmnd_info button").prop('disabled' , true);
                // } 
                

                //alert(notif_id);

                //Afficher les information de la demande 
                $.ajax({
                      method: 'GET' ,
                      url: 'DisplayNotifData' ,
                      data: {notif_id: notif_id} ,
                      success: function (json_data){  
                          //console.log(json_data[0]);
                          function product_month_name() {
                              var month_nbr = json_data[0]['date_rsv'].substring(5,7);
                              //var date = json_data[0]['date_rsv'];
                              let date = new Date(2022, (parseInt(month_nbr)-1), 21);//in test
                              var month_name = date.toLocaleString('en-us', { month: 'short' }); /* Jun */
                              return month_name ; 
                          }

                          function get_day() {
                              var day = json_data[0]['date_rsv'].substring(8,10);
                              return day ;
                          }

                          function random_color() {
                              let array_colors = [ '#17c671' , '#ffb400' , '#007bff'];
                              var randomItem = array_colors[Math.floor(Math.random()*array_colors.length)];
                              $("#spn_day").css('color', randomItem);
                              $("#spn_month").css('color', randomItem);
                          }

                          //alert(random_color());
                          random_color()

                          function set_data_for_sal_form() {
                              $("#spn_day").text(get_day());
                              $("#spn_month").text(product_month_name);

                              $("#num_dmnd").text(json_data[0]['num_demande']);
                              $("#date_dmnd").text(json_data[0]['date_dmnd']);
                              $("#type_dmnd").text(json_data[0]['type_dmnd']);
                              $("#date_rsv_sal").text(json_data[0]['date_rsv']);
                              $("#heur_d").text(json_data[0]['heur_d'].replace(':00.0000000',''));
                              $("#heur_f").text(json_data[0]['heur_f'].replace(':00.0000000',''));
                              $("#salle").text(json_data[0]['designation']);
                          }

                          function set_data_for_vech_form() {
                              $("#spn_day").text(get_day());
                              $("#spn_month").text(product_month_name);

                              $("#num_dmnd").text(json_data[0]['num_demande']);
                              $("#date_dmnd").text(json_data[0]['date_dmnd']);
                              $("#type_dmnd_v").text(json_data[0]['type_dmnd']);
                              $("#date_rsv_vehc").text(json_data[0]['date_rsv']);
                              $("#motif").text(json_data[0]['motif']);
                              $("#dest").text(json_data[0]['dest']);

                              $("#date_dep").text(json_data[0]['date_dep']);
                              $("#date_est_retr").text(json_data[0]['date_est_retour']);
                              $("#heure_dep").text(json_data[0]['heure_dep']);
                              $("#heure_retr").text(json_data[0]['heure_retr']);

                              $("#vehicule").text(json_data[0]['type']);
                          }


                          if (json_data[0]['type_dmnd'] == "Salles") {
                              $("#_for_vehc").hide();  
                              $("#_for_salles").show();
                                
                              set_data_for_sal_form(); //call func
                          }


                          if (json_data[0]['type_dmnd'] == "Vehicules") {
                              $("#_for_salles").hide();
                              $("#_for_vehc").show();
                              
                              set_data_for_vech_form(); //call func
                          }

                          //Si le button valider a été cliquer
                          $("#btn_valider").click(function(){  
                            //lancer l'animation wait si le btn valider a été cliquer
                            $("#Modal_show_notif_data .modal-body").waitMe({
                              effect : 'stretch',
                              maxSize : '40',                 
                              textPos : 'horizontal',
                            });
                            //console.log(json_data[0]);
                            //insertion dan s la table validation
                            $.ajax({
                              method: 'POST' ,
                              url: 'validate' ,
                              data: {
                                        num_emp : json_data[0]['num_emp'],
                                        num_dmnd : json_data[0]['num_demande'], 
                                    } ,
                              success: function (msg){
                                  //fermer l'animation waitMe
                                  $("#Modal_show_notif_data .modal-body").waitMe('hide'); 

                                  // if (msg == "no_connexion") {
                                  //     swal.fire({
                                  //             icon : "error",
                                  //             title : "No connexion !",
                                  //             text : "vérifier votre connexion ..." ,
                                  //         });
                                  // } 

                                  if (msg == "success") {
                                      swal.fire({
                                              icon : "success", 
                                              title : "Valider" ,
                                              text : "La demande a été valider avec succée ..." ,                                     
                                            });
                                  }

                                  if (msg == "reject") {
                                      swal.fire({
                                              icon : "success", 
                                              title : "Refuser" ,
                                              text : "La demande a été refuser ..." ,                                     
                                            });
                                  }

                                  if (msg == "exists_tr") {
                                      swal.fire({
                                              icon : "warning",
                                              title : "Already validate !",
                                              text : "La demande est deja validée ..." ,
                                            });
                                  }

                                  if (msg == "exists_fl") {
                                      swal.fire({
                                              icon : "warning",
                                              title : "Already reject !",
                                              text : "La demande est deja refuser ..." ,
                                            });
                                  }

                                
                              },
                              error: function (){
                                  alert("Error Ajax !!!");
                              }
                            })//end ajax;

                  
                          });//end on click btn valider

                          //Si le button refuser a été cliquer
                          $("#btn_reject").click(function(){
                            //lancer l'animation wait si le btn refuser a été cliquer
                            $("#Modal_show_notif_data .modal-body").waitMe({
                              effect : 'stretch',
                              text : '',
                              maxSize : '40',                 
                              textPos : 'horizontal',
                            });
                            //insertion dan s la table validation
                            $.ajax({
                              method: 'POST' ,
                              url: 'reject' ,
                              data: {
                                        num_emp: json_data[0]['num_emp'],
                                        num_dmnd: json_data[0]['num_demande'], 
                                    } ,
                              success: function (msg){ 
                                  //fermer l'animation waitMe
                                  $("#Modal_show_notif_data .modal-body").waitMe('hide');

                                  if (msg == "no_connexion") {
                                      swal.fire({
                                              icon : "error",
                                              title : "No connexion !",
                                              text : "vérifier votre connexion ..." ,
                                          });
                                  } 
                                
                                  if (msg == "exists_tr") {
                                      swal.fire({
                                              icon : "warning",
                                              title : "Already validate !",
                                              text : "La demande est deja validée ..." ,
                                            });
                                  }

                                  if (msg == "exists_fl") {
                                      swal.fire({
                                              icon : "warning",
                                              title : "Already reject !",
                                              text : "La demande est deja refuser ..." ,
                                            });
                                  }

                                  if (msg == "success") {
                                      swal.fire({
                                              icon : "success", 
                                              title : "Refuser" ,
                                              text : "La demande a été refuser ..." ,                                     
                                            });
                                  }
                                  
                              },
                              error: function (){
                                  alert("Error Ajax !!!");
                              }
                            })//end ajax;

                  
                          });//end on click btn valider


                      },
                      error: function (){
                            alert("Error Ajax !!!");
                      }
                  })//end ajax


          });//end "notif" on click

    });//end doc ready 


    $(document).ready(function(){//*** NOTIFICATIONS CONCERNE LES NOUVEAUX COMPTES **//

                //verifier si l'utilisateur est un "super admin" 
                if ({{$arr_data['id_role']}} == 1 ) {
                    //afficher dans le badge le nombre de notification non lue "without click in notif icon"
                    $.ajax({
                          method: 'GET' ,
                          url: 'showNotifBadge2' ,
                          data: {} ,
                          success: function (number_notif){                            
                              if (number_notif > 0) {
                                $("#account_notif_badge").show();
                                $("#account_notif_badge").text(number_notif);
                              }  
                          },
                          error: function (){
                                  alert("Error Ajax !!!");
                          }
                      });

                      /* afficher dans le badge le nombre de notification non lue 
                      "without click in notif icon" (Notifications de Validations des demandes) */
                    






                };//End if
                
                //si l'icon "new_account" a été cliquer 
                $('.account_notif_btn').click(function(){
                    if ({{$arr_data['id_role']}} == 1) {                             
                        $.ajax({
                                method: 'GET' ,
                                url: 'markAsRead2' ,
                                data: {} ,
                                success: function (data){
                                    //Cacher le badge                        
                                    $("#account_notif_badge").hide();
                                    //console.log(data);  
                                    var new_arr = [];
                                    for (let i = 0; i < data.length; i++) {
                                      let objects = JSON.parse(data[i]['data']); 
                                      new_arr.push(objects);
                                    }; 
                                    //console.log(new_arr);
                                    $(".li_cont2").empty(); //vider la list 

                                    $.each( new_arr ,function(key,value){

                                            $(".li_cont2").prepend('<a class="dropdown-item notif_item" id="'+value.last_users_id+'"  data-toggle="modal" data-target="" data-whatever="@mdo"><div class="notification__icon-wrapper"><div class="notification__icon"><img style="background-color: white;" src="{{asset('images/img/profiles-icon.jpg')}}" /></div></div><div class="notification__content"><span class="notification__category">Nouveau Compte</span><p>Un nouveau compte a été crée par <span class="text-success text-semibold">'+value.email+'</span><br> Le: <i style="color:#000000">'+value.created_at.replace('.000','')+'</i></p></div></a>');
                                    });

                                    $(".li_cont2").append('<button id="view_all_ntf_btn" class="dropdown-item notification__all text-center" data-toggle="modal" data-target="" data-whatever="@mdo"> View all Notifications </button>');
                                    
                                },
                                error: function (){
                                    alert("Error Ajax !!!");
                                }
                        }); // end ajax
                        
                    }else{//utilisateur n'pas super admin
                          Swal.fire({
                                  title: 'warning !!',
                                  text: "This for super admin , You are not super admin !!",
                                  icon: 'warning',
                                  showCancelButton: false,
                                  confirmButtonColor: '#3085d6',
                                  cancelButtonColor: '#d33',
                                  
                                });//end sweetalert
                                
                    }    
                });//end event button 



                //si le button view all "new accounts "a été cliquer 
                $('.li_cont2').on('click' , '#view_all_ntf_btn' , function(){

                  //alert('delegation is work ...');

                  window.location.href = "{{route('multiPages' , $param = "administration")}}" ;
                });


                //si une notification "new account" a été cliquer 
                $('.li_cont2').on('click' , '.notif_item' , function(){
                      $("#Modal_notif_nv_account").modal('show');
                      var new_user_id =  $(this).attr('id'); 
                      $.ajax({
                          method: 'GET' ,
                          url: 'showNotifData' ,
                          data: {new_user_id: new_user_id} ,
                          success: function (user_account_data){                            
                              //alert((user_account_data['name']));
                              $("#inpt_id").val(user_account_data['user_id']);
                              $(".it_pseudo").text(user_account_data['pseudo']);
                              $(".it_name").text(user_account_data['nom_emp']);
                              $(".it_prenom").text(user_account_data['prenom_emp']);
                              $(".it_email").text(user_account_data['email']);
                              $(".it_create_at").text(user_account_data['created_at'].replace('.000000Z','').replace('T',' ').replace('.000',' '));
                              $(".it_update_at").text(user_account_data['updated_at'].replace('.000000Z','').replace('T',' ').replace('.000',' '));
                              //build path for image
                              var img_path = `{{asset('')}}`;
                                  img_path += user_account_data['avatar_path'];
                              $("#account_img").attr('src' , img_path);
                          },
                          error: function (){
                                alert("Error Ajax !!!");
                          }
                      });
                      
                });//notif_item on click end


                //si le button "valider" a été cliquer
                $("#_btn_valider").click(function(){

                      var new_user_id = $("#inpt_id").val() ;

                      $.ajax({
                              method: 'GET' ,
                              url: 'accountActivation' ,
                              data: {new_user_id: new_user_id} ,
                              success: function (msg){                            
                                swal.fire({
                                            title : "Activer" ,
                                            text : msg ,
                                            icon : "success"                                       
                                          });

                                    $("#Modal_notif_nv_account").modal('hide');
                              },
                              error: function (){
                                      alert("Error Ajax !!!");
                              }
                      });


                });//btn_valider event end


                
    });
</script>           
    
@endsection


























    

