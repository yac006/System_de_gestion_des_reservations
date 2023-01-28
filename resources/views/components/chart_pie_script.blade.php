<!-- Users By Device Stats -->
<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card card-small h-100">
        <div class="card-header border-bottom">
        <h6 class="m-0">Statistiques</h6>
        </div>
        <div class="card-body d-flex py-0">
        <!-- <canvas height="220" class=""></canvas>   -->
        <div id="chartPieContainer" style="height: 290px; width: 100%; margin-top: 50px;"></div>
        </div>
        <div class="card-footer border-top">
        <div class="row">
            <div class="col">
            <select class="custom-select custom-select-sm" style="max-width: 130px;">
                <option selected>Last Week</option>
                <option value="1">Today</option>
                <option value="2">Last Month</option>
                <option value="3">Last Year</option>
            </select>
            </div>
            <div class="col text-right view-report">
            <a href="#">Full report &rarr;</a>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- End Users By Device Stats -->


@section('chart_pie_script')
<script>
//CHART PIE
$(document).ready(function(){

        let user_id_role = $("#user_id_role_input").val() ;
        let route ; 
        let name_1 ; let name_2 ; let name_3 ; let name_4 ; let name_5 ; let name_6 ;
        let name_7 ; let name_8 ; let name_9 ; let name_10 ; let name_11 ; let name_12 ;

        if (user_id_role == 3 || user_id_role == 4) {
            route = "countNbrRsvVehicules" ;
            name_1 = "Touristique" ; name_2 = "Utilitaire" ; name_3 = "Autres" ;
        }
        if (user_id_role == 5 || user_id_role == 6) {
            route = "countNbrRsvSalles" ;
            name_1 = "Salle 01" ; name_2 = "Salle 02" ; name_3 = "Salle 03" ;
        }

        if (user_id_role == 1 || user_id_role == 2) {
            route = "countNbrEmpInSecteur" ;
            name_1 = "Informatique" ; name_2 = "Exploitation" ; name_3 = "HSE" ; name_4 = "RH" ;
            name_5 = "Commercial" ; name_6 = "Comptabilité" ; name_7 = "Secrétariat" ; name_8 = "Maintenance" ;
            name_9 = "Assurance" ; name_10 = "Direction" ; name_11 = "Securité" ; name_12 = "Marketing" ;
        }

        $.ajax({
            method : 'GET' ,
            url : route , 
            data : { },
            success : function(results){
                console.log(results);

                CanvasJS.addColorSet("blueShades",
                [//colorSet Array
                    'rgba(0,123,255,0.9)',
                    'rgba(0,123,255,0.5)',
                    'rgba(0,123,255,0.3)',
                    'rgba(36,140,251,0.9)',
                    'rgba(58,152,251,0.9)',
                    'rgba(70,160,251,0.9)',
                    'rgba(85,175,251,0.9)',
                    'rgba(100,200,251,0.9)',
                    'rgba(150,230,251,0.9)',
                    'rgba(180,260,251,0.9)',
                    'rgba(200,290,251,0.9)',
                    'rgba(200,290,251,0.6)'
                ]);

                var chart1 = new CanvasJS.Chart("chartPieContainer",{
                    exportEnabled: true,
                    animationEnabled: true,
                    colorSet: "blueShades",
                    title:{
                        text: ""
                    },
                    legend:{
                        horizontalAlign: "bottom",
                        verticalAlign: "centre"
                    },

                    data: [{
                                type: "pie",
                                showInLegend: true,
                                toolTipContent: "<b>{name}</b>: (#percent%)",
                                indexLabel: "{name}",
                                legendText: "{name} (#percent%)",
                                indexLabelPlacement: "inside",

                                dataPoints: check_type_user_and_show_items(results)
                        }]
                    
                    });

                    chart1.render();
                    
            }//end success

        });//end ajax  

        /*-------------- Functions -------------*/
        function check_type_user_and_show_items(results) {
                if (user_id_role == 1 || user_id_role == 2) {
                    return  [
                            { y: results.value_1 , name: name_1 },  
                            { y: results.value_2 , name: name_2 },   
                            { y: results.value_3 , name: name_3 },
                            { y: results.value_4 , name: name_4 }, 
                            { y: results.value_5, name: name_5 },  
                            { y: results.value_6, name: name_6 },   
                            { y: results.value_7 , name: name_7 },
                            { y: results.value_7, name: name_8 },
                            { y: results.value_8 , name: name_9 },  
                            { y: results.value_9, name: name_10 },   
                            { y: results.value_10, name: name_11 },
                            { y: results.value_11, name: name_12 } 
                        ]
                }else{
                    return  [
                            { y: results.value_1 , name: name_1 },  
                            { y: results.value_2 , name: name_2 },   
                            { y: results.value_3 , name: name_3 },
                        ]
                }//end else
            
        }//end func

});//end doc ready
</script>
@endsection
