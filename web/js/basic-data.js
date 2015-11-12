$(function(){

      var tar_add = $("#section-bar").find(".fnt.ico-add").children("span").attr("data-action");
        var  tar_update = $("#section-bar").find(".fnt.ico-add").children("span").attr("data-update");
      var types = $("#cu_type").val();

    //add
    $("#section-bar").find(".fnt.ico-add").click(function(){
        
        var ths = $("#myTable").find("th");
        var trObj = $("<tr data-id=0 data-type='" + types + "'></tr>").appendTo($("#myTable"));
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

    $("#myTable").on("click", "tr", function(){

        $(this).siblings("tr").removeClass("active");
        $(this).siblings("tr").find("td").css("background-color", "white");
        $(this).addClass("active");
        $(this).find("td").css("background-color", "lightyellow");

    });

    //add somedata in input to database
    $("#myTable").on("blur", "input:text", function(){
        var id = $(this).parents("tr").attr("data-id");
        var inputObj = $(this);
        var key = $(this).parent("td").attr("data-key");
        var v = $(this).val();
        if(id == 0){
            $.get("index.php?r=basic/default/" + tar_add + "&key=" + key + "&v=" + v + "&type=" + types, function(data){
                if(data != "defail"){
                    inputObj.css("background-color", "lightgreen");
                    inputObj.parents("tr").children("td:first").text(data);
                    inputObj.parents("tr").attr("data-id", data);
                    itot(inputObj);
                }
            });
        }else{
            $.get("index.php?r=basic/default/" + tar_update + "&id=" + id + "&key=" + key + "&v=" + v + "&type=" + types, function(data){

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


 //add somedata in input to database
    $("#myTable").on("change", "input:checkbox", function(){
        $(this).val()==1?$(this).val(0):$(this).val(1);
        var id = $(this).parents("tr").attr("data-id");
        var inputObj = $(this);
        var key = $(this).parent("td").attr("data-key");
        var v = $(this).val();

        if(id == 0){
            $.get("index.php?r=basic/default/" + tar_add + "&key=" + key + "&v=" + v + "&type=" + types, function(data){
                if(data != "defail"){
                    inputObj.css("background-color", "lightgreen");
                    inputObj.parents("tr").children("td:first").text(data);
                    inputObj.parents("tr").attr("data-id", data);
                    itot(inputObj);
                }
            });
        }else{
            $.get("index.php?r=basic/default/" + tar_update + "&id=" + id + "&key=" + key + "&v=" + v + "&type=" + types, function(data){
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


    //delete

/*
    //edit
    $("#section-bar").find(".fnt.ico-edit").click(function(){
        var action = $(this).find("span").attr("data-action");
        var id = $("#myTable").find("tr[class='active']").attr("data-id");
        if(!id){
            alert("Please choice");
            return false;
        }
        var pop = $(this).pop();
        $.get("./index.php?r=" + modular + "/" + action + "&id=" + id,function(data){$(".pop-content", pop).html(data);});
    });

    //print
    $("#section-bar").find(".fnt.ico-print").click(function(){
        var pop = $(this).pop({_size: "small"});
        $.post("./index.php?r=input/print",{},function(data){$(".pop-content", pop).html(data);});
    });


     $("#myTable").on("dblclick", "tr", function(){
        var edit_target = $("#section-bar").find(".fnt.ico-edit").find("span").attr("data-action");
        var id = $(this).attr("data-id");
        $(this).pop();
        $.get(
            "./index.php?r=input/" + edit_target + "&id=" + id,
            function(data){
                
                $(".pop-content").html(data);
               
            }
        );

     });

     $("#myTable").on("click", "tr", function(){

        $(this).siblings("tr").removeClass("active");
        $(this).siblings("tr").find("td").css("background-color", "white");
        $(this).addClass("active");
        $(this).find("td").css("background-color", "lightgreen");

     });

*/
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
            "./index.php?r=basic/default/" + del_target + "&id=" + id + "&action=" + action,
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


});