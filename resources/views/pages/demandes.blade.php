<h4 style="text-align: center; margin-top: 30px">Historique des demandes </h4> 

<div class="container mt-5 table_cont">

    <table id="validation_table" class="display cell-border">
        <thead>
            <tr>
                <th>N°</th>
                <th>Type</th>
                <th>Date</th>
                <th>Demandeur</th>
                <th>Statut</th>
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
            url : 'getValidationData' , 
            data : {id_role: id_role },                 
            success : function(results){     
                //console.log(results);
                var table = $('#validation_table').DataTable({
                
                data: results ,
                
                columns: [
                        { 'data': 'num_demande' },
                        { 'data': 'type_dmnd' },
                        { 'data': 'date_val' },
                        { 'data': 'nom_emp' },
                        { 'data': 'valider' },
                        
                    ],
                    order: [[1, 'asc']],

                    columnDefs: [
                    { "width": "2%" , "targets": 0 },
                    { "width": "3%", "targets": 1 },
                    { "width": "3%", "targets": 2 },
                    { "width": "5%", "targets": 3 },
                    { "width": "2%", "targets": 4 },
                    { "width": "10%", "targets": 5 },
                    {
                        targets: 5,
                        data: null,
                        defaultContent: '<button id="btn_vld" class="btn btn-info">Valider</button><button id="btn_rfs" class="btn btn-danger">Refuser</button>',
                    },
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
                    {
                        targets : 3,
                        render: function (data, type, row) {
                            return data + ' ' + row.prenom_emp +'';
                        },
                    }
                ],

            
            });//end DataTable

            //Si le button valider a été cliquer
            $('#validation_table tbody').on('click', '#btn_vld', function () {
                //lancer l'animation wait si le btn valider a été cliquer
                $('#validation_table').waitMe({
                    effect : 'stretch',
                    text : '',
                    maxSize : '40',                 
                    textPos : 'horizontal',
                });

                var data = table.row($(this).parents('tr')).data();
                //alert(data['num_demande'] + "'s salary is: " + data['type_dmnd']);

                $.ajax({
                    method : 'POST' ,
                    url : 'validate' , 
                    data : {num_dmnd: data['num_demande'] , num_emp: data['num_emp'] }, 
                    success : function(msg){ 
                            $("#validation_table").waitMe('hide'); 

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
                                        title : "Valider" ,
                                        text : "La demande a été valider avec succée ..." ,                                     
                                    });
                            }

                            setTimeout(function(){
                                location.reload();    
                            }, 1500);
                            
                    }//end success

                });//end ajax 


                
            });



            //Si le button refuser a été cliquer
            $("#validation_table tbody").on('click' , '#btn_rfs' , function(){
                //lancer l'animation wait si le btn refuser a été cliquer
                $('#validation_table').waitMe({
                    effect : 'stretch',
                    text : '',
                    maxSize : '40',                 
                    textPos : 'horizontal',
                });
                
                var data = table.row($(this).parents('tr')).data();

                $.ajax({
                    method : 'POST' ,
                    url : 'reject' , 
                    data : {num_dmnd: data['num_demande'] , num_emp: data['num_emp'] }, 
                    success : function(msg){
                            $("#validation_table").waitMe('hide');
                            
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

                            setTimeout(function(){
                                location.reload();    
                            }, 1500);

                    }//end success

                });//end ajax 




            });


        }//end success

    });//end ajax 

});//end doc ready
</script>
@endsection








