
//Animation pour les icons principale  
$(document).ready(function () {

    $(".cont_icon i").animate({opacity:'1',fontSize: '4.8em'} , 1000);
});




//Autorisation  d'access au élémentes de "SideBar"
$(document).ready(function () {
        //Si l'element de sidebar (planification) a été cliquer
        $('.pln_salles_a').on('click' , function(){
            let user_id_role = $("#user_id_role_input").val();
            var arr = [ "3" , "4" , "5" , "6"]; // id_roles
            //verifier si "user_id_role" existe dans array "arr"
            if (!arr.includes(user_id_role)) {
                //Deactivé l'élément "Planning des Rsv" dans "SideBar"
                $('.pln_salles_a').removeAttr('href');

                swal.fire({
                title : "Alert !" ,
                text : "Vous ne pouvez pas accéder a cette page !!",
                icon : "warning"                                       
                }); 
            };//end if
        });// end on click

         //Si l'element de sidebar (Réservation) a été cliquer
        $('.reservation_a').on('click' , function(){
            let user_id_role = $("#user_id_role_input").val();
            var arr = [ "1" , "2" , "3" , "4" , "5" , "6"]; // id_roles
            //verifier si "user_id_role" existe dans array "arr"
            if (!arr.includes(user_id_role)) {
                //Deactivé l'élément "Réserva"1" , "2"tion" dans "SideBar"
                $('.reservation_a').removeAttr('href');

                swal.fire({
                title : "Alert !" ,
                text : "Vous ne pouvez pas accéder a cette page !!",
                icon : "warning"                                       
                }); 
            };//end if
        });// end on click


        //Si l'element de sidebar (Administration) a été cliquer
        $('.administration_a').on('click' , function(){
            let user_id_role = $("#user_id_role_input").val();
            var arr = [ "1" ]; // id_roles
            //verifier si "user_id_role" existe dans array "arr"
            if (!arr.includes(user_id_role)) {
                //Deactivé l'élément "Administration" dans "SideBar"
                $('.administration_a').removeAttr('href');

                swal.fire({
                title : "Alert !" ,
                text : "Vous ne pouvez pas accéder a cette page !!",
                icon : "warning"                                       
                }); 
            };//end if
        });// end on click


        //Si l'element de sidebar (Demandes) a été cliquer
        $('.validations_a').on('click' , function(){
            let user_id_role = $("#user_id_role_input").val();
            var arr = ["3" , "4" , "5" , "6"]; // id_roles
            //verifier si "user_id_role" existe dans array "arr"
            if (!arr.includes(user_id_role)) {
                //Deactivé l'élément "Validations" dans "SideBar"
                $('.validations_a').removeAttr('href');

                swal.fire({
                title : "Alert !" ,
                text : "Vous ne pouvez pas accéder a cette page !!",
                icon : "warning"                                       
                }); 
            };//end if
        });// end on click


        //Si l'element de sidebar (Gestion employées) a été cliquer
        $('.gst_employes_a').on('click' , function(){
            let user_id_role = $("#user_id_role_input").val();
            var arr = [ "2" ]; // id_roles
            //verifier si "user_id_role" existe dans array "arr"
            if (!arr.includes(user_id_role)) {
                //Deactivé l'élément "Gestion employées" dans "SideBar"
                $('.gst_employes_a').removeAttr('href');

                swal.fire({
                title : "Alert !" ,
                text : "Vous ne pouvez pas accéder a cette page !!",
                icon : "warning"                                       
                }); 
            };//end if
        });// end on click


        //Si l'element de sidebar (Gestion des salles) a été cliquer
        $('.gst_salle_a').on('click' , function(){
            let user_id_role = $("#user_id_role_input").val();
            var arr = [ "5" ,"6" ]; // id_roles
            //verifier si "user_id_role" existe dans array "arr"
            if (!arr.includes(user_id_role)) {
                //Deactivé l'élément "Gestion des salles" dans "SideBar"
                $('.gst_salle_a').removeAttr('href');

                swal.fire({
                title : "Alert !" ,
                text : "Vous ne pouvez pas accéder a cette page !!",
                icon : "warning"                                       
                }); 
            };//end if
        });// end on click

        //Si l'element de sidebar (Gestion des vehicules) a été cliquer
        $('.gst_vehc_a').on('click' , function(){
            let user_id_role = $("#user_id_role_input").val();
            var arr = [ "3" ,"4" ]; // id_roles
            //verifier si "user_id_role" existe dans array "arr"
            if (!arr.includes(user_id_role)) {
                //Deactivé l'élément "Gestion des vehicules" dans "SideBar"
                $('.gst_vehc_a').removeAttr('href');

                swal.fire({
                title : "Alert !" ,
                text : "Vous ne pouvez pas accéder a cette page !!",
                icon : "warning"                                       
                }); 
            };//end if
        });// end on click
    
})//end doc ready



$(document).ready(function () {

    $('#show_all_elements_icon').on('click' , function(){

        $("#display_all_icons_modal").modal('show');

    });
});


