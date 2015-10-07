$(function(){

    $(".fnt").mouseenter(function(){
        $(this).addClass("active");
        $(this).css("cursor", "hand");
    }).mouseleave(function(){
        $(this).removeClass("active");
    });

     $(".fnt[data-pop='pop']").click( function(){
        
        if( $(".pop").length > 0 ){
            return false;
        }

        $(this).pop();

        var action = $(this).children("span").attr("data-action");

        $.get(
                "./index.php?r=input/" + action,
                function(data){
                    
                    $(".pop-content").html(data);
                   
                }
            );

     });

     
});