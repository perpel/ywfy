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
        var tpl = $(this).children("span").attr("data-tpl");
        var ctrl = $("input[name='ctrl']:hidden").val();
    
        $.get(
                "./index.php?r=" + ctrl + "/" + action + "&tpl=" + tpl,
                function(data){
                    
                    $(".pop-content").html(data);
                   
                }
            );

     });

     
});