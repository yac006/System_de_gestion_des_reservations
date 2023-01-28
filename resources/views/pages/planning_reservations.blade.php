

        {{-- Container Start --}}
        <div class="container my-1 alert pln_rsv_main_cont">
              <button id="show_hstrq_dmnd_btn" type="button" class="btn btn-info">Afficher l'Historique</button>

              <div id='calendar'  style="width:92%;  margin: 0px auto ;"></div> 
              
              <!---------- Modal planification des demandes --------------> 
              <div class="modal fade" id="Modal_planification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Planification</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- -------------  --->
                      <div class="list-group list_container">
                          <!-- Not Empty ! -->
                      </div>

                      @if ($arr_data['id_role'] == 3 or $arr_data['id_role'] == 4)
                            @include('components.formulaire_dmnd_vehc')
                      @endif

                      @if ($arr_data['id_role'] == 5 or $arr_data['id_role'] == 6)
                            @include('components.formulaire_dmnd_sal')
                      @endif

                      

                    </div><!-- end body -->
                    <div class="modal-footer">
                      <button id="close_btn_pln" type="button" class="btn btn-danger" data-dismiss="modal">fermer</button>
                      <button id="back_btn_pln" type="button" class="btn btn-secondary" hidden>précédent</button>
                      <button id="pln_btn_next" type="button" class="btn btn-primary">Suivant</button>
                      <button id="btn_save" type="button" class="btn btn-success" hidden>Planifier & enregistrer</button>
                    </div>
                  </div>
                </div>
              </div>

              <!---------- Modal Dialog d'affichage --------------> 
              <div class="modal fade bd-example-modal-lg-1" id="event_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog  new_model_lg">
                    <div class="modal-content" style="font-size: 15px ; padding: 22px; padding-top: 30px;; height: 511px; border: solid 2px #cecece;">
                        

                      @if ($arr_data['id_role'] == 3 or $arr_data['id_role'] == 4)
                            @include('components.formulaire_dmnd_vehc')
                      @endif


                      @if ($arr_data['id_role'] == 5 or $arr_data['id_role'] == 6)
                            @include('components.formulaire_dmnd_sal')
                      @endif

                        
                          
                        <div class="modal-footer">
                          <div style="margin-right: -28px;">
                                <button  id="_btn_modify_event_data" class="btn btn-danger">Modifie</button>
                                <button  id="print_btn" target="_blank" class="btn btn-secondary">Imprimer</button>
                                <button  id="_btn_close_event_data"  class="btn btn-info">Fermer</button>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>  <!-- Container ends -->

        <!-- Historique des planification  -->
        <div class="hstrq_planification_cont">

              @if ($arr_data['id_role'] == 3 or $arr_data['id_role'] == 4)
                  @include('components.historique_des_planification_vehc')
              @endif
              
              @if ($arr_data['id_role'] == 5 or $arr_data['id_role'] == 6)
                  @include('components.historique_des_planification_sal')
              @endif

        </div>




