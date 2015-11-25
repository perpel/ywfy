$(function(){

    var flow = $(":text[data-flow-number='flow-number']");
    var dbl_action = $("#action").val();
    $("#" + dbl_action + "-casenumber").dblclick(function(){
        var pop = $(this).pop({_parent:$("#pop",  parent.document), _win: $(parent), _doc: $(parent.document),_size:"customer", _width:"1000px", _height:"300px", _iframe:true});
        var tid = dbl_action;
        pop.css("z-index", "12");
        pop.find(".pop-footer").remove();
        $(".pop-content", pop).children("iframe").attr("src", "./index.php?r=sybase/default/index&tid=" + tid);
        $(".pop-content", pop).css("height", "250px");
    });

    /*$("#assess-case,#identify-case,#auction-case,#projectcost-case,#bust-case").dblclick(function(){
        var pop = $(this).pop({_size:"small"});
        var tid = $(this).attr("id");
        pop.find(".pop-footer").remove();
        $.get("./index.php?r=input/case&tid=" + tid,function(data){$(".pop-content", pop).html(data);});
    });*/

    $("#assess-agency,#identify-agency,#auction-agency,#projectcost-agency, #bust-agency").dblclick(function(){
        var type = $("#utype").val();
        var pop = $(this).pop({_size:"small"});
        var tid = $(this).attr("id");
        pop.find(".pop-footer").remove();
        $.get("./index.php?r=basic/default/agency", {"tid":tid, "type":type}, function(data){$(".pop-content", pop).html(data);});
    });

    $("#assess-casenumber,#identify-casenumber,#auction-casenumber,#project-casenumber,#bust-casenumber").blur(function(){

        if( !flow.val() ){
            var type = $("#utype").val();
            var action = $("#action").val();
            $.get(
                "./index.php?r=input/edit/get-case-number",
                {
                    "type": type,
                    "action": action,
                },
                function(data){
                    flow.val(data);
                }
            );
        }

    });
    var sendDate = $(":text[data-send-date='send-date']").val();
    var backDate = $(":text[data-back-date='back-date']").val();
    var cycleObj = $(":text[data-cycle='cycle']");
    var materCompleteDate = $(":text[data-mater-complete='mater-complete']").val();
    var entrustCycleObj = $(":hidden[data-entrust-cycle='entrust-cycle']");
    var getbackCycleObj = $(":hidden[data-getback-cycle='getback-cycle']");
    var putonCycleObj = $(":hidden[data-puton-cycle='puton-cycle']");
    var caseClosedDate = $(":text[data-case-closed='case-closed']").val();

    var initDate = function(){
        if (sendDate == "") {
            cycleObj.val(0);
            return false;
        };
        sendDate = sendDate.replace(/-/g,"/");
        sendDate = new Date(sendDate);

        if(backDate == ""){
            backDate = new Date();
        }else{
            backDate = backDate.replace(/-/g,"/");
            backDate = new Date(backDate);
        }
        
        if(sendDate > backDate){
            cycleObj.val("0");
            getbackCycleObj.val("0");
            return false;
        }
        var day = backDate.getTime() - sendDate.getTime();
        day = Math.floor(day/(24*3600*1000));
        cycleObj.val(day+1);
        getbackCycleObj.val(day+1);
        return true;
    };

    $(":text[data-send-date='send-date'], :text[data-back-date='back-date'], :text[data-mater-complete='mater-complete'], :text[data-case-closed='case-closed']").blur(function(){
        sendDate = $(":text[data-send-date='send-date']").val();
        backDate = $(":text[data-back-date='back-date']").val();    
        if(initDate()){
            $("select[data-auction-status='status']").val("完成");
        }else{
            $("select[data-auction-status='status']").val("选择进度");
        }
        sendDate = $(":text[data-send-date='send-date']").val();
        materCompleteDate = $(":text[data-mater-complete='mater-complete']").val();
        entrustDate();

        caseClosedDate = $(":text[data-case-closed='case-closed']").val();
        materCompleteDate = $(":text[data-mater-complete='mater-complete']").val();
        putonDate();


    });

    var putonDate = function(){

        if (caseClosedDate == "") {
            putonCycleObj.val(0);
            return false;
        };
        caseClosedDate = caseClosedDate.replace(/-/g,"/");
        caseClosedDate = new Date(caseClosedDate);

        if(materCompleteDate == ""){
            putonCycleObj.val(0);
            return false;
        }else{
            materCompleteDate = materCompleteDate.replace(/-/g,"/");
            materCompleteDate = new Date(materCompleteDate);
        }
        
        if(caseClosedDate > materCompleteDate){
            putonCycleObj.val(0);
            return false;
        }
        var day = materCompleteDate.getTime() - caseClosedDate.getTime();
        day = Math.floor(day/(24*3600*1000));
        putonCycleObj.val(day+1);        
        return true;

    };

    
    
    var entrustDate = function(){

        if (sendDate == "") {
            entrustCycleObj.val(0);
            return false;
        };
        sendDate = sendDate.replace(/-/g,"/");
        sendDate = new Date(sendDate);

        if(materCompleteDate == ""){
            entrustCycleObj.val(0);
            return false;
        }else{
            materCompleteDate = materCompleteDate.replace(/-/g,"/");
            materCompleteDate = new Date(materCompleteDate);
        }
        
        if(sendDate < materCompleteDate){
            entrustCycleObj.val(0);
            return false;
        }
        var day = sendDate.getTime() - materCompleteDate.getTime();
        day = Math.floor(day/(24*3600*1000));
        entrustCycleObj.val(day+1);        
        return true;
    };

    $("#report").click(function(){
        var pop = $(this).pop({_size:"small"});
        var action = $("#action").val();
        var uid = $(this).attr("data-id");
        pop.find(".pop-footer").remove();
        var rand = Math.random()*1000 + 100;
        $.get("./index.php?r=input/report/show&rand=" + rand, {"type":action, "uid":uid}, function(data){$(".pop-content", pop).html(data);});
    });
 
 
});