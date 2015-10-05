$(function(){

    $(".rootnav").find("li").mouseover(function(){
      
        $(this).find(".subnav").stop().slideDown('slow');
        
    }).mouseout(function(){
    
        $(this).find(".subnav").stop().slideUp();
    });
    
   
        
    $(".subnav").children("li").mouseover(function(){
        
        $(this).find(".subnav-sub").stop().slideDown('slow');
            
    }).mouseout(function(){
            
        $(this).find(".subnav-sub").stop().slideUp('slow');
            
    });
    
    $(".rootnav-left").children("li").children("a").click(function(){
    
        var farther = $(this).parent("li");
        //farther
        farther.toggleClass("tg-li-down");
        //alert(farther.html());
        $(this).siblings().slideToggle();
    });
    
    $(".subnav-left").find("a").mouseover(function(){
    
        $(this).css("background-color", "green");
    }).mouseout(function(){
    
        $(this).css("background-color", "darkblue");
    });
    
    $(".tg-subnav-sub").children("a").click(function(){
    
        if($(this).children("span").text() == '+'){
            $(this).children("span").text("-");
        }else{
            $(this).children("span").text("+");
        }
        var farther = $(this).parent("li");
        //farther
        //farther.toggleClass("tg-li-down");
        //alert(farther.html());
        $(this).siblings().slideToggle();
    });
    
    
    

});