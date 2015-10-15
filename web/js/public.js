$(function(){

    $(".fnt").mouseenter(function(){
        $(this).addClass("active");
        $(this).css("cursor", "hand");
    }).mouseleave(function(){
        $(this).removeClass("active");
    });

});