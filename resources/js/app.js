
require("./bootstrap");

//********************************* Panneau Administration ********************************** */

//Ecouter a l'evenement "new_demande_rsv" qui vien par la chaine "ch-441"
Echo.channel("ch-441").listen("new_demande_rsv", (event) => {
    $(document).ready(function () {
        if ($("#user_id_input").val() == event["nv_demande"]["chef"]["id"]) {
            $("#notif_badge").show();
            $("#notif_badge").text(event["nv_demande"]["chef"]["nbr_notif"]);
        }

        if ($("#user_id_input").val() == event["nv_demande"]["resp"]["id"]) {
            $("#notif_badge").show();
            $("#notif_badge").text(event["nv_demande"]["resp"]["nbr_notif"]);
        }
    });
});

//Ecouter a l'evenement "new_account" qui vien par la chaine "ch-445"
Echo.channel("ch-445").listen("new_account", (event) => {
    $(document).ready(function () {
        if ($("#user_id_role_input").val() == 1) {
            $("#account_notif_badge").show();
            $("#account_notif_badge").text(event["nombre_notif"]);
        }
    });
});

//********************************* Comptes d'utlisateurs ********************************** */

//Ecouter a l'evenement "new_notif_validation" qui vien par la chaine "ch-438"
Echo.channel("ch-438").listen("new_notif_validation", (event) => {
    if ($("#num_emp").val() == event["num_emp"]) {
        $(document).ready(function () {
            $("#_bdg_nbr_user_ntf").show();
            $("#_bdg_nbr_user_ntf").text(event["nbr_notif"]);
            console.log("result: " + "" + event["nbr_notif"]);
        });
    }//end if
});

