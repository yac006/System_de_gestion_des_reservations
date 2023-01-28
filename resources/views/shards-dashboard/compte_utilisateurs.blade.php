
@extends('layouts.compte_utl_master')


@section('content')
        @php  
            $arr_data = Session::get(Session::get('user_id_var'))  
        @endphp

        <!--Verification l'etat du compte actif/inactif -->
        @if ($arr_data['actif'] == False) 
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
        <!-- ------------------------------------------------- -->
        <!-- Affecter l'id d'utilisateur pour hidden inputs-->
        <input id="num_emp" type="text" value="{{ $arr_data['all_fields_user']->num_emp }}" hidden>
        <input id="user_id" type="text" value="{{ $arr_data['id'] }}" hidden> 
        <input type="text" id="user_id_role_input" value="{{ $arr_data['id_role'] }}" hidden>
        <input id="user_email" type="text" value="{{ $arr_data['all_fields_user']->email }}" hidden> 
        <!-- ------------------------------------------------- -->

        <!-- NavBar -->
        <nav class="navbar navbar-dark bg-primary">
            <div class="nav_header">
                <div class="logo_cont">
                    <img  src="http://127.0.0.1:8000/images/img/logo_bl_blanc_petit.png" alt=""> 
                  </div>
                <div class="search_cont">      
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input id="inpt_search" type="text" class="form-control" placeholder="Search">
                    </div>
                </div>
                <div class="notif_cont">
                    <ul>
                      <li><i class="zmdi zmdi-email zmdi-hc-2x hvr-grow" style="color:#c3c7cc;"></i></li>
                      <li><i class="zmdi zmdi-settings-square zmdi-hc-2x hvr-grow" style="color:#c3c7cc;margin-left: 6px;"></i></li>
                      <li class="nav-item border-right dropdown notifications notif_icon_cont">
                        <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <div class="nav-link-icon__wrapper">
                            <i id="_icon_notif" class="zmdi zmdi-notifications"></i>
                            <span id="_bdg_nbr_user_ntf" class="badge badge-pill badge-danger"></span>
                          </div>
                        </a>
                        <!-- drop down menu-->
                        <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink" style="left:-258px; height:401px ; min-width:20rem;overflow-y:auto">
                          <div class="list-group list_notif_container">
                              {{-- Not Empty --}}
      
                          </div>
                          {{-- <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a> --}}
                        </div>
                      </li>
                    </ul>
                </div>
            </div>
            {{-- --- --}}
        </nav>
      
  

        <!-- Main container  -->             
        <div class="main_cont">
              @include('../pages/simple_menu') 
        </div> 
        <!-- Main container Ends -->
      


        <!------------------- Modals Container --------------------->

            <!-- Modal Jumbotron -->
            <div class="modal fade bd-example-modal-lg" id="jumbotronModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-lg" style="top: 40px">
                <div class="modal-content">
                      <!-- Jumbotron -->
                      <div class="jumbotron" style="margin-bottom: 8px">
                        <h1 class="display-4">Compte, Inactif !</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="btn btn-primary btn-lg" href="{{ route('logout') }}" role="button" >Logout</a>
                      </div>
                </div>
              </div>
            </div>


            <!-- ---------- Model afficher le plannig (Full calendar) --------- -->
            <div class="modal" tabindex="-1" role="dialog" id="show_pln_modal">
              <div class="modal-dialog" role="document" style="max-width: 728px;">
                <div class="modal-content" style="height: 580px;">
                  <div class="modal-body">
                    
                    <div id='calendar' style="width:100%; margin: 0px auto;" hidden></div> 
                    
                    <h1 id="wait_title">Please Wait .......</h1>
                    <div class="progress prog_bar_cont">
                      <div class="progress-bar progress-bar-striped prog_bar_loader" role="progressbar" style="aria-valuenow='100'" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------- End modal ---------------- -->

            <!-- ------ Model qui affiche le contenue de notif de confirmation ----- -->
            {{-- <div class="modal" tabindex="-1" role="dialog" id="notif_confirmation_modal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Modal body text goes here</p>
                  </div>
                </div>
              </div>
            </div> --}}
            <!-- -------------- End modal ---------------- -->


            <!-- Contact modal -->
            <div class="modal fade bd-example-modal-lg" id="_Contact_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" style="width: 40%">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>Contact Us</h5> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="container contact_page_cont" style="max-width: 1067px;height: 424px;">
                      <div class="row" style="margin-top: 20px;">
                          <div  id="form_container" style="width: 95%; background-color: #bfbfbf30;padding:22px; margin: 0 auto; border-radius: 15px; height: 387px;">
                              <form  id="reused_form">
                                  <div class="row">
                                      <div class="col-sm-12 form-group">
                                          <label for="message"> Message :</label>
                                          <textarea id="textArea_msg" class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-6 form-group">
                                          <label for="inp_email"> Email :</label>
                                          <input  id="inp_email" type="text" class="form-control" readonly>
                                      </div>
                                      <div class="col-sm-6 form-group">
                                          <label for="email"> Destinataire :</label>
                                          <select id="email_select" class="form-control">
                                            <option selected>Choose ...</option>
                                            <option>Dprt Informatique</option>
                                            <option>Dprt Exploitation</option>
                                            <option>Dprt HSE </option>
                                            <option>Dprt RH </option>
                                          </select>                                      
                                      </div>
                                  </div>
                                  
                              </form>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="_btn_fermer" class="btn btn-secondary">Fermer</button>
                      <button type="button" id="_btn_envoyer" class="btn btn-primary">Envoyer</button>
                    </div>
                </div>
              </div>
            </div>


            <!-- Historique modal -->
            <div class="modal fade bd-example-modal-lg" id="_historique_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="container mt-5 table_cont">

                    <table id="hstrq_dmnd_table" class="display cell-border" style="width:88%;margin:50px">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Date val</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
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
                      <img class="rounded-circle" src="{{ asset($arr_data['all_fields_user']->avatar_path) }}" alt="User Avatar" width="110"> </div>
                    <h4 id="h4_user_name" class="mb-0">{{ $arr_data['all_fields_user']->pseudo }}</h4>
                    <span class="text-muted d-block mb-2">{{ $arr_data['all_fields_user']->poste }}</span>
                    <a href="{{ route('logout') }}" type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2"> 
                      <i class="zmdi zmdi-power-setting" style="margin-right:3px;"></i>Logout</a>
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
                      <span style="font-size: 15px;">Bienvenue sur votre profile, l'application SGR-BL Vous permet d'effectuer une reservation, vous pouvez cliquer sur réservations pour effectuer une nouvelle demande.  </span>
                    </li>
                  </ul>
                </div>
        </div>

