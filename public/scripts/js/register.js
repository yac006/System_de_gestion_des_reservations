$(document).ready(function () {
    //si on click sur un avatar
    $(".avtr_cont li").click(function () {
        if ($(".avtr_cont li.selected").length == 0) {
            $(this).toggleClass("selected");
        } else {
            $(".avtr_cont li.selected").removeClass("selected");
        }
    });

    //si on clique sur le boutton valider
    $("#save_btn").click(function () {
        //verifier si il ya une image selectionné
        if ($(".avtr_cont li.selected").length > 0) {
            var img_src = $(".avtr_cont li.selected img").attr("src");
            var img_src = img_src.replace(window.location.origin + "/", "");

            //alert(img_src);

            $("#avatar_path").val(img_src);
            $("#imgModal").modal("hide");
        } else {
            alert("aucune image selectionné !!");
        }
    });
});

/**----- Si le button continue a été cliquer ----**/

$("#btn_continue").click(function (){

        $(".first_cont_fileds").hide();
        $(".secend_cont_fileds").removeAttr('hidden');
        $(".secend_cont_fileds").show();
});

$("#btn_precedent").click(function (){
    $(".secend_cont_fileds").hide();
    $(".first_cont_fileds").show();
});