@section('full_calendar_script')
                <script>
                        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

                        document.addEventListener('DOMContentLoaded', function() {   
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
                            editable: true,
                            selectable: true,
                            dayMaxEvents: true, // allow "more" link when too many events
                            nowIndicator: true,
                            eventColor: set_events_color() ,
                            
                            events : check_user_role()  ,

                            eventClick : function(info) {
                                $(document).ready(function(){                                                         
                                    Swal.fire({
                                      title: 'Veuillez choisir une action !',
                                      icon: 'info',
                                      showDenyButton: true,
                                      showCancelButton: true,
                                      confirmButtonText: 'Voir',
                                      denyButtonText: `Supprimer`,
                                    }).then((result) => {
                                      /* Read more about isConfirmed, isDenied below */
                                      if (result.isConfirmed) {
                                        $("#event_modal").modal("show");
                                        
                                        let id_role = $("#user_id_role_input").val();

                                        //Verifier le type de compte user (EXP / HSE)
                                        if (id_role == 3 || id_role == 4) {
                                            display_event_detail_v(info);
                                        }

                                        if (id_role == 5 || id_role == 6) {
                                            display_event_detail_s(info)
                                        }
                                        
                                        //Si le button modifier event data a été cliquer
                                        $(".modal-footer").on('click', '#_btn_modify_event_data' , function(){
                                            let id_role = $("#user_id_role_input").val();
                                            //Verifier le type de compte user (EXP / HSE)
                                            if (id_role == 3 || id_role == 4) {
                                                modify_event_data_v();
                                            }

                                            if (id_role == 5 || id_role == 6) {
                                                modify_event_data_s();
                                            }
                                        });//end onclick btn "modifier"

                                        //Si le button imprimer a été cliquer 
                                        $("#print_btn").click(function() {
                                              swal.fire({
                                                          icon : "warning",
                                                          title : "Aucun Imprimant !",
                                                          text : "Veuillez connecter une imprimant ..."
                                                        });
                                        });


                                      } else if (result.isDenied) {
                                              //Si le button supprimer a été cliquer
                                              let title = info.event.title;
                                          
                                              //-----------------------//
                                              $.ajax({
                                                method : 'GET' ,
                                                url : 'deleteData' , 
                                                data : { title: title },
                                                                      
                                                success : function(){
                                                        swal.fire({
                                                          icon : "success",
                                                          title : "Supprimer",
                                                          text : "L'évenement a été Supprimer avec succée ...."
                                                        });

                                                    location.reload();
                                                }
                                            });//end ajax               
                                      };//end else
                                    });
                                      
                                });      
                            },

                            select : function(selectionInfo){
                                $(document).ready(function(){
                                    //show modal
                                    $("#Modal_planification").modal('show');

                                    //call func
                                    modal_planification_style();
                                
                                    let user_id_role = $("#user_id_role_input").val(); 

                                    //-----------------------// 
                                    //fair requete ajax pour récuperer les "num_demande" dans la table demandes
                                    $.ajax({
                                            method : 'GET',
                                            url : 'ListNumDmnd',
                                            data : {user_id_role: user_id_role},                                      
                                            success : function(list_dmnd){
                                                  //console.log(list_dmnd);
                                                  $(".list_container").empty(); //vider la list 
                                                  $(".list_container").append('<button type="button" class="list-group-item list-group-item-action" style="color:white;font-weight: bold; background-color: #007bff">List des demandes</button>');
                      
                                                  $.each( list_dmnd ,function(key,value){
                                                        $(".list_container").append('<button id="'+value.num_demande+'" type="button" class="list-group-item list-group-item-action dmnd_btn" style="font-weight: 10"><span id="spn_num_dmnd">N° demande : </span>'+value.num_demande+'<span id="spn_date"> - </span>'+value.date_dmnd+'<span id="spn_demandeur">  - </span>'+value.nom_emp+' '+value.prenom_emp+'</button>');
                                                  });
                                                  //deactiver le button suivant
                                                  $("#pln_btn_next").prop('disabled' , true);
                                                  //cacher le btn save
                                                  $("#btn_save").prop('hidden' , true);
                                                  //afficher le btn next
                                                  $("#pln_btn_next").prop('hidden' , false);
                                                  //cacher le btn précédent
                                                  $("#back_btn_pln").prop('hidden' , true);
                                                
                                                  
                                                  //si le button précédent a été cliquer
                                                  $(".modal-footer").on('click' , '#back_btn_pln' , function(){
                                                    $(".list_container").prop('hidden' , false);
                                                    $(".vehc_dmnd_form").prop('hidden' , true);
                                                    $(".sal_dmnd_form").prop('hidden' , true);
                                                    $("#Modal_planification .modal-dialog").css('max-width' , "500px");
                                                    //cacher le btn précédent
                                                    $("#back_btn_pln").prop('hidden' , true);
                                                    //cacher le btn save
                                                    $("#btn_save").prop('hidden' , true);
                                                    //afficher le btn suivant
                                                    $("#pln_btn_next").prop('hidden' , false);

                                                  });//end btn back click
                                                      
                                                  //Si le button Save a été cliquer
                                                  $(".modal-footer").on('click', '#btn_save', function(){
                                                    
                                                      let id_role = $("#user_id_role_input").val();
                                              
                                                      //Verifier le type de compte user (EXP / HSE)
                                                      if (id_role == 3 || id_role == 4) {
                                                          save_vehc_form_data(selectionInfo);
                                                      }

                                                      if (id_role == 5 || id_role == 6) {
                                                          save_sal_form_data(selectionInfo);
                                                      }

                                                  });//btn_save end
                                            },
                                            error: function (){
                                                alert("Error Ajax !!!");
                                            }
                                    });//ajax end


                                    var num_dmnd;

                                    //si une demande a été cliquer
                                    $(".list_container").on('click' , '.dmnd_btn' , function(){
                                          num_dmnd = $(this).prop('id');
                                          $(".list_container .dmnd_btn").removeClass('active');
                                          $(this).addClass('active');
                                          $("#pln_btn_next").prop('disabled' , false);
                                    });//end on click dmnd_btn

                                    //Si le button Next a été cliquer
                                    $(".modal-footer").on('click' , '#pln_btn_next' , function(){
                                            //alert(num_dmnd);
                                            //cacher la list des demandes
                                            $(".list_container").prop('hidden' , true);
                                            
                                            //afficher le btn précédent
                                            $("#back_btn_pln").prop('hidden' , false);
                                            //cacher le btn suivant
                                            $("#pln_btn_next").prop('hidden' , true);
                                            //afficher le btn save
                                            $("#btn_save").prop('hidden' , false);
                                            //modifier le width de modal
                                            $("#Modal_planification .modal-dialog").css('max-width' , "780px");
                                            //$(".vehc_dmnd_form input").css('background-color' , "pink");

                                            let id_role = $("#user_id_role_input").val();
                                            
                                            //Verifier le type de compte user (EXP / HSE)
                                            if (id_role == 3 || id_role == 4) {
                                                //afficher vehc form 
                                                $(".vehc_dmnd_form").prop('hidden' , false);

                                                //récupérer les données de formulaire vehc
                                                $.ajax({
                                                        method : 'GET',
                                                        url : 'displayDmndDetail',
                                                        data : {num_dmnd: num_dmnd},
                                                        success : function(data){
                                                        //console.log(data);
                                                        $("#_inp_num_dmnd").val(data.results1.num_demande);
                                                        $("#_inp_id_rsv_vehc").val(data.results1.id_rsv_vehc);
                                                        $("#_inp_demandeur").val(data.results1.nom_emp+" "+data.results1.prenom_emp);
                                                        $("#_inp_date_demande").val(data.results1.date_dmnd);
                                                        $("#_inp_date_rsv").val(data.results1.date_rsv);
                                                        $("#_inp_motif").val(data.results1.motif);
                                                        $("#_inp_dest").val(data.results1.dest);
                                                        $("#_inp_date_dep").val(data.results1.date_dep);
                                                        $("#_inp_date_retr").val(data.results1.date_est_retour);
                                                        $("#_inp_heur_dep").val(data.results1.heure_dep);
                                                        $("#_inp_heur_retr").val(data.results1.heure_retr);
                                                        $("#select_type_vehc #op1").text(data.results2.type);
                                                        $("#_inp_num_parc").val(data.results1.num_parc);

                                                        if (data.results1.chauffeur == 1 /*true*/) {
                                                            $("#_chfr_checkbox").prop('checked' , true);
                                                        } else {
                                                            $("#_chfr_checkbox").prop('checked' , false);
                                                        }
                                                        }
                                                    });//end ajax

                                                    //récupérer la list des models des vehicules
                                                    $.ajax({
                                                        method: 'GET',
                                                        url: 'modelVechList',
                                                        data: {},
                                                        success: function(list_vehc){
                                                            $("#select_model_vehc").empty();
                                                            $.each(list_vehc , function(index,value){
                                                                $("#select_model_vehc").append(`<option>`+value.marque+`</option>`);
                                                            });
                                                        }
                                                    });//end ajax

                                                    //récupérer la list des types des vehicules
                                                    $.ajax({
                                                        method: 'GET',
                                                        url: 'typeVechList',
                                                        data: {},
                                                        success: function(list_types_vehc){//suit
                                                            $("#select_type_vehc").empty();

                                                            $.each(list_types_vehc , function(index,value){
                                                                $("#select_type_vehc").append(`<option>`+value.type+`</option>`);
                                                            });
                                                        }
                                                    });//end ajax
                                            }


                                            if (id_role == 5 || id_role == 6) {
                                                //afficher sal form 
                                                $(".sal_dmnd_form").prop('hidden' , false);

                                                //récupérer les données de formulaire sal
                                                $.ajax({
                                                        method : 'GET',
                                                        url : 'displayDmndDetail',
                                                        data : {num_dmnd: num_dmnd},
                                                        success : function(data){
                                                          //console.log(data);
                                                          $(".sal_dmnd_form #_inp_num_dmnd").val(data.num_demande);
                                                          $(".sal_dmnd_form #_inp_id_rsv_sal").val(data.id_rsv_sal);
                                                          $(".sal_dmnd_form #_inp_demandeur").val(data.nom_emp+" "+data.prenom_emp);
                                                          $(".sal_dmnd_form #_inp_date_rsv").val(data.date_rsv);
                                                          $(".sal_dmnd_form #inpt_theme").val(data.theme);
                                                          $(".sal_dmnd_form #inpt_hr_debut").val(data.heur_d.replace(':00.0000000' , ''));
                                                          $(".sal_dmnd_form #inpt_hr_fin").val(data.heur_f.replace(':00.0000000' , ''));
                                                          $(".sal_dmnd_form #inpt_select_sal #op1").text(data.designation);
                                                        }
                                                    });//end ajax

                                                    //récupérer la list des Salles
                                                    $.ajax({
                                                        method: 'GET',
                                                        url: 'SallesList',
                                                        data: {},
                                                        success: function(list_salles){
                                                            $(".sal_dmnd_form #inpt_select_sal").empty();
                                                            $.each(list_salles , function(index,value){
                                                                $(".sal_dmnd_form #inpt_select_sal").append(`<option>`+value.designation+`</option>`);
                                                            });
                                                        }
                                                    });//end ajax

                                            }
                                        
                                      });//end click "next" btn


                                    });//document.ready end
                            },

                            eventDrop : function(info) {                
                                $(document).ready(function(){ 
                                      let title = info.event.title ; 
                                      let formatted_start_date = info.event.start.getFullYear() + "-" + (info.event.start.getMonth()+1) + "-" + info.event.start.getDate() ;                      
                                      let formatted_end_date = info.event.end.getFullYear() + "-" + (info.event.end.getMonth()+1) + "-" + info.event.end.getDate() ;
                                      //alert(formatted_start_date +' '+ formatted_end_date);
                                                  //-----------------------//    
                                      //-----------------------//   
                                      $.ajax({
                                          method : 'PUT',
                                          url : 'updateData',
                                          data : {
                                              title : title ,
                                              start : formatted_start_date ,
                                              end : formatted_end_date ,
                                          },
                                          success : function(){
                                            swal.fire({
                                                        title : "Modifier" ,
                                                        text : "L'évenement été modifier avec succée ....",
                                                        icon : "success"                                       
                                                      });                       
                                          }
                                      });//end ajax
                              
                                });

                            },

                            eventResize : function(info){
                                $(document).ready(function(){
                                      
                                      let title = info.event.title ; 
                                      let formatted_start_date = info.event.start.getFullYear() + "-" + (info.event.start.getMonth()+1) + "-" + (info.event.start.getDate()) ;                      
                                      let formatted_end_date = info.event.end.getFullYear() + "-" + (info.event.end.getMonth()+1) + "-" + (info.event.end.getDate()-1) ;
                                      //let id_plan = info.event.id_plan ;
                                    
                                      //-----------------------//   
                                      $.ajax({
                                          method : 'PUT',
                                          url : 'updateData' ,
                                          data : {
                                              title : title ,
                                              start : formatted_start_date ,
                                              end : formatted_end_date ,
                                          },

                                          success : function(){
                                            swal.fire({
                                                        title : "Modifier" ,
                                                        text : "L'évenement été modifier avec succée ....",
                                                        icon : "success",                                       
                                                      });                       

                                          }
                                      });
                              


                                });

                            }
                          });

                          //Si le button afficher l'historique des planifications a été cliquer
                          $(".pln_rsv_main_cont").on('click' , '#show_hstrq_dmnd_btn' , function () {
                              $(".pln_rsv_main_cont").prop('hidden' , true);                           
                          });
                          
                          //fermer le modal 
                          $("#_btn_close_event_data").click(function(){
                                  $("#event_modal").modal('hide');
                          });

                          calendar.setOption('locale' , 'fr');
                          calendar.setOption('height', 540);
                          
                          show_hstrq_dmnd_btn_animation();
                          
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
                            let user_id_role = $("#user_id_role_input").val() ;

                            if (user_id_role == 3 || user_id_role == 4) {
                                return "retrieveVechPlan" ;
                            }
                            if (user_id_role == 5 || user_id_role == 6) {
                                return "retrieveSalPlan" ;
                            }
                          } ; 

                          function set_events_color() {
                            let user_id_role = $("#user_id_role_input").val() ;
                            if (user_id_role == 7) {
                                return '#fb7906' ;
                            } else {
                                return '#ae86f7' ;
                            }
                          } ;


                          function show_hstrq_dmnd_btn_animation() {
                            $("#show_hstrq_dmnd_btn").animate({ top: "13px", opacity: "1" }, 1000);
                          }


                          function modal_planification_style() {
                              //cacher le formulaire et afficher la list des demandes
                              $(".list_container").prop('hidden' , false);
                              $(".vehc_dmnd_form").prop('hidden' , true);
                              $(".sal_dmnd_form").prop('hidden' , true);
                              $("#Modal_planification .modal-dialog").css('max-width' , "500px");
                              $("#Modal_planification .form-group").css('margin-bottom' , "5px");
                              $("#Modal_planification .modal-body").css('padding' , "23px");
                              $("#Modal_planification .vehc_dmnd_form input , #select_type_vehc , #select_model_vehc").css('background-color' , "#8380ee26");
                              $("#_inp_num_dmnd , #_inp_demandeur , #_inp_date_demande , #_inp_num_parc").css('background-color' , "rgb(231 231 231 / 55%)");
                          }


                          function formulaire_sal_style() {
                            $("#event_modal .modal-content").css({"height": "410px" , "padding-top": "39px"});
                            $("#event_modal .modal-footer").css({"padding":"1.938rem 2.1875rem" , "border": "none"});
                            //$("#event_modal input").css("background-color" , "#ffe5eb");
                          }


                          function save_vehc_form_data(selectionInfo) {
                            //let num_dmnd = $(".list-group-item.dmnd_btn.active").attr('id');
                            num_demande = $(".vehc_dmnd_form #_inp_num_dmnd").val(); 
                            //alert(num_demande);
                            let title = "Demande N: "+num_demande;
                            let formatted_start_date = selectionInfo.start.getFullYear() + "-" + (selectionInfo.start.getMonth() +1) + "-" + selectionInfo.start.getDate() ;
                            let formatted_end_date = selectionInfo.end.getFullYear() + "-" + (selectionInfo.end.getMonth() +1) + "-" + (selectionInfo.end.getDate()) ;

                            //-----------------------//

                            //Insert planif data to planifications "table"  
                            $.ajax({
                                method : 'GET',
                                url : 'storeData',
                                data : {
                                    title : title ,
                                    start : formatted_start_date ,
                                    end : formatted_end_date ,
                                    num_demande : num_demande                                     
                                },
                                success : function(msg){
                                  if (msg == "Existe") {
                                    swal.fire({
                                                title : "Alert" ,
                                                text : 'La demande est deja planifier !' ,
                                                icon : "warning",
                                              }); 
                                  } else {
                                                                                              //--------------- update rsv_vehicules table  ---------------//
                                      let num_dmnd = $("#_inp_num_dmnd").val();
                                      let date_rsv = $("#_inp_date_rsv").val();
                                      let motif = $("#_inp_motif").val();
                                      let dest = $("#_inp_dest").val();
                                      let date_dep = $("#_inp_date_dep").val();
                                      let date_est_retour = $("#_inp_date_retr").val();
                                      let heure_dep = $("#_inp_heur_dep").val();
                                      let heure_retr = $("#_inp_heur_retr").val();
                                      let type_vehc = $("#select_type_vehc option:selected").text();
                                      let model_vehc = $("#select_model_vehc option:selected").text();
                                      //alert(type_vehc);
                                      let id_rsv_vehc = $("#_inp_id_rsv_vehc").val();

                                      let checkbox_status;
                                      
                                      if ($('#_chfr_checkbox').prop('checked')) {
                                            checkbox_status = "True" ;
                                      } else {
                                            checkbox_status = "False" ;
                                      }

                                      //Insert into "rsv_vehicules" table
                                      $.ajax({
                                            method : 'GET' ,
                                            url : 'updateVechEventDetail' , 
                                            data : { 
                                                      num_dmnd: num_dmnd,
                                                      id_rsv_vehc: id_rsv_vehc,
                                                      date_rsv: date_rsv,
                                                      motif: motif,
                                                      dest: dest,
                                                      date_dep: date_dep,
                                                      date_est_retour: date_est_retour,
                                                      heure_dep: heure_dep,
                                                      heure_retr: heure_retr,
                                                      type_vehc: type_vehc ,
                                                      model_vehc: model_vehc,
                                                      checkbox_status: checkbox_status
                                                    },
                                                                  
                                            success : function(msg){
                                                  swal.fire({
                                                        title : "success" ,
                                                        text : 'La demande a été planifier avec succée ...' ,
                                                        icon : "success",
                                                    }); 
                                                    
                                                    setTimeout(function(){
                                                        location.reload();    
                                                    }, 1200);
                                            }

                                      });//end ajax  
                                    
                                  }
                                }//success               
                                });//ajax end

                          }


                          function save_sal_form_data(selectionInfo) {
                              num_demande = $(".sal_dmnd_form #_inp_num_dmnd").val(); 
                              //alert(num_demande);
                              let title = "Demande N: "+num_demande;
                              let formatted_start_date = selectionInfo.start.getFullYear() + "-" + (selectionInfo.start.getMonth() +1) + "-" + selectionInfo.start.getDate() ;
                              let formatted_end_date = selectionInfo.end.getFullYear() + "-" + (selectionInfo.end.getMonth() +1) + "-" + (selectionInfo.end.getDate()) ;

                              //-----------------------//

                              //Insert planif data to planifications "table"  
                              $.ajax({
                                  method : 'GET',
                                  url : 'storeData',
                                  data : {
                                      title : title ,
                                      start : formatted_start_date ,
                                      end : formatted_end_date ,
                                      num_demande : num_demande                                     
                                  },
                                  success : function(msg){
                                    if (msg == "Existe") {
                                      swal.fire({
                                                  title : "Alert" ,
                                                  text : 'La demande est deja planifier !' ,
                                                  icon : "warning",
                                                }); 
                                    } else {
                              
                                        let num_dmnd = $(".sal_dmnd_form #_inp_num_dmnd").val();
                                        let id_rsv_sal = $(".sal_dmnd_form #_inp_id_rsv_sal").val();
                                        let date_rsv = $(".sal_dmnd_form #_inp_date_rsv").val();
                                        let theme = $(".sal_dmnd_form #inpt_theme").val();
                                        let heure_d = $(".sal_dmnd_form #inpt_hr_debut").val();
                                        let heure_f = $(".sal_dmnd_form #inpt_hr_fin").val();
                                        let salle = $(".sal_dmnd_form #inpt_select_sal option:selected").val();
                                
                                        //Insert into "rsv_salles" table
                                        $.ajax({
                                              method : 'GET' ,
                                              url : 'updateSalEventDetail' , 
                                              data : { 
                                                        num_dmnd: num_dmnd,
                                                        id_rsv_sal: id_rsv_sal,
                                                        theme: theme,
                                                        date_rsv: date_rsv,
                                                        heure_d: heure_d,
                                                        heure_f: heure_f,
                                                        salle: salle
                                                      },
                                                                    
                                              success : function(msg){
                                                    swal.fire({
                                                          title : "success" ,
                                                          text : 'La demande a été planifier avec succée ...' ,
                                                          icon : "success",
                                                      }); 
                                                      
                                                      setTimeout(function(){
                                                          location.reload();    
                                                      }, 1200);
                                              }

                                        });//end ajax  
                                      
                                    }
                                  }//success               
                                  });//ajax end
                          }
                          

                          function display_event_detail_v(info) {
                            $(".vehc_dmnd_form").prop('hidden' , false);
                            let num_dmnd = parseInt(info.event.title.replace('Demande N:' , '')) ;
                            //alert(num_dmnd );
                            $.ajax({
                              method : 'GET' ,
                              url : 'displayEventDetail' , 
                              data : { num_dmnd: num_dmnd },
                                                    
                              success : function(data){
                                  //console.log(data.results1);
                                  //console.log(data.results2);
                                  $(".vehc_dmnd_form #_inp_num_dmnd").val(data.results1.num_demande);
                                  $(".vehc_dmnd_form #_inp_id_rsv_vehc").val(data.results1.id_rsv_vehc);
                                  $(".vehc_dmnd_form #_inp_demandeur").val(data.results1.nom_emp+" "+data.results1.prenom_emp);
                                  $(".vehc_dmnd_form #_inp_date_demande").val(data.results1.date_dmnd);
                                  $(".vehc_dmnd_form #_inp_date_rsv").val(data.results1.date_rsv);
                                  $(".vehc_dmnd_form #_inp_motif").val(data.results1.motif);
                                  $(".vehc_dmnd_form #_inp_dest").val(data.results1.dest);
                                  $(".vehc_dmnd_form #_inp_date_dep").val(data.results1.date_dep);
                                  $(".vehc_dmnd_form #_inp_date_retr").val(data.results1.date_est_retour);
                                  $(".vehc_dmnd_form #_inp_heur_dep").val(data.results1.heure_dep);
                                  $(".vehc_dmnd_form #_inp_heur_retr").val(data.results1.heure_retr);
                                  $(".vehc_dmnd_form #select_type_vehc #op1").text(data.results2.type);
                                  $(".vehc_dmnd_form #select_model_vehc option:selected").text(data.results2.marque);
                                  $(".vehc_dmnd_form #_inp_num_parc").val(data.results1.num_parc);

                                  if (data.results1.chauffeur == 1 /*true*/) {
                                      $(".vehc_dmnd_form #_chfr_checkbox").prop('checked' , true);
                                  } else {
                                      $(".vehc_dmnd_form #_chfr_checkbox").prop('checked' , false);
                                  }
                                  
                                  }
                              });//end ajax  

                              //récupérer la list des models des vehicules
                              $.ajax({
                                    method: 'GET',
                                    url: 'modelVechList',
                                    data: {},
                                    success: function(list_vehc){
                                        $(".vehc_dmnd_form #select_model_vehc").empty();
                                        $.each(list_vehc , function(index,value){
                                            $(".vehc_dmnd_form #select_model_vehc").append(`<option>`+value.marque+`</option>`);
                                        });
                                    }
                                });//end ajax

                                //récupérer la list des types des vehicules
                                $.ajax({
                                    method: 'GET',
                                    url: 'typeVechList',
                                    data: {},
                                    success: function(list_types_vehc){//suit
                                        $(".vehc_dmnd_form #select_type_vehc").empty();
                                        
                                        $.each(list_types_vehc , function(index,value){
                                            $(".vehc_dmnd_form #select_type_vehc").append(`<option>`+value.type+`</option>`);
                                        });
                                    }
                                });//end ajax
                            
                          }


                          function display_event_detail_s(info) {
                            //call func
                            formulaire_sal_style();
                            $(".sal_dmnd_form").prop('hidden' , false);
                            let num_dmnd = parseInt(info.event.title.replace('Demande N:' , '')) ;
                          
                            $.ajax({
                                method : 'GET' ,
                                url : 'displayEventDetail' , 
                                data : { num_dmnd: num_dmnd },
                                                      
                                success : function(data){
                                    //console.log(data);
                                    $(".sal_dmnd_form #_inp_num_dmnd").val(data.num_demande);
                                    $(".sal_dmnd_form #_inp_id_rsv_sal").val(data.id_rsv_sal);
                                    $(".sal_dmnd_form #_inp_demandeur").val(data.nom_emp+" "+data.prenom_emp);
                                    $(".sal_dmnd_form #_inp_date_rsv").val(data.date_rsv);
                                    $(".sal_dmnd_form #inpt_theme").val(data.theme);
                                    $(".sal_dmnd_form #inpt_hr_debut").val(data.heur_d.replace(':00.0000000' , ''));
                                    $(".sal_dmnd_form #inpt_hr_fin").val(data.heur_f.replace(':00.0000000' , ''));
                                    $(".sal_dmnd_form #inpt_select_sal #op1").text(data.designation);
                                    
                                }
                            });//end ajax  

                            //récupérer la list des Salles
                            $.ajax({
                                    method: 'GET',
                                    url: 'SallesList',
                                    data: {},
                                    success: function(list_salles){
                                        $(".sal_dmnd_form #inpt_select_sal").empty();
                                        $.each(list_salles , function(index,value){
                                            $(".sal_dmnd_form #inpt_select_sal").append(`<option>`+value.designation+`</option>`);
                                        });
                                    }
                            });//end ajax


                          }
                

                          function modify_event_data_v() {

                            let num_dmnd = $("#event_modal #_inp_num_dmnd").val();
                            let date_rsv = $("#event_modal #_inp_date_rsv").val();
                            let motif = $("#event_modal #_inp_motif").val();
                            let dest = $("#event_modal #_inp_dest").val();
                            let date_dep = $("#event_modal #_inp_date_dep").val();
                            let date_est_retour = $("#event_modal #_inp_date_retr").val();
                            let heure_dep = $("#event_modal #_inp_heur_dep").val();
                            let heure_retr = $("#event_modal #_inp_heur_retr").val();
                            let type_vehc = $("#event_modal .vehc_dmnd_form #select_type_vehc option:selected").text();
                            let model_vehc = $("#event_modal #select_model_vehc option:selected").text();
                            let num_parc = $("#event_modal #_inp_num_parc").val();
                            let id_rsv_vehc = $("#event_modal #_inp_id_rsv_vehc").val();

                            let checkbox_status;
                            
                            if ($('#event_modal #_chfr_checkbox').prop('checked')) {
                                  checkbox_status = "True" ;
                            } else {
                                  checkbox_status = "False" ;
                            }

                            $.ajax({
                                  method : 'GET' ,
                                  url : 'updateVechEventDetail' , 
                                  data : { 
                                            num_dmnd: num_dmnd,
                                            id_rsv_vehc: id_rsv_vehc,
                                            date_rsv: date_rsv,
                                            motif: motif,
                                            dest: dest,
                                            date_dep: date_dep,
                                            date_est_retour: date_est_retour,
                                            heure_dep: heure_dep,
                                            heure_retr: heure_retr,
                                            type_vehc: type_vehc ,
                                            model_vehc: model_vehc,
                                            num_parc: num_parc,
                                            checkbox_status: checkbox_status
                                          },
                                                        
                                  success : function(msg){

                                        swal.fire({
                                              title : "Modifier" ,
                                              text : msg.msg ,
                                              icon : "success",
                                          });   
                                  }

                            });//end ajax  
                          }


                          function modify_event_data_s() {

                            let num_dmnd = $("#event_modal #_inp_num_dmnd").val();
                            let id_rsv_sal = $("#event_modal #_inp_id_rsv_sal").val();
                            let date_rsv = $("#event_modal #_inp_date_rsv").val();
                            let theme = $("#event_modal #inpt_theme").val();
                            //alert(theme);
                            let heure_d = $("#event_modal #inpt_hr_debut").val();
                            let heure_f = $("#event_modal #inpt_hr_fin").val();
                            let salle = $("#event_modal #inpt_select_sal option:selected").val();

                            $.ajax({
                                  method : 'GET' ,
                                  url : 'updateSalEventDetail' , 
                                  data : { 
                                            num_dmnd: num_dmnd,
                                            id_rsv_sal: id_rsv_sal,
                                            theme: theme,
                                            date_rsv: date_rsv,
                                            heure_d: heure_d,
                                            heure_f: heure_f,
                                            salle: salle
                                          },
                                  success : function(msg){
                                        swal.fire({
                                              title : "Modifier" ,
                                              text : msg.msg ,
                                              icon : "success",
                                          });   
                                  }

                            });//end ajax  
                          }
                  });//fin de full calendar script  
                    
            </script>
@endsection

        