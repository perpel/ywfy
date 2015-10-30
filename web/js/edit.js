$(function(){

    $("#assess-casenumber,#identify-casenumber,#auction-casenumber,#projectcost-casenumber").dblclick(function(){
        var pop = $(this).pop({_size:"small"});
        var tid = $(this).attr("id");
        pop.find(".pop-footer").remove();
        $.get("./index.php?r=input/flow-number&tid=" + tid,function(data){$(".pop-content", pop).html(data);});
    });

    $("#assess-case,#identify-case,#auction-case,#projectcost-case").dblclick(function(){
        var pop = $(this).pop({_size:"small"});
        var tid = $(this).attr("id");
        pop.find(".pop-footer").remove();
        $.get("./index.php?r=input/case&tid=" + tid,function(data){$(".pop-content", pop).html(data);});
    });
});