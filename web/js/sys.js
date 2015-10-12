$(function(){

    $("#user-info").children("tbody").find("tr").click(function(){

        $(this).siblings().css("background-color", "#FAEBD7");
        $(this).siblings().removeClass("active");
        $(this).css("background-color", "lightgreen");
        $(this).addClass("active");

    });

    $("#section-bar").find(".fnt.ico-del").click(function(){

        var activeObj = $("#user-info").children("tbody").children("tr[class='active']");
        var num = activeObj.find("td").eq(1).text();
        $.get(
                "index.php?r=sys/user-del",
                {
                    num: num,
                },
                function(data){
                    if("success" == data){
                        activeObj.remove();
                    }
                    if("defail" == data){
                        alert("delete defail!");
                    }
                }
            );
    });


    $("#section-bar").find(".fnt.ico-print").click(function(){

        window.location.assign("index.php?r=sys/print");
    });

});