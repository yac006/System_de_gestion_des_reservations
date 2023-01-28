<div id="hstrq_planification_cont">
    <h4 style="text-align: center; margin-top: 30px">Historique des planifications</h4> 

    <div class="container mt-5 table_cont" >

        <table id="palnification_table" class="display cell-border" style="background-color: #fff">
            <thead>
                <tr>
                    <th>N° plan</th>
                    <th>N° dmnd</th>
                    <th>date début</th>
                    <th>date fin</th>
                </tr>
            </thead>
        </table>

    </div>
</div>

@section('DataTables_script')
<script>

/* Formatting function for row details - modify as you need */
function format(d) {
    // `d` is the original data object for the row
    return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; font-weight: 100">' +
        '<tr>' +
            '<td style="font-weight: bold">N° Réservation :</td>' +
            '<td>' +
                d.id_rsv_vehc +
            '</td>' +
            /*---*/
            '<td style="font-weight: bold">Motif :</td>' +
            '<td>' +
                d.motif +
            '</td>' +
            /*---*/ 
            '<td style="font-weight: bold">Déstination :</td>' +
            '<td>' +
                d.dest +
            '</td>' +
            /*---*/
            '<td style="font-weight: bold">Date rsv :</td>' +
            '<td>' +
                d.date_rsv +
            '</td>' +
            /*---*/
            '<td style="font-weight: bold">date déprt :</td>' +
            '<td>' +
                d.date_dep +
            '</td>' +
        '</tr>' +

        '<tr>' +
            /*---*/
            '<td style="font-weight: bold">date estm retour :</td>' +
            '<td>' +
                d.date_est_retour +
            '</td>' +
            /*---*/
            '<td style="font-weight: bold">Heur départ :</td>' +
            '<td>' +
                d.heure_dep +
            '</td>' +
            /*---*/
            '<td style="font-weight: bold">Heur retour :</td>' +
            '<td>' +
                d.heure_retr +
            '</td>' +
        '</tr>' +
        
        '</table>'
    );
}




    $(document).ready( function () {
        $.ajax({
            method : 'GET' ,
            url : 'getPlanifVehc' , 
            data : { },                 
            success : function(results){

            var table = $('#palnification_table').DataTable({

                    data: results ,
                    columns: [
                            {
                                className: 'dt-control',
                                orderable: false,
                                data: 'id_pln',
                                defaultContent: '',
                            },
                            { 'data': 'title' },
                            { 'data': 'start_date' },
                            { 'data': 'end_date' }
                    
                        ],
                        order: [[1, 'asc']],
                    // "columnDefs": [
                    //     { "width": "5%", "targets": 0 },
                    //     { "width": "10%", "targets": 1 },
                    //     { "width": "10%", "targets": 2 },
                    //     { "width": "16%", "targets": 4 },
                    //     { "width": "20%", "targets": 5 },
                    // ],
                });//end DataTable

                 // Add event listener for opening and closing details
                $('#palnification_table tbody').on('click', 'td.dt-control', function () {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);

                    //console.log(row.data());
            
                    if (row.child.isShown()) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        // Open this row
                        row.child(format(row.data())).show();
                        tr.addClass('shown');
                    }
                });//end event listener




            }
        });//end ajax 
        





    });//end doc ready
</script>
@endsection








