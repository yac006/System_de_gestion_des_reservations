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


/******************************** Circle Menu ****************************/
var angleStart = -360;

// jquery rotate animation
function rotate(li,d) {
    $({d:angleStart}).animate({d:d}, {
        step: function(now) {
            $(li)
               .css({ transform: 'rotate('+now+'deg)' })
               .find('label')
                  .css({ transform: 'rotate('+(-now)+'deg)' });
        }, duration: 0
    });
}

// show / hide the options
function toggleOptions(s) {
    $(s).toggleClass('open');
    var li = $(s).find('li');
    var deg = $(s).hasClass('half') ? 180/(li.length-1) : 360/li.length;
    for(var i=0; i<li.length; i++) {
        var d = $(s).hasClass('half') ? (i*deg)-90 : i*deg;
        $(s).hasClass('open') ? rotate(li[i],d) : rotate(li[i],angleStart);
    }
}

$('.selector button').click(function(e) {
    toggleOptions($(this).parent());
});

setTimeout(function() { toggleOptions('.selector'); }, 100);//@ sourceURL=pen.js

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

