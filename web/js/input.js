$(function(){

    var modular = $("input[name='ctrl']:hidden").val();

    //add
    $("#section-bar").find(".fnt.ico-add").click(function(){
        var action = $(this).children("span").attr("data-action");
        var tpl = $(this).children("span").attr("data-tpl");
        var pop = $(this).pop();
        $.get("./index.php?r=" + modular + "/" + action,function(data){$(".pop-content", pop).html(data);});
    });

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


$("#section-bar").find(".fnt.ico-del").click(function(){

        var del_target = $(this).find("span").attr("data-action");
        var objTr = $("#myTable").find("tr[class='active']");
        var id = objTr.attr("data-id");

    if(!id){

        alert("Please choice");
        return false;
    }

    var dia = confirm("delete?");
    if(dia){

         $.get(
            "./index.php?r=input/" + del_target + "&id=" + id,
            function(data){
                
                if(data=="success"){
                    alert("success");
                    objTr.remove();
                }

                if(data=="defail"){

                    alert("delete defail!");
                    objTr.css("background-color", "lightred");
                }
               
            }
        );

    }

});





});