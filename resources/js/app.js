require('./bootstrap');




Echo.channel('ch-441').listen('new_demande_rsv', event => {

        $(document).ready(function(){

                $("#notif_badge").show();
                $("#notif_badge").text(event['nv_demande']); 

        });

        
});