$(function(){

    $("#assess-casenumber").dblclick(function(){
        var pop = $(this).pop({_size:"small"});
        $.get("./index.php?r=input/flow-number",function(data){$(".pop-content", pop).html(data);});
    });

    $("#assess-case").dblclick(function(){
        var pop = $(this).pop({_size:"small"});
        $(".pop-content", pop).css("overflow", "scroll");
        $.get("./index.php?r=input/case",function(data){$(".pop-content", pop).html(data);});
    });
});