$(function(){

    $(window).on("resize load", function(){
        var win = $(window).width();
        var winHeight = $(window).height();
        var sectionWidth = win - $(".side").width();
       $(".section").width(sectionWidth-1);
       $(".section").height(winHeight - 120);
    });

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

    var pop_index = 9;

    $("body").on("click", ".pop", function(){
        $(this).css("z-index", pop_index);
        pop_index = pop_index + 1;
    });


});