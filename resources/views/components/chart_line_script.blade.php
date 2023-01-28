
<!-- Users Stats -->
<div class="col-lg-8 col-md-12 col-sm-12 mb-4">
        <div class="card card-small">
            <div class="card-header border-bottom">
                <h6 class="m-0">Statistiques</h6>
            </div>
        <div class="card-body pt-0">
            <div class="row border-bottom py-2 bg-light">
                <div class="col-12 col-sm-6">
                    <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                        <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1">
                        <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2">
                        <span class="input-group-append">
                        <span class="input-group-text">
                            <i class="material-icons"></i>
                        </span>
                        </span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                    <button type="button" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View Full Report &rarr;</button>
                </div>
            </div>
            <!-- <canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas> -->
            <canvas id="myChart" width="100%" height=""></canvas>        
        </div>
    </div>
</div>
<!-- End Users Stats -->







@section('chart_line_script')
<script>
    $(document).ready(function(){
        let id_role = $("#user_id_role_input").val(); 
        $.ajax({
            methode: 'GET',
            url: 'countNbrValidationsInMonth',
            data: {id_role: id_role},
            success: function(results){
                //setup
                const labels = [
                    'Jan',
                    'Fev',
                    'Mar',
                    'Avr',
                    'Mai',
                    'Jui',
                    'Jul',
                    'Aou',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ];

                //*************  for exp and hse accounts **************//
                if (id_role == 3 || id_role == 4 || id_role == 5 || id_role == 6) {
                    const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Demandes validées',
                        backgroundColor: 'rgba(0,123,255,0.9)',
                        borderColor: 'rgba(0,123,255,0.9)',
                        data: [ 
                                results.nbr_vald_valider.original.v_jan, 
                                results.nbr_vald_valider.original.v_fev, 
                                results.nbr_vald_valider.original.v_mar, 
                                results.nbr_vald_valider.original.v_avr, 
                                results.nbr_vald_valider.original.v_mai, 
                                results.nbr_vald_valider.original.v_jui, 
                                results.nbr_vald_valider.original.v_jul,
                                results.nbr_vald_valider.original.v_aou, 
                                results.nbr_vald_valider.original.v_sep, 
                                results.nbr_vald_valider.original.v_oct, 
                                results.nbr_vald_valider.original.v_nov, 
                                results.nbr_vald_valider.original.v_dec
                            ],
                    },
                    {
                        label: 'Demandes refusées',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [
                                results.nbr_vald_refuser.original.v_jan, 
                                results.nbr_vald_refuser.original.v_fev, 
                                results.nbr_vald_refuser.original.v_mar, 
                                results.nbr_vald_refuser.original.v_avr, 
                                results.nbr_vald_refuser.original.v_mai, 
                                results.nbr_vald_refuser.original.v_jui, 
                                results.nbr_vald_refuser.original.v_jul,
                                results.nbr_vald_refuser.original.v_aou, 
                                results.nbr_vald_refuser.original.v_sep, 
                                results.nbr_vald_refuser.original.v_oct, 
                                results.nbr_vald_refuser.original.v_nov, 
                                results.nbr_vald_refuser.original.v_dec
                                ],
                        }
                    ]
                    };

                    //CONFIG
                    const config = {
                        type: 'line',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    max: 30,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                }
                            }
                        }//end
                    };

                    //render
                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                    
                }//end if



                //*************  for grh and admin accounts **************//
                
                if (id_role == 1 || id_role == 2) {
                    const data = {
                        labels: labels,
                        datasets: [{
                            label:  'Nombre des comptes',
                            backgroundColor: '#ffb400',
                            borderColor: '#ffb400',
                            data: [ 
                                    results.nbr_comptes_creer.original.v_jan, 
                                    results.nbr_comptes_creer.original.v_fev, 
                                    results.nbr_comptes_creer.original.v_mar, 
                                    results.nbr_comptes_creer.original.v_avr, 
                                    results.nbr_comptes_creer.original.v_mai, 
                                    results.nbr_comptes_creer.original.v_jui, 
                                    results.nbr_comptes_creer.original.v_jul,
                                    results.nbr_comptes_creer.original.v_aou, 
                                    results.nbr_comptes_creer.original.v_sep, 
                                    results.nbr_comptes_creer.original.v_oct, 
                                    results.nbr_comptes_creer.original.v_nov, 
                                    results.nbr_comptes_creer.original.v_dec
                                ],
                            }]
                    };

                    //CONFIG
                    const config = {
                        type: 'line',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    max: 20,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                }
                            }
                        }
                    };

                    //render
                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                    
                }//end if

                



            }//end success


        });//end ajax
        
    });//end doc ready
</script>
