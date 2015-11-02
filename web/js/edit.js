$(function(){

    var flow = $(":text[data-flow-number='flow-number']");

    $("#assess-casenumber,#identify-casenumber,#auction-casenumber,#projectcost-casenumber,#bust-casenumber").dblclick(function(){
        var pop = $(this).pop({_size:"small"});
        var tid = $(this).attr("id");
        pop.find(".pop-footer").remove();
        $.get("./index.php?r=input/flow-number&tid=" + tid,function(data){$(".pop-content", pop).html(data);});
    });

    $("#assess-case,#identify-case,#auction-case,#projectcost-case,#bust-case").dblclick(function(){
        var pop = $(this).pop({_size:"small"});
        var tid = $(this).attr("id");
        pop.find(".pop-footer").remove();
        $.get("./index.php?r=input/case&tid=" + tid,function(data){$(".pop-content", pop).html(data);});
    });

    $("#assess-agency,#identify-agency,#auction-agency,#projectcost-agency, #bust-agency").dblclick(function(){
        var type = $("#utype").val();
        var pop = $(this).pop({_size:"small"});
        var tid = $(this).attr("id");
        pop.find(".pop-footer").remove();
        $.get("./index.php?r=input/agency", {"tid":tid, "type":type}, function(data){$(".pop-content", pop).html(data);});
    });

    $("#assess-casenumber,#identify-casenumber,#auction-casenumber,#projectcost-casenumber,#bust-casenumber").blur(function(){

        if( !flow.val() ){
            var type = $("#utype").val();
            $.get(
                "./index.php?r=input/get-case-number",
                {
                    "type":type,
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
            return false;
        }
        var day = backDate.getTime() - sendDate.getTime();
        day = Math.floor(day/(24*3600*1000));
        cycleObj.val(day+1);
        return true;
    };

    $(":text[data-send-date='send-date'], :text[data-back-date='back-date'], :text[data-mater-complete='mater-complete']").blur(function(){
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
    });

    
    
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
        var tid = $(this).attr("id");
        var uid = $(this).attr("data-id");
        pop.find(".pop-footer").remove();
        $.get("./index.php?r=input/report", {"tid":tid, "uid":uid}, function(data){$(".pop-content", pop).html(data);});
    });
 
 
});