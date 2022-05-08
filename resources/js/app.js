require('./bootstrap');




Echo.channel('ch-441').listen('new_demande_rsv', event => {

        $(document).ready(function(){

                $("#notif_badge").show();
                $("#notif_badge").text(event['nv_demande']);

        });

        
});



Echo.channel('ch-445').listen('new_account', event => {

        $(document).ready(function(){

                $("#account_notif_badge").show();
                $("#account_notif_badge").text(event['nombre_notif']);

        });

        
});