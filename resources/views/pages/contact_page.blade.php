

<div class="container contact_page_cont">
    <div class="row" style="margin-top: 70px;">
        <div class="col-md-7 col-md-offset-3" id="form_container">
            <h2>Contact Us</h2> 
            <p> Please send your message below. We will get back to you at the earliest! </p>
            <form  id="reused_form">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message"> Message :</label>
                        <textarea id="textArea_msg" class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name"> Name :</label>
                        <input type="text" class="form-control" id="inp_name" required readonly>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email"> Email :</label>
                        <input id="email_inp_cont_page" type="email" class="form-control" required readonly>
                    </div>
                </div>
                
            </form>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button id="btn_send"  type="button" class="btn btn-lg btn-default pull-right" >Send &rarr;</button>
                </div>
            </div>
            {{-- <div id="success_message" style="width:100%; height:100%; display:none;"> <h3>Posted your message successfully!</h3> </div>
            <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div> --}}
        </div>

        <!--********************************  LIST DES UTILISATEURS  *********************************-->
        <a href="#" class="col-sm-4 col-md-5 users_list_cont" >
            {{-- <div class="list list-row block">
                    
            </div> --}}
        </a>
    </div>
</div>



@section('contact_page_script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            //lancer l'animation wait si le btn envoyer a été cliquer
            $(".users_list_cont").waitMe({
                                effect : 'facebook',
                                maxSize : '40',                 
                                textPos : 'horizontal',
                            });                       

            //afficher dans le badge le nombre de notification non lue "without click in notif icon"
            $.ajax({
                        method: 'GET' ,
                        url: 'getUsersList' ,
                        success: function (users_list){ 
                            //console.log(users_list);
                            $(".users_list_cont").empty();

                            $.each(users_list , function(index , value){
                                $(".users_list_cont").append(`
                                    <div class="list list-row block" id="`+value.user_id+`">
                                        <div class="list-item">
                                            <div><a  data-abc="true"><span class="w-48 avatar gd-primary"><img src="{{asset('`+value.avatar_path+`')}}"></span></a></div>
                                            <div class="flex">
                                                <a  class="item-author text-color" data-abc="true">`+value.nom_emp+' '+value.prenom_emp+`</a>
                                                <div class="item-except text-muted text-sm h-1x">`+value.email+`</div>
                                            </div>
                                    </div>
                                `);
                            });//en each

                            //fermer l'animation wait
                            $(".users_list_cont").waitMe("hide");
                                
                        },
                    })//end ajax;


                    //Si un utilisateur a été cliquer dans la list des utilisateurs
                    $(".users_list_cont").on('click' , '.block' , function(){
                        $(".users_list_cont .block").css("background-color" , "#fff");
                        $(this).css("background-color" , "#f0f0f0b5");
                        let user_id = this.id ;

                        $.ajax({
                            method: 'GET' ,
                            url: 'getSelectedUser' ,
                            data: {user_id: user_id} ,
                            success: function (user_data){                            
                                //console.log(user_data);
                                $("#inp_name").val(user_data['nom_emp']+" "+user_data['prenom_emp']);
                                $("#email_inp_cont_page").val(user_data['email']);                       
                            },
                        })//end ajax;
                        
                    });//end on click func


                    //Si le button Send a été cliquer
                    $("#btn_send").click(function(){
                            //lancer l'animation wait si le btn envoyer a été cliquer
                            $("#reused_form").waitMe({
                                effect : 'stretch',
                                maxSize : '40',                 
                                textPos : 'horizontal',
                            });  
                            
                            let textarea_msg = $("#textArea_msg").val();
                            let email = $("#email_inp_cont_page").val();
                            
                            
                            $.ajax({
                                method: 'GET' ,
                                url: 'sendMailFromContactPg',
                                data: {
                                        textarea_msg: textarea_msg,
                                        email: email
                                    } ,
                                success: function (msg){ 
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
                                },
                                
                        })//end ajax;
                        
                    });//end on click btn_send
        });//end ready doc
    </script>
@endsection