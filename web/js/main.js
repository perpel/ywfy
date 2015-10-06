$(function(){

    $(window).on("resize load", function(){
        var win = $(window).width();
        var winHeight = $(window).height();
        var sectionWidth = win - $(".side").width();
       $(".section").width(sectionWidth);
       $(".section").height(winHeight - 120);
    });


});