$(".profile-info-iner").hide();
$(".avvali-ul").hide();
$(".second-ul").hide();
$(".third-ul").hide();

$("#hide").click(function(){
    //  $(".profile-info-iner").hide(1000);
    $(".profile-info-iner").fadeToggle(500)
});

$('#bars').click(function(){
    $("#id1").show(1000);
});


function openClose(myElement)
{
    $(myElement).toggle(700);
}
$(".third").click(function(){
    let MyElement = document.querySelector(".third-ul");
    openClose(MyElement);
});
$(".second").click(function(){
    let MyElement = document.querySelector(".second-ul");
    openClose(MyElement);
});
$(".first").click(function(){
    let MyElement = document.querySelector(".avvali-ul");
    openClose(MyElement);
});
