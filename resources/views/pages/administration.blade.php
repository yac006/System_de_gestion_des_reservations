
<!-- Team -->
<section id="team" class="pb-5 team_section">
    <!--aministration des comptes Modal -->
    <div class="modal fade bd-example-modal-lg" id="adminAccountsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <!-- first row -->
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="">Pseudo</label>
                                <input id="admn_inp_pseudo" type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Email</label>
                                <input id="admn_inp_email" type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Password</label>
                                <input id="admn_inp_password" type="text" class="form-control">
                            </div>
                        </div>
                        <!-- secend row -->
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="">Nom</label>
                                <input id="admn_inp_nom" type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Prenom</label>
                                <input id="admn_inp_prenom" type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Poste</label>
                                <input id="admn_inp_poste" type="text" class="form-control">
                            </div>
                        </div>
                        <!-- thired row -->
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="">Type</label>
                                <input id="admn_inp_type" type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Télé</label>
                                <input id="admn_inp_tele" type="text" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button id="admn_btn_save" type="button" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>



<div class="container">
    {{-- <h5 class="section-title h1">OUR TEAM</h5> --}}
    <div class="row">
        @if (Session::has('all-users'))
            @foreach ( Session::get('all-users') as $item)
                <!-- Team member -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" >
                        <div class="mainflip flip-0">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center new_card_bdy">
                                        <p class="p_cont_img"><img class=" img-fluid" src="{{asset($item->avatar_path)}}" alt="card image"></p>
                                        <h4 class="card_title_name">{{ $item->nom_emp." ".$item->prenom_emp }}</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                        <a href="#" class="btn btn-primary btn-sm">Voir detail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">{{ $item->email }}</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <button id="admn_btn_modifier" type="button" class="btn btn-success btn-sm" value="{{$item->user_id}}">Modifie</button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button id="admn_btn_delete" type="button" class="btn btn-danger btn-sm" value="{{$item->user_id}}">Supprimer</button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button id="admn_btn_bloque" type="button" class="btn btn-warning btn-sm" value="{{$item->user_id}}">Bloquer</button>
                                            </li>
                                            {{-- <li class="list-inline-item">
                                                <button type="button" class="btn btn-primary btn-sm">Contacter</button>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Team member end -->
            @endforeach 
        @else 
            <script>alert('all-users empty!!')</script>   
        @endif 

    </div>
</div>
</section>

@section('administration_accounts_script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});


            //Si le button modifier a été cliquer
            $('.list-inline li').on('click', '#admn_btn_modifier', function () {
                    
                    var user_id = $(this).attr('value');
                    
                    $("#adminAccountsModal").modal('show');
            
                    let id = user_id;
                    //recuperer les données d'utilisateur selectionné
                    $.ajax({
                            method : 'GET' ,
                            url : 'getSelectedUserData/'+id, 
                            data : {}, 
                            success : function(results){  
                                
                                $("#admn_inp_pseudo").val(results.pseudo);
                                $("#admn_inp_email").val(results.email);
                                $("#admn_inp_password").text(results.password);
                                $("#admn_inp_nom").val(results.nom_emp);
                                $("#admn_inp_prenom").val(results.prenom_emp);
                                $("#admn_inp_poste").val(results.poste);
                                $("#admn_inp_type").val(results.type);
                                $("#admn_inp_tele").val(results.tele);
                                    
                            }//end success
                        });//end ajax 
                        //-----------------//

                        //Si le button Modal -> enregistrer a été cliquer
                        $('.modal-footer').on('click', '#admn_btn_save', function () {
                            let pseudo = $("#admn_inp_pseudo").val();
                            let email = $("#admn_inp_email").val();
                            let password = $("#admn_inp_password").text();
                            let nom = $("#admn_inp_nom").val();
                            let prenom = $("#admn_inp_prenom").val();
                            let poste = $("#admn_inp_poste").val();
                            let type = $("#admn_inp_type").val();
                            let tele =$("#admn_inp_tele").val();

                            $.ajax({
                                    method : 'PUT' ,
                                    url : 'updateUserData/'+id, 
                                    data : {
                                        pseudo: pseudo,
                                        email: email,
                                        password: password,
                                        nom: nom,
                                        prenom: prenom,
                                        poste: poste,
                                        type: type,
                                        tele: tele
                                    }, 
                                    success : function(msg){     
                                    
                                        if (msg == "success") {
                                            swal.fire({
                                                    icon : "success", 
                                                    title : "Modifier" ,
                                                    text : "L'enregistrement a été Modifier ...." ,                                     
                                            });
                                        }

                                    }//end success
                                });//end ajax 

                                

                                //Actualiser la page
                                $.ajax({
                                    method : 'get' ,
                                    url : 'refreshAdministrationPage', 
                                    success : function(){     
                                    
                                        location.reload();
                                            
                                    }//end success
                                });//end ajax 

                        });//end on click btn 

            });//end on click btn


            //Si le button supprimer a été cliquer 
            $('.list-inline li').on('click', '#admn_btn_delete', function () {
    
                var user_id = $(this).attr('value');

                let id = user_id;

                $.ajax({
                        method : 'DELETE' ,
                        url : 'deleteUser/'+id , 
                        data : {}, 
                        success : function(msg){ 
                            
                            if (msg == "conflit_fk") {
                                swal.fire({
                                    icon : "error", 
                                    title : "Alert" ,
                                    text : "Il faut d'abord supprimer la demande de réservation qui concerne cette salle !" ,                                     
                                });
                            }
                                
                            if (msg == "success") {
                                swal.fire({
                                    icon : "success", 
                                    title : "Supprimer" ,
                                    text : "l'utilisateur a été Supprimer ...." ,                                     
                                });
                            }
                                
                        }//end success
                });//end ajax 


                //Actualiser la page
                $.ajax({
                        method : 'get' ,
                        url : 'refreshAdministrationPage', 
                        success : function(){     
                        
                            location.reload();
                                
                        }//end success
                });//end ajax 

            });//end on click function


            //Si le button bloquer a été cliquer 
            $('.list-inline li').on('click' , '#admn_btn_bloque' , function(){

                var user_id = $(this).attr('value');

                $.ajax({
                        method : 'POST' ,
                        url : 'bloqueUser', 
                        data : {user_id: user_id}, 
                        success : function(msg){ 
                            
                            if (msg == "not_user_account") {
                                swal.fire({
                                    icon : "warning", 
                                    title : "Alert" ,
                                    text : "Ce compte est un compte administrateur vous pouvez pas Bloquée !" ,                                     
                                });
                            }
                                
                            if (msg == "success") {
                                swal.fire({
                                    icon : "success", 
                                    title : "Bloquée" ,
                                    text : "l'utilisateur a été Bloquée ...." ,                                     
                                });
                            }
                        
                        }//end success
                });//end ajax 

                
                //Actualiser la page
                $.ajax({
                    method : 'get' ,
                    url : 'refreshAdministrationPage', 
                    success : function(){     
                    
                        location.reload();
                            
                    }//end success
                });//end ajax 

            });//end on click btn

        });//end doc ready
    </script>
    
@endsection

