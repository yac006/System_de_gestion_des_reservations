<div class="container mt-5 table_cont">
    <!--Gest employees Modal -->
    <div class="modal fade" id="GestEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un vehicule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <input id="gs_emp_inp_nom" type="text" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input id="gs_emp_inp_prenom" type="text" class="form-control" placeholder="Prénom">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input id="gs_emp_inp_type" type="text" class="form-control" placeholder="Type">
                    </div>
                </div>
                <div class="row">
                    <select id="input_slct_poste" class="form-control">
                        <option selected>Choose...</option>
                        <option>Chargé HSE</option>
                        <option>vulcanisateur</option>
                        <option>Paye</option>
                        <option>Help Desk</option>
                        <option>Chef Dpt</option>
                        <option>Chef Dpt</option>
                        <option>Personnel</option>
                        <option>Chargé EXP</option>
                        <option>Chef HSE</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <input id="gs_emp_inp_tele" type="text" class="form-control" placeholder="Télé">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="gs_emp_btn_modfier" type="button" class="btn btn-warning" hidden>Modifier</button>
                <button id="gs_emp_btn_ajoute" type="button" class="btn btn-primary">Ajouter</button>
            </div>
            </div>
        </div>
    </div>

    <table id="gst_employes_table" class="display cell-border">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Poste</th>
                <th>Type</th>
                <th>Tél</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
                
        </tbody>
    </table>

</div>


@section('DataTables_script')
<script>
    $(document).ready( function () {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        $.ajax({
            method : 'GET' ,
            url : 'getEmployesData' , 
            data : {},                 
            success : function(results){ 
                var table = $('#gst_employes_table').DataTable({
                    
                    data: results ,

                    columns: [
                                { 'data': 'num_emp' },
                                { 'data': 'nom_emp' },
                                { 'data': 'prenom_emp' },
                                { 'data': 'poste' },
                                { 'data': 'type' },
                                { 'data': 'tele' },
                            ],
                    order: [[1, 'asc']],

                    columnDefs: [
                            { "width": "1%", "targets": 0 },
                            { "width": "11%", "targets": 1 },
                            { "width": "11%", "targets": 2 },
                            { "width": "4%", "targets": 3 },
                            { "width": "4%", "targets": 4 },
                            { "width": "8%", "targets": 5 },
                            { "width": "20%", "targets": 6 },
                            {
                                targets: 6,
                                data: null,
                                defaultContent: '<button id="gs_emp_btn_update" class="btn btn-warning">Modifier</button><button id="gs_emp_btn_delete" class="btn btn-info">Supprimer</button><button id="gs_emp_btn_bloque" class="btn btn-danger">Bloquer</button>',
                            },
                        ],
                });//end DataTable


            //Si le button modifier a été cliquer
            $('#gst_employes_table tbody').on('click', '#gs_emp_btn_update', function () {
            
                var data = table.row($(this).parents('tr')).data();
                let num_emp = data['num_emp'];
                //alert(id_vehc);

                $("#GestEmpModal").modal('show');
                //afficher le button modifier
                $("#gs_emp_btn_modfier").prop('hidden' , false);
                //cacher le button ajouter
                $("#gs_emp_btn_ajoute").prop('hidden' , true);

        
                let id = num_emp;
                //recuperer la list des employes
                $.ajax({
                        method : 'GET' ,
                        url : 'getSelectedEmployesData/'+id, 
                        data : {}, 
                        success : function(results){  
                            
                            $("#gs_emp_inp_nom").val(results.nom_emp);
                            $("#gs_emp_inp_prenom").val(results.prenom_emp);
                            $("#input_slct_poste option:selected").text(results.poste);
                            $("#gs_emp_inp_type").val(results.type);
                            $("#gs_emp_inp_tele").val(results.tele);
                                
                        }//end success
                    });//end ajax 
                    //-----------------//

                    //Si le button Modal->Modifier(form) a été cliquer
                    $('.modal-footer').on('click', '#gs_emp_btn_modfier', function () {
                        
                        let nom = $("#gs_emp_inp_nom").val();
                        let prenom = $("#gs_emp_inp_prenom").val();
                        let type = $("#gs_emp_inp_type").val();
                        let poste = $("#input_slct_poste").val();
                        let tele = $("#gs_emp_inp_tele").val();


                        //var data = table.row($(this).parents('tr')).data();
                        let id = data['num_emp'] ;
                        //alert(id);

                        $.ajax({
                                method : 'PUT' ,
                                url : 'updateEmployesData/'+id, 
                                data : {
                                    nom: nom,
                                    prenom: prenom,
                                    type: type,
                                    poste: poste,
                                    tele: tele

                                }, 
                                success : function(msg){     
                                
                                    if (msg == "success") {
                                        swal.fire({
                                                icon : "success", 
                                                title : "Modifier" ,
                                                text : "L'enregistrement a été Modifier ...." ,                                     
                                        });

                                        setTimeout(function(){
                                            location.reload();    
                                        }, 1200);
                                    }
                                        
                                }//end success

                            });//end ajax 

                

                    
                    });//end on click btn   
            
            });//end on click btn


            //Si le button supprimer a été cliquer 
            $('#gst_employes_table tbody').on('click', '#gs_emp_btn_delete', function () {
                var data = table.row($(this).parents('tr')).data();
                let id = data['num_emp'];

                $.ajax({
                        method : 'DELETE' ,
                        url : 'deleteEmployes/'+id , 
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
                                    text : "Le l'enregistrement a été Supprimer ...." ,                                     
                                });
                            }

                            setTimeout(function(){
                                    location.reload();    
                                }, 1200);
                                
                        }//end success

                });//end ajax 



            });//end on click function

            //Si le button bloquer a été cliquer 
            $("#gst_employes_table tbody").on('click' , '#gs_emp_btn_bloque' , function(){
                var data = table.row($(this).parents('tr')).data();
                let num_emp = data['num_emp'];

                $.ajax({
                        method : 'POST' ,
                        url : 'bloqueEmployes', 
                        data : {num_emp: num_emp}, 
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

                            setTimeout(function(){
                                    location.reload();    
                                }, 1200);
                                
                        }//end success

                });//end ajax 

            });

            }//end success
        });//end ajax



    });//end doc ready
</script>
@endsection



