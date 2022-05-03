

        {{-- Container Start --}}
        <div class="container my-1 alert">

            <div id='calendar'  style="width:92%;  margin: 0px auto ;"></div> 


            <!---------- Modal Dialog D'insertion --------------> 
            <div class="modal fade bd-example-modal-lg" id="insert_model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog  new_model_lg">
                    <div class="modal-content" style="font-size: 15px ; height: auto ; background: rgba(247, 247, 247, 1) ;">
                            <div class="card card-small">
                              <div class="card-header border-bottom" style="background-color:#a1b2fb">
                                <h6 class="m-0">Details</h6>
                              </div>
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                  <div class="row">
                                    <div class="col">
                                      <form>
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="fetitle">Title</label>
                                            <input type="text" class="form-control model_inputs" id="fetitle" placeholder="title"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="feClient">Client</label>
                                            <input type="text" class="form-control model_inputs" id="feClient" placeholder="type de client"> </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="feNom">Nom</label>
                                            <input type="text" class="form-control model_inputs" id="feNom" placeholder="nom de client"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="fePrenom">Prénom</label>
                                            <input type="text" class="form-control model_inputs" id="fePrenom" placeholder="prénom de client"> </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="feAddress">Address</label>
                                          <input type="text" class="form-control model_inputs" id="feAddress" placeholder=""> </div>
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="feEmail">Email</label>
                                            <input type="email" class="form-control model_inputs" id="feEmail"> </div>
                                          <div class="form-group col-md-4">
                                            <label for="feReservation" style="color: rgb(233, 159, 23)">Réservation</label>
                                            <select id="feReservation" class="form-control">
                                              <option selected>Choisir ....</option>
                                              <option>Salle</option>
                                              <option>Véhicule</option>
                                            </select>
                                          </div>
                                          <div class="form-group col-md-2">
                                            <label for="feTele">télé</label>
                                            <input type="text" class="form-control" id="feTele"> </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                              <div class="container_btn" style="background: #f1f1f1;"> 
                                <button type="submit" class="btn btn-outline-danger" id="btn_save">Enregistrer</button>
                            </div>
                            </div>
                    </div>
                </div>
            </div>

            <!---------- Modal Dialog D'insertion --------------> 
            <div class="modal fade bd-example-modal-lg" id="display_model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog  new_model_lg">
                  <div class="modal-content" style="font-size: 15px ; padding: 7px; height: 470px; border: dotted 2px red">
    
                        
                  </div>
              </div>
          </div>


        </div>  <!-- Container ends -->


        @section('full_calendar_script')

                <script>
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
                            eventColor: '#ae86f7' ,
                            
                            events : 'getData',

                            eventClick : function(info) {
                                $(document).ready(function(){                     
                                    const swalWithBootstrapButtons = Swal.mixin({
                                        customClass: {
                                          confirmButton: 'btn btn-primary',
                                          cancelButton: 'btn btn-danger'
                                        },
                                        buttonsStyling: false
                                    })

                                      swalWithBootstrapButtons.fire({
                                          title: 'Veuillez choisir une action !',
                                          text: "You won't be able to revert this!",
                                          icon: 'info',
                                          showCancelButton: true,                   
                                          confirmButtonText: 'Voir',
                                          cancelButtonText: 'supprimer',
                                          reverseButtons: false
                                      }).then((result) => {
                                        if (result.isConfirmed) {
                                        
                                            $("#display_model").modal("show");
                                          
                                        } else {

                                          let title = info.event.title ;

                                          $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                          });
                                          //-----------------------//
                                          $.ajax({
                                            method : 'DELETE' ,
                                            url : 'deleteData' , 
                                            data : { title : title },
                                                                  
                                            success : function(){
                                                swal.fire({
                                                  icon : "success",
                                                  title : "Supprimer",
                                                  text : "L'évenement a été Supprimer avec succée ...."
                                                });
                                                location.reload();
                                            }
                                        });               
                                        }                        
                                      })
                                });      
                            },

                            select : function(selectionInfo){
                                $(document).ready(function(){
                                    $("#insert_model").modal('show');
                                    $("#btn_save").click(function(){

                                        let title = $("#fetitle").val();
                                        let formatted_start_date = selectionInfo.start.getFullYear() + "-" + (selectionInfo.start.getMonth() +1) + "-" + selectionInfo.start.getDate() ;
                                        let formatted_end_date = selectionInfo.end.getFullYear() + "-" + (selectionInfo.end.getMonth() +1) + "-" + (parseInt(selectionInfo.end.getDate())) ;
                                        //alert(selectionInfo.start.getDate());

                                        let type_client = $("#feClient").val();
                                        let nom = $("#feNom").val();
                                        let prenom = $("#fePrenom").val();
                                        let address = $("#feAddress").val();
                                        let email = $("#feEmail").val();
                                        let type_rsv = $("#feReservation").val();
                                        let tele = $("#feTele").val();
                                      
                                      //-----------------------//    
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        //-----------------------//   
                                        $.ajax({
                                            method : 'GET',
                                            url : 'storeData',
                                            data : {
                                                title : title ,
                                                start : formatted_start_date ,
                                                end : formatted_end_date ,
                                                t_client : type_client ,
                                                nom : nom ,
                                                prenom : prenom ,
                                                address : address ,
                                                email : email ,
                                                t_rsv : type_rsv ,
                                                tele : tele                                          
                                            },
                                            success : function(){                   
                                                swal.fire({
                                                  title : "Enregistrer" ,
                                                  text : "L'évenement été enregistrer avec succée ....",
                                                  icon : "success",                                       
                                                }); 
                                                location.reload();                                  
                                            }
                                        });
                                      });


                                });                       
                            },

                            eventDrop : function(info) {                
                                $(document).ready(function(){ 
                                      let title = info.event.title ; 
                                      let formatted_start_date = info.event.start.getFullYear() + "-" + (info.event.start.getMonth()+1) + "-" + info.event.start.getDate() ;                      
                                      let formatted_end_date = info.event.end.getFullYear() + "-" + (info.event.end.getMonth()+1) + "-" + info.event.end.getDate() ;
                                      //alert(formatted_start_date +' '+ formatted_end_date);
                                                  //-----------------------//    
                                      $.ajaxSetup({
                                          headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          }
                                      });
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
                                                        icon : "success"                                       
                                                      });                       

                                          }
                                      });
                              


                                });

                            },

                            eventResize : function(info){
                                $(document).ready(function(){
                                      
                                      let title = info.event.title ; 
                                      let formatted_start_date = info.event.start.getFullYear() + "-" + (info.event.start.getMonth()+1) + "-" + (info.event.start.getDate()) ;                      
                                      let formatted_end_date = info.event.end.getFullYear() + "-" + (info.event.end.getMonth()+1) + "-" + (info.event.end.getDate()-1) ;
                                      //alert(formatted_start_date +' '+ formatted_end_date);
                                                  //-----------------------//    
                                      $.ajaxSetup({
                                          headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          }
                                      });
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
                          calendar.setOption('locale' , 'fr');
                          calendar.setOption('height', 540);

                          calendar.render();

                          document.querySelector('.fc-dayGridMonth-button').innerHTML = "Mois";
                          document.querySelector('.fc-dayGridWeek-button').innerHTML = "Semaine";
                          document.querySelector('.fc-dayGridDay-button').innerHTML = "Jour";
                          document.querySelector('.fc-today-button').innerHTML = "Aujourd'hui";
                      });
                </script>

        @endsection