@endsection


<!-- --------  JQuery and Ajax Script -------- -->
@section('jquery_ajax_script')
    <script>
        $(document).ready(function(){
              $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                
              //afficher dans le badge le nombre de notification non lue "without click in notif icon"
              let num_emp = $("#num_emp").val();
              $.ajax({
                        method: 'GET' ,
                        url: 'showNotifBadgeUser' ,
                        data: {num_emp: num_emp} ,
                        success: function (nbr_notif){                            
                            if (nbr_notif > 0) {
                              $("#_bdg_nbr_user_ntf").show();
                              $("#_bdg_nbr_user_ntf").text(nbr_notif);
                            }  
                        },
                      })//end ajax;

              
              //si le button Envoyer a été cliquer 
              $('#btn_envoyer').click(function(){
                    //lancer l'animation wait si le btn envoyer a été cliquer
                    $(".vehc_form_cont").waitMe({
                      effect : 'progressBar',
                      text : '',
                      maxSize : '40',                 
                      textPos : 'horizontal',
                    });
                    $(".salles_form_cont").waitMe({
                      effect : 'progressBar',
                      text : '',
                      maxSize : '40',                 
                      textPos : 'horizontal',
                    });
                    
                    /*----- salle inpt form ------*/
                    let user_id = $("#user_id").val();
                    let num_employe = $("#num_emp").val();
                    let type_rsv = $('input[name=radioBtnTypeDmnd]:checked').val();
                    let theme = $("#inpt_theme").val();
                    let date = $("#inpt_date").val();
                    let hr_debut = $("#inpt_hr_debut").val();
                    let hr_fin = $("#inpt_hr_fin").val();
                    let salle = $("#inpt_select_sal").val();
                    /*----- vehc inpt form ------*/
                    let motif = $("#motif_inpt").val();
                    let destination = $("#dest_inpt").val();
                    let date_dmnd_v = $("#date_dmnd_v_inpt").val();

                    let date_dep = $("#inp_date_dep").val();
                    let date_retr = $("#inp_date_rtr").val();
                    let heure_dep = $("#inp_heure_dep").val();
                    let heure_retr = $("#inp_heure_rtr").val();

                    let vehicule = $("#input_select_Vech").val();
                    let chauffeur = $('input[name=radioBtnChauf]:checked').val();
                    
                    $.ajax({
                            method: 'POST' ,
                            url: 'insertData' ,
                            data: {
                                    user_id : user_id ,
                                    type_rsv : type_rsv ,
                                    num_employe : num_employe , 
                                    theme : theme ,
                                    date : date ,
                                    hr_debut : hr_debut ,
                                    hr_fin : hr_fin ,
                                    salle : salle ,
                                    motif : motif ,
                                    destination : destination ,
                                    date_dmnd_v : date_dmnd_v ,
                                    date_dep : date_dep ,
                                    date_retr : date_retr ,
                                    heure_dep : heure_dep ,
                                    heure_retr : heure_retr ,
                                    vehicule : vehicule ,
                                    chauffeur : chauffeur 
                                  } ,
                            success: function (){ 
                                  //fermer l'animation wait
                                  $(".vehc_form_cont").waitMe("hide");
                                  $(".salles_form_cont").waitMe("hide");

                                  swal.fire({
                                              title : "Envoyer" ,
                                              text : "La demande a été envoyer avec succée ....",
                                              icon : "success",                                       
                                            });
                                  //vider les inputs de formulaire            
                                  $(".vehc_form_cont input:not(input[type = radio]) , .salles_form_cont input").val('');
                                  //fermer le modal
                                  $("#exampleModal_rsv").modal('hide');
                            },
                            error: function (){
                                    alert("Error Ajax !!!");
                            }
                    });//end ajax
              });// end btn envoye click
              
              //si l'icon notification a été cliquer
              $('.notif_icon_cont').click(function(){
                $("#_bdg_nbr_user_ntf").hide();
                let num_emp = $("#num_emp").val();
                  
                $.ajax({
                        method: 'GET' ,
                        url: 'markAsReadUserNotif' ,
                        data: {num_emp: num_emp} ,
                        success: function (list_validations){ 
                            //console.log(list_validations);
                            $(".list_notif_container").empty(); //vider la list 

                            var img_path ;
                            var title ;

                            $.each( list_validations ,function(key ,value){

                              for (let i = 0; i < list_validations.length; i++) {
                                //construire le chemin d'image des notification (img validate , img reject)
                                if (list_validations[i].valider == 1) {
                                  img_path = "{{asset('images/img/Accept_37154.png')}}";
                                  title = "Votre demande a été valider";
                                }//end if

                                if (list_validations[i].valider == 0) {
                                  img_path = "{{asset('images/img/reject-icon-cartoon-vector.png')}}";
                                  title = "Votre demande a été refuser";
                                }//end if

                                $(".list_notif_container").prepend('<button id="'+value.id+'" type="button" class="list-group-item list-group-item-action"><img src="'+img_path+'" alt="">'+title+'</button>');

                              
                              }//end for
                            });//end each
                        },
                        error: function (){
                                alert("Error Ajax !!!");
                        }
                    });//end ajax
              });// end notif_icon click 

              //Si une Notification a été cliquer
              // $(".list_notif_container").on('click' , 'button' , function(){
              //       $("#notif_confirmation_modal").modal('show');
              // });

              //Si le button historique a été cliquer
              $("#box_three").on('click' , '#open_hstrq_btn' , function(){
                    $("#_historique_modal").modal('show');
              });

              //Si le button Contact a été cliquer
              $("#box_two").on('click' , '#open_mdl_contact_btn' , function(){
                    $("#_Contact_modal").modal('show');
              });

              //Si le button recherche a été cliquer
              $("#inpt_search").focus(function(){
                $("#_historique_modal").modal('show');
              });
              
        });    
    </script>
