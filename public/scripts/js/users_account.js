// Animation pour [ Featured container , profile container , Header container]

$(document).ready(function () {
    // $(".Featured_cont").animate({ top: '106px' , opacity: '1'} , 1000 , function()
    // {
    // Qand l'animation de [featured_cont] est terminer executer ces instructions
    $(".logo_cont").fadeIn(3000);
    $(".notif_cont").fadeIn(2000);
    $(".search_cont").animate({ top: "0px", opacity: "1" }, 1000);

    // }
    // );

    $(".cont_profile").animate({ right: "0px", opacity: "1" }, 1500);
});

// Hover pour les icons [email , notif , param]

$(document).ready(function () {
    // $('.zmdi-email').hover(
    // 	function()
    // 	{
    // 		$(this).css("color","orange");
    // 	}
    // 	,
    // 	function()
    // 	{
    // 		$(this).css("color","#c3c7cc");
    // 	}
    // );
});

// Animation pour [ Main container ]

$(document).ready(function () {
    $("#box_one").animate({ top: "0px", opacity: "1" }, 1600);
    $("#box_two").animate({ top: "0px", opacity: "1" }, 1300);
    $("#box_three").animate({ top: "0px", opacity: "1" }, 1000);
});

// Hover pour les icons de Main container

$(document).ready(function () {
    $(".zmdi-email").hover(
        function () {
            // $(this).animate({ width: '40px' },1500);
        },
        function () {
            // $(this).animate({ font-size: '5em' },1500);
            // $(this).css("font-size","5em");
        }
    );
});

