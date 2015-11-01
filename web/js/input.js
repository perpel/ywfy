$(function(){

    var module = $("#module").val();
    //add
    $("#section-bar").find(".fnt.ico-add").click(function(){
        var action = $(this).children("span").attr("data-action");
        var pop = $(this).pop({_top: "200px", _left: "200px",_iframe: true});
        $(".pop-content", pop).children("iframe").attr("src", "index.php?r=" + module + "/input/add&action=" + action);
    });

    //edit (1)
    $("#section-bar").find(".fnt.ico-edit").click(function(){
        var action = $(this).find("span").attr("data-action");
        var activeObj = $("#myTable").find("tr[class='active']");
        if( activeObj.length == 0 ){
            alert("请选择修改对象");
            return false;
        }
        var pop = $(this).pop({ _top: "200px", _left: "200px",_iframe: true});
        var id = activeObj.attr("data-id");
        $(".pop-content", pop).children("iframe").attr("src", "index.php?r=" + module + "/input/edit&action=" + action + "&id=" + id);
    });

    //edit (2)
     $("#myTable").on("dblclick", "tr:gt(0)", function(){
        var action = $("#section-bar").find(".fnt.ico-edit").find("span").attr("data-action");
        var id = $(this).attr("data-id");
        var pop = $(this).pop({_top: "200px", _left: "200px",_iframe: true});
        $(".pop-content", pop).children("iframe").attr("src", "index.php?r=" + module + "/input/edit&action=" + action + "&id=" + id);
     });

     //delete
    $("#section-bar").find(".fnt.ico-del").click(function(){
        var action = $(this).find("span").attr("data-action");
        var activeObj = $("#myTable").find("tr[class='active']");
        if( activeObj.length == 0 ){
            alert("请选择删除对象");
            return false;
        }
        var id = activeObj.attr("data-id");
        if(confirm("确定删除?")){
            $.get(
                "./index.php?r=" + module + "/input/del&id=" + id,
                function(data){
                     if(data=="success"){
                            window.location.reload();
                            //activeObj.remove();
                    }
                    if(data=="defail"){
                            alert("删除失败!");
                            activeObj.css("background-color", "lightred");
                    }
                }
            );
        }
    });

     //show 
    $("#myTable").on("click", "tr:gt(0)", function(){

        $(this).siblings("tr").removeClass("active");
        $(this).siblings("tr").find("td").css("background-color", "white");
        $(this).addClass("active");
        $(this).find("td").css("background-color", "lightgreen");

     });

    //导入功能
    $("#section-bar").find(".fnt.ico-import").click(function(){

        var action = $(this).children("span").attr("data-action");
        var pop = $(this).pop();
        pop.children(".pop-title").append("当前位置：导入");
        pop.children(".pop-footer").append('<input type="button" name="delColSelected" value="删除选定列">   | ');
        pop.children(".pop-footer").append('<input type="button" name="delRowSelected" value="删除选定行">  | ');
        pop.children(".pop-footer").append('<input type="text" name="ACol" size="3">O<input type="text" name="BCol" size="3"><input type="button" name="DH" value="倒换"> |');
        pop.children(".pop-footer").append('<input type="button" name="cleanColSelected" value="清空选定列">   |');
        $(".pop-content", pop).css("overflow", "scroll");
        $.get("./index.php?r=input/import", { "action":action, "module":module }, function(data){$(".pop-content", pop).html(data)});

    });

    //另存为
    $("#section-bar").find(".fnt.ico-save-as").click(function(){
        var action = $(this).children("span").attr("data-action");
        var pop = $(this).pop({_left:"500px", _top:"300px",_size:"customer", _width:"500px", _height:"250px"});
        
        $(".pop-footer", pop).hide();
        $.get("./index.php?r=input/save-as",{ "action":action, "module":module },function(data){$(".pop-content", pop).html(data);});
    });

    //
    $("#section-bar").find("select").change(function(){
        var action = $(this).attr("data-action");
        var year = $(this).val();
        //alert("index.php?r=" + module + "/input/" + action + "&year=" + year);
        window.location.assign("index.php?r=" + module + "/input/" + action + "&year=" + year);
    });

    //search
    $("#section-bar").find(".fnt.ico-search").click(function(){
        var action = $(this).children("span").attr("data-action");
        var pop = $(this).pop({_left:"300px", _top:"200px",_size:"small"});    
        $(".pop-footer", pop).hide();
        $.get("./index.php?r=input/search",{ "action":action, "module":module },function(data){$(".pop-content", pop).html(data);});
    });

    //print
    $("#section-bar").find(".fnt.ico-print").click(function(){
        var action = $(this).children("span").attr("data-action");
        var pop = $(this).pop({_size: "small"});
        $(".pop-footer", pop).hide();
        $.get("./index.php?r=input/print",{ "action":action, "module":module },function(data){$(".pop-content", pop).html(data);});
    });


});