@endsection



@section('full_calendar_script')
    <script>
          $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

          document.addEventListener('DOMContentLoaded', function() { 
          $("#btn_next").click(function(){                                    
              var calendarEl = document.getElementById('calendar');
              var calendar = new FullCalendar.Calendar(calendarEl, {
              
                initialView : 'dayGridMonth' ,

                headerToolbar: {
                    left: 'prevYear,prev,next,nextYear today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },

                initialDate: new Date(),
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                selectable: false,
                dayMaxEvents: true, // allow "more" link when too many events
                nowIndicator: true,
                eventColor: set_events_color() ,

                events : check_user_role(),
              
                eventClick : function(info) {
                },

              
              });
                
              calendar.setOption('locale' , 'fr');
              calendar.setOption('height', 540);

              calendar.render();

              document.querySelector('.fc-dayGridMonth-button').innerHTML = "Mois";
              document.querySelector('.fc-dayGridWeek-button').innerHTML = "Semaine";
              document.querySelector('.fc-dayGridDay-button').innerHTML = "Jour";
              document.querySelector('.fc-today-button').innerHTML = "Aujourd'hui";

              $(".fc-header-toolbar button").click(function(){
                document.querySelector('.fc-dayGridMonth-button').innerHTML = "Mois";
                document.querySelector('.fc-dayGridWeek-button').innerHTML = "Semaine";
                document.querySelector('.fc-dayGridDay-button').innerHTML = "Jour";
                document.querySelector('.fc-today-button').innerHTML = "Aujourd'hui";
              });

              //-------------------- Functions ---------------------//
              function check_user_role() {
                var radio_btn_val = $('input[name="radioBtnTypeDmnd"]:checked').val();
                if (radio_btn_val == "Vehicules") {
                    return "retrieveVechPlan" ;//route 
                }
                if (radio_btn_val == "Salles") {
                    return "retrieveSalPlan" ;//route 
                }
              } ; 

              function set_events_color() {
                let user_id_role = $("#user_id_role_input").val() ;
                if (user_id_role == 7) {
                    return '#fb7906' ;
                } else {
                    return '#ae86f7' ;
                }
              }  
          });//fin next bten on click
        });//fin de full calendar script
    </script>
@endsection



@section('DataTables_script_hstrq_dmnd')
    <script>
        $(document).ready( function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            
            let num_emp = $("#num_emp").val();

            $.ajax({
                method : 'GET' ,
                url : 'getDemandesData' , 
                data : {num_emp: num_emp},                 
                success : function(results){     
                    //console.log(results);
                    var table = $('#hstrq_dmnd_table').DataTable({
                    
                    data: results ,
                    
                    columns: [
                            { 'data': 'num_demande' },
                            { 'data': 'type_dmnd' },
                            { 'data': 'date_dmnd' },
                            { 'data': 'date_val' },
                            { 'data': 'valider' },
                        ],
                        order: [[1, 'asc']],

                        columnDefs: [
                        { "width": "2%" , "targets": 0 },
                        { "width": "3%", "targets": 1 },
                        { "width": "3%", "targets": 2 },
                        { "width": "5%", "targets": 3 },
                        { "width": "2%", "targets": 4 },
                        {
                            targets : 4,
                            render : function (data, type, row) {
                                if(row.valider == 1){
                                    return '<span class="badge badge-pill badge-success">Valider</span>'
                                }else if(row.valider == 0){
                                    return '<span class="badge badge-pill badge-danger">Refuser</span>'
                                }
                                else if(row.valider == null){
                                    return '<span class="badge badge-pill badge-warning">En attente</span>'
                                }
                            }//end function
                        },
                        // {
                        //     targets : 3,
                        //     render: function (data, type, row) {
                        //         return data + ' ' + row.prenom_emp +'';
                        //     },
                        // }
                    ],
                
                });//end DataTable
            }//end success
        });//end ajax 

      });//end doc ready
    </script>
