$(function(){

    var departmentNumber = $("#departmentNumber").val();


    $("#section-bar").find(".fnt.ico-add").click(function(){
        var ths = $("#myTable").find("th");
        var trObj = $("<tr data-id=0></tr>").appendTo($("#myTable"));
        $.each(ths, function(){
            if( typeof($(this).attr("data-tpl")) == "undefined" && typeof($(this).attr("data-type")) == "undefined" &&  typeof($(this).attr("data-btn")) == "undefined"){
                trObj.append("<td></td>");
            }else if( typeof($(this).attr("data-type")) != "undefined" ){
                trObj.append("<td>" + types + "机构</td>");
            }else if( typeof($(this).attr("data-btn")) != "undefined" ){
                trObj.append("<td data-key='" + $(this).attr("data-btn") + "'><input type='checkbox' value=0></td>");
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
            $.get("index.php?r=sys/default/add-user",{"key":key, "v":v, "depart_num":departmentNumber }, function(data){
                if(data != "defail"){
                    inputObj.css("background-color", "lightgreen");
                    inputObj.parents("tr").children("td:first").text(data);
                    inputObj.parents("tr").attr("data-id", data);
                    itot(inputObj);
                }
            });
        }else{
            $.get("index.php?r=sys/default/update-user", {"key":key, "v":v, "id":id }, function(data){
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


var itot = function(objInput){
        if(objInput.attr("type") == "checkbox"){
            return false;
        }
        var data = objInput.val();
        var p = objInput.parent("td");
        p.html(data);
    };

    var ttoi =function(objTd){
        if(objTd.children("input").attr("type") == "checkbox"){
            return false;
        }
        var data = objTd.text();
        objTd.empty();
        var i = $("<input type='text'>").appendTo(objTd);
        i.val(data);
    };

     $("#myTable").on("dblclick", "td", function(){

        if( typeof($(this).attr("data-key")) != "undefined" ){

            ttoi($(this));
        }

     });

     $("#section-bar").find(".fnt.ico-del").click(function(){

    var del_target = $(this).find("span").attr("data-action");
    var action = $(this).find("span").attr("data-model");
    var objTr = $("#myTable").find("tr[class='active']");
    var id = objTr.attr("data-id");

    if(!id){

        alert("Please choice");
        return false;
    }
    if(id == 0){
        objTr.remove();
        return false;
    }

    var dia = confirm("delete?");
    if(dia){

         $.get(
            "./index.php?r=sys/default/del-user&id=" + id,
            function(data){
                
                if(data=="success"){
                    objTr.remove();
                }

                if(data=="defail"){
                    objTr.css("background-color", "red");
                }
               
            }
        );

    }

});

      $("#myTable").on("click", "tr", function(){

        $(this).siblings("tr").removeClass("active");
        $(this).siblings("tr").find("td").css("background-color", "white");
        $(this).addClass("active");
        $(this).find("td").css("background-color", "lightyellow");

    });




});