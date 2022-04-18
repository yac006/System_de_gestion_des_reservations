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
    calendar.setOption('height', 730);

    calendar.render();

    document.querySelector('.fc-dayGridMonth-button').innerHTML = "Mois";
    document.querySelector('.fc-dayGridWeek-button').innerHTML = "Semaine";
    document.querySelector('.fc-dayGridDay-button').innerHTML = "Jour";
    document.querySelector('.fc-today-button').innerHTML = "Aujourd'hui";
});