$(function(){

    $(".side-dropdown.active").children(".side-dropdown-menu").show();
    $(".side-bar").find("li").click(function(event){
        event.stopPropagation(); 
    });
    $(".side-dropdown").click(function(event){

        if( !$(this).hasClass("active") ){

            $(this).addClass("active");
            $(this).siblings("li").removeClass("active");
            dropdownMenuShow($(this));
        }else{

            $(this).removeClass("active");
            $(this).children(".side-dropdown-menu").slideUp();
        }

    });

    var dropdownMenuShow = function(oSelf){

        oSelf.children(".side-dropdown-menu").slideDown();
        oSelf.siblings("li").children(".side-dropdown-menu").slideUp();
    }

})
/*
$(".side-dropdown").children("a").click(function(){

    $(this).toggleClass("a-down");
    $(this).siblings(".side-dropdown-menu").slideToggle();
});

$(".side-dropdown-menu").find("a").mouseenter(function(){

    $(this).parent("li").siblings("li").find("a").css({

        'background-color': '#375A9F',
       
        'color': 'white',
        

});

$(this).css({
    'background-color': '#FFFFFF',
    
    'color': 'darkblue',
    
});*/