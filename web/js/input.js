$(function(){

    $(".fnt").click(function(){
        var action = $(this).attr("data-action");
        $.get(
                "./index.php?r=input/" + action,
                function(data){
                    
                    $("#pop-input .content").html(data);
                    $("#pop-input").show();
                   

                }
            );
    });


});