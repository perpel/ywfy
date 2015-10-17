$(function(){

    $("body").on("mouseenter", ".fnt", function(){
        $(this).addClass("active");
        $(this).css("cursor", "hand");
    });

    $("body").on("mouseleave", ".fnt", function(){
        $(this).removeClass("active");
    });

    $("body").on("mouseenter", ".tablebook tr", function(){
        $(this).css("background-color", "lightyellow");
    });

    $("body").on("mouseleave", ".tablebook tr", function(){
        $(this).css("background-color", "white");
    });

    $("body").on("click", ".tablebook tr:gt(0)", function(){
        $(this).siblings("tr").removeClass("selected");
        $(this).addClass("selected");
    });


});