$(function(){

    $("#myTable").find("tr:gt(0)").click(function(){

        $(this).siblings().css("background-color", "#FAEBD7");
        $(this).siblings().removeClass("active");
        $(this).css("background-color", "lightgreen");
        $(this).addClass("active");

    });

    $("#section-bar").find(".fnt.ico-del").click(function(){

        var activeObj = $("#myTable").children("tr[class='active']");
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



 //add
    $("#section-bar").find(".fnt.ico-add").click(function(){

        var ths = $("#myTable").find("th");
        var trObj = $("<tr data-id=0></tr>").appendTo($("#myTable"));
        $.each(ths, function(){
            if( typeof($(this).attr("data-tpl")) == "undefined"){
                trObj.append("<td></td>");
            }else{
                trObj.append("<td data-key='" + $(this).attr("data-tpl") + "'><input type='text'></td>");
            }
        });
    });

    //add somedata in input to database
    $("#myTable").on("blur", "input:text", function(){
        var id = $(this).parents("tr").attr("data-id");
        var inputObj = $(this);
        var key = $(this).parent("td").attr("data-key");
        var v = $(this).val();
        if(id == 0){
            $.get("index.php?r=basic-data/" + tar_add + "&key=" + key + "&v=" + v + "&type=" + types, function(data){
                if(data != "defail"){
                    inputObj.css("background-color", "lightgreen");
                    inputObj.parents("tr").children("td:first").text(data);
                    inputObj.parents("tr").attr("data-id", data);
                    itot(inputObj);
                }
            });
        }else{
            $.get("index.php?r=basic-data/" + tar_update + "&id=" + id + "&key=" + key + "&v=" + v + "&type=" + types, function(data){
                if(data == "success"){
                    inputObj.css("background-color", "lightgreen");
                    itot(inputObj);
                }
                if(data == "defail"){
                    alert("更新失败！");
                    inputObj.css("background-color", "#C88D8D");
                }
            });
        }
    });




});