<script>
$(function(){

    var import_module = $("#import_module").val();
    $("input[name='file']:file").change(function(){
        $("form").submit();
        $("iframe").load(function(){
            var v = $("iframe").contents().find("body").html();
            if(v != "error"){
                var dataObj=eval("("+v+")");
                $.each(dataObj, function(i, v){
                    var objTr = $('<tr><td><input name="rowSelect" type="checkbox" /></td></tr>').appendTo($(".drag-table").children("tbody"));
                    $.each(v, function(key, value){
                        objTr.append("<td>" + value + "</td>");
                    });
                });
            }
        });
    });
    //import

    $(":button[name='import']").click(function(){
        var dia = confirm("确定导入?");
        if(dia){
            var action = $("#section-bar").find(".fnt.ico-import").find("span").attr("data-action");
            var ths = new Array();
            $(".drag-table").children("thead").children("tr:first").find("th").each(function(i, v){
                ths[i] = $(this).attr("data-tpl");
            });
            var tr_data = $(".drag-table").children("tbody").children("tr");
            tr_data.each(function(){
                var tr_obj = $(this);
                var data_obj = new Object();
                $(this).find("td").each(function(i, v){
                    if(typeof(ths[i]) != "undefined"){
                        data_obj[ths[i]] = $(this).text();
                     }
                });
               $.post(
                    "./index.php?r=input/import&module=" + import_module + "&action=" + action ,
                    {    
                        "data_obj":JSON.stringify(data_obj)
                    },
                    function(data){
                        if(data == "defail"){
                            tr_obj.css("background-color", "red");
                        }
                        if(data == "success"){
                            tr_obj.remove();
                        }
                    }
                );
                    data_tr = null;
            });
    
    }

});


});
   


</script>

<div id="import">

    <iframe name="import" style="display:none"></iframe>
    <form target="import" action="index.php?r=input/import-list" method="post" enctype="multipart/form-data">
        <input name="file" type="file">
        <!--<select name="template" id="import-template">
            <option value="1">默认模板</option>
        </select>
        <input type="button" value=" 模板设置 " id="set-template">-->
        <input type="hidden" value="<?=$module?>" id="import_module">
        <input type="button" value="导入" name="import">
    </form>


    <table class="drag-table" cellspacing="0">
        <thead>
        <tr>
        <th class="table-zero">&empty;</th>
        <?php
           
            $ths = $model->attributeLabels();
            $i = 1;
            foreach ( $ths as $key => $value) {
                if( $key == "ID" || $key == "UCycle" || $key == "UCaseCycle"){
                    echo '<th>' . "(" . $i . ")" . $value . '</th>';
                }else{
                    echo '<th data-tpl="' . $key . '">' . "(" . $i . ")" . $value . '</th>';
                }
                $i++;
            }

        ?>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>