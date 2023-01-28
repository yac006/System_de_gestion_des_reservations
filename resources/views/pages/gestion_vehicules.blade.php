<h4 style="text-align: center; margin-top: 30px">Gestion des Vehicules</h4> 

<button type="button" id="add_vech_btn" class="btn btn-primary">Ajouter un Vehicule</button>

<!--Insert vehc Modal -->
<div class="modal fade" id="insertVehcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input id="inp_marque_v" type="text" class="form-control" placeholder="marque">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input id="inp_immat_v" type="text" class="form-control" placeholder="immat">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input id="inp_numparc_v" type="text" class="form-control" placeholder="num parc">
                </div>
            </div>
            <div class="row">
                <select id="input_slct_type_vehc" class="form-control">
                    <option selected>Choose...</option>

                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="btn_modfier_v" type="button" class="btn btn-warning" hidden>Modifier</button>
            <button id="btn_ajoute_v" type="button" class="btn btn-primary">Ajouter</button>
        </div>
        </div>
    </div>
</div>



<div class="container mt-5 table_cont">    
    <table id="vehc_table" class="display cell-border" style="background-color: #fff">

        <thead>
            <tr>
                <th>N°</th>
                <th>Marque</th>
                <th>Matricule</th>
                <th>Num parc</th>
                <th>Type vehicule</th>
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

        let id_role = $("#user_id_role_input").val();

        $.ajax({
            method : 'GET' ,
            url : 'getVehicules' , 
            data : {},                 
            success : function(results){     
                //console.log(results);

                var table = $('#vehc_table').DataTable({
                
                data: results ,
                
                columns: [
                        { 'data': 'id_vehc' },
                        { 'data': 'marque' },
                        { 'data': 'immat' },
                        { 'data': 'num_parc' },
                        { 'data': 'type' }
                    ],
                    order: [[1, 'asc']],

                    columnDefs: [
                    { "width": "2%" , "targets": 0 },
                    { "width": "4%", "targets": 1 },
                    { "width": "2%", "targets": 2 },
                    { "width": "3%", "targets": 3 },
                    { "width": "9%", "targets": 4 },
                    { "width": "9%", "targets": 5 },

                    {
                        targets: 5,
                        data: null,
                        defaultContent: '<button id="btn_update_v" class="btn btn-info">Modifier</button><button id="btn_delete_v" class="btn btn-secondary">Supprimer</button>',
                    },
                ],

            
            });//end DataTable

            //Si button add vehicule a été cliquer
            $("#add_vech_btn").click(function(){
                //cacher le button modifier
                $("#btn_modfier_v").prop('hidden' , true);
                //afficher le modal
                $("#insertVehcModal").modal('show');

                let id = 1;
                //recuperer la list des type vehicules
                $.ajax({
                        method : 'GET' ,
                        url : 'getListTypeVehc/'+id , 
                        data : {}, 
                        success : function(results){     
                                
                            $("#input_slct_type_vehc").empty();

                            $.each(results, function(index , value){
                                $("#input_slct_type_vehc").append(`<option>`+value.type+`</option>`);
                            });
                        
                                
                        }//end success

                    });//end ajax 
            });
        
            //Si le button Ajouter a été cliquer
            $('.modal-footer').on('click', '#btn_ajoute_v', function () {
            
                let marque = $("#inp_marque_v").val();
                let immat = $("#inp_immat_v").val();
                let num_parc = $("#inp_numparc_v").val();
                let type_vech = $("#input_slct_type_vehc").val();

                $.ajax({
                        method : 'POST' ,
                        url : 'addVehicules', 
                        data : {
                            marque: marque,
                            immat: immat,
                            num_parc: num_parc,
                            type_vech: type_vech
                        }, 
                        success : function(msg){     
                        
                            if (msg == "success") {
                                swal.fire({
                                        icon : "success", 
                                        title : "Ajouter" ,
                                        text : "Le vehicule a été ajouter ...." ,                                     
                                });

                                setTimeout(function(){
                                    location.reload();    
                                }, 1200);
                            }
                                
                        }//end success

                    });//end ajax 

        
    
            
            });//end on click btn    

            
            //Si le button modifier a été cliquer
            $('#vehc_table tbody').on('click', '#btn_update_v', function () {
            
                var data = table.row($(this).parents('tr')).data();
                let id_vehc = data['id_vehc'];
                //alert(id_vehc);

                $("#insertVehcModal").modal('show');
                //afficher le button modifier
                $("#btn_modfier_v").prop('hidden' , false);

                let id = 1;
                //recuperer la list des type vehicules
                $.ajax({
                        method : 'GET' ,
                        url : 'getListTypeVehc/'+id , 
                        data : {}, 
                        success : function(results){     
                                
                            $("#input_slct_type_vehc").empty();

                            $.each(results, function(index , value){
                                $("#input_slct_type_vehc").append(`<option>`+value.type+`</option>`);
                            });
                        
                                
                        }//end success

                    });//end ajax 

                    //-----------------//

                    //Si le button Modal->Modifier(form) a été cliquer
                    $('.modal-footer').on('click', '#btn_modfier_v', function () {
                        
                        let marque = $("#inp_marque_v").val();
                        let immat = $("#inp_immat_v").val();
                        let num_parc = $("#inp_numparc_v").val();
                        let type_vech = $("#input_slct_type_vehc").val();


                        //var data = table.row($(this).parents('tr')).data();
                        let id = data['id_vehc'] ;
                        //alert(id);

                        $.ajax({
                                method : 'PUT' ,
                                url : 'updateVehicules/'+id, 
                                data : {
                                    marque: marque,
                                    immat: immat,
                                    num_parc: num_parc,
                                    type_vech: type_vech
                                }, 
                                success : function(msg){     
                                
                                    if (msg == "success") {
                                        swal.fire({
                                                icon : "success", 
                                                title : "Modifier" ,
                                                text : "Le vehicule a été Modifier ...." ,                                     
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
            $('#vehc_table tbody').on('click', '#btn_delete_v', function () {

                var data = table.row($(this).parents('tr')).data();
                let id = data['id_vehc'];

                
                $.ajax({
                        method : 'DELETE' ,
                        url : 'deleteVehicules/'+id , 
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
                                    text : "Le vehicule a été Supprimer ...." ,                                     
                                });
                            }

                            setTimeout(function(){
                                    location.reload();    
                                }, 1200);
                                
                        }//end success

                });//end ajax 



            });//end on click function



        }//end success

    });//end ajax 

});//end doc ready
</script>
@endsection