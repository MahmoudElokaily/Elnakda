
$(document).ready(function () {


});

var LastIndex = 20111;

// var myfunc = setInterval(function() {
//     var _date = new Date().toLocaleString().split(", ");
//     $("#date span").html(_date[0]);
//     $("#time span").html(_date[1]);
//     $.get("./api2.php", {}, function (response){
//         $("#network span").html(response);
//     });
// }, 1000);

function fireAlarm(elm){

    $("#store-"+elm.msg).addClass('alarm');
    $("#location-"+elm.location).addClass('alarm');
    $("#stop-alarm").show();
	$("audio").trigger("play");
   // audio.play();
          $("#player").attr("muted",true);

    $("#bell").addClass("fire-alarm");
    $("#bell span").text(" انذار ... انذار ... انذار ... ");
    $("svg path").attr('fill','#ff0000');
    var myModal = new bootstrap.Modal(document.getElementById('exampleModalToggle2'), {
        keyboard: false
    })

    if($('body').data('id')!=elm.id){
        $(".popup-owner").text(elm.owner);
        $(".popup-phone").text(elm.phone);
        $(".popup-code").text(elm.code);
        $(".popup-address").text(elm.address);
        $(".popup-name").text(elm.name);
        $(".stop-alarm").data('code',elm.code);
        $("a.store-url").attr('href','./index3.php?id='+elm.id);
        $(".camera-button").attr('href',elm.camera);

    if(!$("#exampleModalToggle2").hasClass('show')){
        myModal.show();
    }
}

}

$("#stop-alarm").on("click",function(){
    $(".card").removeClass('alarm');

    audio.pause();    $("audio").trigger("pause");

    $("#stop-alarm").hide();
    $("#bell").removeClass("fire-alarm");

    $("#bell span").text(" تم اغلاق الانذار ");
    $("svg path").attr('fill','#008000');
    $.get("./close.php?code="+$(this).data('code'), {
    }, function (response){

    });

    $(".modal-backdrop.fade.show").removeClass('show');

});

$(document).on("click",".stop-alarm", function(){
    $(".modal-backdrop.fade.show").removeClass('show');

    $(".card").removeClass('alarm');

    audio.pause();    $("audio").trigger("pause");

    $("#stop-alarm").hide();
    $("#bell").removeClass("fire-alarm");
    $("#bell span").text(" تم اغلاق الانذار ");
    $("svg path").attr('fill','#008000');
    $.get("./close.php?code="+$(this).data('code'), {}, function (response){});
});

$(window).on('load resize', function (){
    footer_h = $('footer').height() + $('footer').offset()['top'];
    body_h = $('body').height();
    window_h = $(window).height();
    if(window_h > body_h){
        $('footer').css('width','100%')
        $('footer').css('position','fixed')
        $('footer').css('bottom',0)
    }
});
