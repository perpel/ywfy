$(function(){

    var module = "input";
    var option = {_top: "200px", _left: "200px",_iframe: true, _iframe_id: "edit_pop_iframe"};
    var pop_win = function(_self, option, src){
        if( typeof(window.edit_pop) == "undefined" ){
            window.edit_pop = _self.pop(option);
        }
            $(".pop-content", window.edit_pop).children("iframe").attr("src", src);
            return false;
    }

    //add
    $("#section-bar").find(".fnt.ico-add").click(function(){
            var action = $(this).children("span").attr("data-action");
            var src = "index.php?r=" + module + "/edit/add&action=" + action;
            pop_win($(this), option, src);
    });

    //edit (1)
    $("#section-bar").find(".fnt.ico-edit").click(function(){
        var action = $(this).find("span").attr("data-action");
        var activeObj = $("#myTable").find("tr[class='active']");
        if( activeObj.length == 0 ){
            alert("请选择修改对象");
            return false;
        }
        var id = activeObj.attr("data-id");
        var src = "index.php?r=" + module + "/edit/edit&action=" + action + "&id=" + id;
        pop_win($(this), option, src);
        
    });

    //edit (2)
     $("#myTable").on("dblclick", "tr:gt(0)", function(){
            var action = $("#section-bar").find(".fnt.ico-edit").find("span").attr("data-action");
            var id = $(this).attr("data-id");
            var src = "index.php?r=" + module + "/edit/edit&action=" + action + "&id=" + id;
            pop_win($(this), option, src);

       });

     //导入功能
    $("#section-bar").find(".fnt.ico-import").click(function(){
            var action = $(this).children("span").attr("data-action");
            var src = "index.php?r=" + module + "/edit/import&action=" + action;
            pop_win($(this), option, src);
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
                "./index.php?r=" + module + "/edit/del",
                {
                    "id": id,
                    "action": action,
                },
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

    //另存为
    $("#section-bar").find(".fnt.ico-save-as").click(function(){
        var action = $(this).children("span").attr("data-action");
        var pop = $(this).pop({_left:"500px", _top:"300px",_size:"customer", _width:"500px", _height:"250px"});
        
        $(".pop-footer", pop).hide();
        $.get("./index.php?r=input/edit/save-as",{ "action":action },function(data){$(".pop-content", pop).html(data);});
    });

    //
    $("#section-bar").find("select").change(function(){
        var action = $(this).attr("data-action");
        var year = $(this).val();
        window.location.assign("index.php?r=" + module + "/input/index&action=" + action + "&year=" + year);
    });

    //search
    $("#section-bar").find(".fnt.ico-search").click(function(){
        var action = $(this).children("span").attr("data-action");
        var pop = $(this).pop({_left:"300px", _top:"200px",_size:"small"});    
        $(".pop-content", pop).css("overflow", "scroll");
        $.get("./index.php?r=input/input/search",{ "action":action },function(data){$(".pop-content", pop).html(data);});
    });

    //print
    $("#section-bar").find(".fnt.ico-print").click(function(){
        var action = $(this).children("span").attr("data-action");
        var pop = $(this).pop({_size: "small"});
        $(".pop-footer", pop).hide();
        var rand = Math.random()*1000 + 100;
        $.get("./index.php?r=input/print/print&rand=" + rand,{ "action":action},function(data){$(".pop-content", pop).html(data);});
    });


});