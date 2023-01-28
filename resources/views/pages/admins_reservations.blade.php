<h4 style="text-align: center;margin-top: 20px">Réservations des Admins</h4>

<div class="_princp_cont" id="princp_cont">
    <div class="row _card_container">
        <div class="col-md-6 column">
            <div class="card border-dark mb-3" id="_vehic_card">
                <div class="card-header">Vehicules</div>
                <div class="card-body text-dark hvr-grow"  style="padding-top: 0" id="vehic_card_body">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('images/img/gettyimages-583697924-612x612.jpg')}}">
                        <div class="card-body">
                            <h5>Réservations des Vehicules</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 column">
            <div class="card border-dark mb-3" id="_sal_card">
                <div class="card-header">Salles</div>
                <div class="card-body text-dark hvr-grow" style="padding-top: 0" id="salle_card_body">
                    <div class="card"  >
                        <img class="card-img-top" src="{{asset('images/img/27567375-vector-illustration-of-boardroom.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5>Réservations des salles</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End paincip Cont-->

<!-- ---------- Model afficher le plannig (Full calendar) --------- -->
<div class="modal" tabindex="-1" role="dialog" id="show_pln_modal">
<div class="modal-dialog" role="document" style="max-width: 728px;">
    <div class="modal-content" style="height: 580px;">
    <div class="modal-body">
        
        <div id='calendar' style="width:100%; margin: 0px auto;" ></div> 
        
    </div>
    </div>
</div>
</div>
<!-- -------------- End modal ---------------- -->


@include('components.form_for_rsv_vehicules')
@include('components.form_for_rsv_salles')


@section('admins_rsv_script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            var clicked_card;

            $("#salle_card_body").animate({opacity:'1' , top: 0 , right: 0} , 1500);
            $("#vehic_card_body").animate({opacity:'1' , top: 0 , right: 0 } , 1500);


            //Si Vehicules card a été cliquer 
            $("#_vehic_card").click(function(){
                $("._princp_cont").prop('hidden' , true);
                $(".vehc_form_cont").prop('hidden' , false);
                clicked_card = "Vehicules";
            });

            //Si Salles card a été cliquer 
            $("#_sal_card").click(function(){
                $("._princp_cont").prop('hidden' , true);
                $(".salles_form_cont").prop('hidden' , false);
                clicked_card = "Salles";
            });

            //Si le button envoyer a été cliquer
            $("#_btn_send_v , #_btn_send_s").click(function(){
                    /*----- salle inpt form ------*/
                    let user_id = $("#user_id_input").val();
                    let num_employe = $("#user_id_input").val();
                    let type_rsv = clicked_card ;
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
                                swal.fire({
                                            title : "Envoyer" ,
                                            text : "La demande a été envoyer avec succée ....",
                                            icon : "success",                                       
                                        });
                                //vider les inputs de formulaire            
                                $("#exampleModal_rsv input").val('');
                                //fermer l'animation waitMe
                                $("._card_container").waitMe('hide');
                                
                            },
                            error: function (){
                                    alert("Error Ajax !!!");
                            }
                    });//end ajax
                });

    

                //Si Salles card a été cliquer
            $("#_sal_card").click(function(){
                $("._card_container").prop('hidden' , true);
            });

        });
    </script>
@endsection

@section('full_calendar_script')
    <script>
            //$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            document.addEventListener('DOMContentLoaded', function() {   
            $("#_btn_showCalendar_v , #_btn_showCalendar_s").click(function(){
                $("#show_pln_modal").modal('show');
                //alert();

                let type_btn = $(this).attr('id');


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
                eventColor: "#fb7906",

                events : check_type_pln(type_btn),
                
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
                function check_type_pln(type_btn) {
                    if (type_btn == "_btn_showCalendar_v") {
                        return "retrieveVechPlan" ;//route 
                    }
                    if (type_btn == "_btn_showCalendar_s") {
                        return "retrieveSalPlan" ;//route 
                    }
                } ; 

            });//en on click btn
        });//fin de full calendar script
    </script>
@endsection