@endsection



@section('contact_modal_jquery_script')
    <script>
        $(document).ready(function(){
          $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

          let user_email = $("#user_email").val();
          $("#inp_email").val(user_email);

          //Si le button envoyer a été cliquer
          $("#_btn_envoyer").click(function () {
            //lancer l'animation wait si le btn envoyer a été cliquer
            $("#reused_form").waitMe({
                                effect : 'stretch',
                                maxSize : '40',                 
                                textPos : 'horizontal',
            });  
            
            let departement = $("#_Contact_modal #email_select option:selected").text();
            let textarea_msg = $("#textArea_msg").val();
            let email ;

            if (departement == "Départ Informatique") {
              email = "aimad@gmail.com";
            }
            if (departement == "Départ Exploitation") {
              email = "rabah@gmail.com";
            }
            if (departement == "Départ HSE") {
              email = "nadir@gmail.com";
            }
            if (departement == "Départ RH") {
              email = "arid97@gmail.com";
            }
            
            $.ajax({
                method: 'GET',
                url: 'sendMailFromContactPg',
                data: {
                  email: email,
                  textarea_msg: textarea_msg,
                },
                success: function(msg){
                  //fermer l'animation wait
                  $("#reused_form").waitMe("hide");

                  if (msg == "no_connexion") {
                      swal.fire({
                              icon : "error",
                              title : "No connexion !",
                              text : "vérifier votre connexion ..." ,
                          });
                  }

                  if (msg == "success") {
                      swal.fire({
                          icon : "success", 
                          title : "Envoyée" ,
                          text : "Votre email a été envoyer avec succée ..." ,                                     
                      });
                  }
                }

            });


            
          });//end on click



          //Si le button fermer a été cliquer
          $("#_btn_fermer").click(function () {    
              $("#_Contact_modal").modal('hide');
          });//end on click

        });//end doc ready
    </script>
@endsection
