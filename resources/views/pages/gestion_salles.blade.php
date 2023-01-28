<h4 style="text-align: center; margin-top: 30px">Gestion des Salles</h4> 

<button type="button" id="add_sal_btn" class="btn btn-primary">Ajouter une salle</button>



<div class="container mt-5 table_cont">    
    <table id="salle_table" class="display cell-border" style="background-color: #fff">

        <thead>
            <tr>
                <th>N°</th>
                <th>Designation</th>
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
            url : 'getSalles' , 
            data : {},                 
            success : function(results){     
                //console.log(results);

                var table = $('#salle_table').DataTable({
                
                data: results ,
                
                columns: [
                        { 'data': 'num_sal' },
                        { 'data': 'designation' },
                        
                        
                
                    ],
                    order: [[1, 'asc']],

                    columnDefs: [
                    { "width": "5%" , "targets": 0 },
                    { "width": "10%", "targets": 1 },
                    { "width": "3%", "targets": 2 },

                    {
                        targets: 2,
                        data: null,
                        defaultContent: '<button id="btn_update" class="btn btn-warning">Modifier</button><button id="btn_delete" class="btn btn-danger">Supprimer</button>',
                    },
            
                ],

            
            });//end DataTable

            //Si button add salle a été cliquer
            $("#add_sal_btn").click(function(){
    
                const start = async function() {
                    const { value: desg} = await Swal.fire({
                        title: 'Ajouter une Salle',
                        input: 'text',
                        //inputLabel: 'Your email address',
                        inputPlaceholder: 'Designation',
                        confirmButtonText: 'Ajouter',
                        imageUrl: '{{asset("images/img/modern-concrete-meeting-room-interior.jpg")}}',
                        imageWidth: 400,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
            
                            
                        })

                        if (desg) {
                            //Swal.fire(`Entered email: ${desg}`)

                            $.ajax({
                                method : 'POST' ,
                                url : 'addSalles' , 
                                data : {desg: desg}, 
                                success : function(msg){     
                                        
                                    if (msg == "success") {
                                        swal.fire({
                                            icon : "success", 
                                            title : "Ajouter" ,
                                            text : "La salle a été ajouter ...." ,                                     
                                        });

                                        setTimeout(function(){
                                            location.reload();    
                                        }, 1500);
                                    }
                                        
                                }//end success
                            });//end ajax 


                        }
                }

                start();

                                    
                
            });

            //Si le button modifier a été cliquer
            $('#salle_table tbody').on('click', '#btn_update', function () {
            
                var data = table.row($(this).parents('tr')).data();
                let num_sal= data['num_sal'];

                const start = async function() {
                        const { value: desg} = await Swal.fire({
                            title: 'Modifier une Salle',
                            input: 'text',
                            //inputLabel: 'Your email address',
                            inputPlaceholder: 'Designation',
                            confirmButtonText: 'Modifier',
                            })

                            if (desg) {
                            
                                let id = num_sal;
                                let new_desgnation = desg ;

                                $.ajax({
                                    method : 'PUT' ,
                                    url : 'updateSalles/'+id , 
                                    data : {new_desg: new_desgnation}, 
                                    success : function(msg){     
                                            
                                        if (msg == "success") {
                                        swal.fire({
                                            icon : "success", 
                                            title : "Modifier" ,
                                            text : "La salle a été modifier ...." ,                                     
                                        });

                                        setTimeout(function(){
                                            location.reload();    
                                        }, 1500);
                                    }
                                            
                                    }//end success

                                });//end ajax 
                        
                            }//end if
                    }//end async function

                start();
        
                
            });//end on click btn

            //Si le button supprimer a été cliquer 
            $('#salle_table tbody').on('click', '#btn_delete', function () {

                var data = table.row($(this).parents('tr')).data();
                let id = data['num_sal'];

                
                $.ajax({
                        method : 'DELETE' ,
                        url : 'deleteSalles/'+id , 
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
                                    text : "La salle a été Supprimer ...." ,                                     
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