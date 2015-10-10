<script>


    var parent = $("#import").parent().parent(".pop");
    parent.children(".pop-title").append("当前位置：导入");/*
    parent.children(".pop-footer").append('<input type="button" name="delColSelected" value="删除选定列">');
    parent.children(".pop-footer").append('<input type="button" name="delRowSelected" value="删除选定行">');
   */ 
    $("iframe").load(function(){
        var v = $("iframe").contents().find("body").html();
        if(v != "error"){

            var dataObj=eval("("+v+")");
            $.each(dataObj, function(i, v){

                var objTr = $('<tr><td><input name="rowSelect" type="checkbox" /></td></tr>').appendTo($(".drag-table").children("tbody"));
                //$(".drag-table").append("<tr>");
                $.each(v, function(key, value){

                    objTr.append("<td>" + value + "</td>");

                });
                //$(".drag-table").append("</tr>");
            });
          

        }
    });

    $("#set-template").click(function(){

        if($(".pop").length > 1){
            return;
        }
        $(this).pop();
        
    });


</script>

<div id="import">


    <iframe name="import" style="display:none"></iframe>
    <form target="import" action="index.php?r=input/import-list" method="post" enctype="multipart/form-data">
        <input name="file" type="file">
        <select name="template" id="import-template">
            <option value="1">默认模板</option>
        </select>
        <input type="button" value=" 模板设置 " id="set-template">
        <input type="submit" value="确定">
    </form>


    <table class="drag-table">
        <thead>
        <tr>
        <th class="table-zero"></th>
        <th>NO</th>
        <th>评估周期</th>
        <th>进度</th>
        <th>委托案号</th>
        <th>委托部门</th>
        <th>原审案号</th>
        <th>案由</th>
        <th>当事人1</th>
        <th>当事人2</th>
        <th>标的物</th>
        <th>选定方式</th>
        <th>选定日期</th>
        <th>评估机构</th>
        <th>收案日期</th>
        <th>立案日期</th>
        <th>立案周期</th>
        <th>移交材料</th>
        <th>委托日期</th>
        <th>委托周期</th>
        <th>勘验日期</th>
        <th>撤回日期</th>
        <th>暂缓日期</th>
        <th>送达业务庭日期</th>
        <th>缴费日期</th>
        <th>结案日期</th>
        <th>结案周期</th>
        <th>评估价（万元）</th>
        <th>跟踪评查情况</th>
        <th>业务庭承办人</th>
        <th>督办人</th>
        <th>评估费用</th>
        <th>评估师</th>
        <th>评估师电话</th>
        <th>承办人电话</th>
        <th>督办人电话</th>
        <th>备注</th>    
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
    
    
</div>