<?php
use app\models\Import;
?>

<script>


    var parent = $("#import").parent().parent(".pop");
    parent.children(".pop-title").append("当前位置：导入");
    
    parent.children(".pop-footer").append('<input type="button" name="delColSelected" value="删除选定列">');
    parent.children(".pop-footer").append('<input type="button" name="delRowSelected" value="删除选定行">');

<<<<<<< HEAD
=======
   */ 

>>>>>>> origin/zr
    

$("input[name='file']:file").change(function(){

    $("form").submit();
<<<<<<< HEAD

=======
>>>>>>> origin/zr
    $("iframe").load(function(){
        var v = $("iframe").contents().find("body").html();alert(123);
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

});

$(":button[name='import']").click(function(){

    var dia = confirm("确定导入?");

    if(dia){

        var ths = new Array();
        $(".drag-table").children("thead").children("tr:first").find("th").each(function(i, v){
          
            ths[i] = $(this).attr("data-tpl");
            //alert($(this).text());

        });

       var tr_data = $(".drag-table").children("tbody").children("tr");

       tr_data.each(function(){

            var tr_obj = $(this);
            var data_obj = new Object();
            data_obj['ID'] = 54;
            data_obj['DepartID'] = 2221;
            data_obj['Type'] = 'test';
            data_obj['Year'] = "2015-10-10";

            $(this).find("td").each(function(i, v){

                if( ths[i] != 0 && ths[i] != undefined){

                    data_obj[ths[i]] = $(this).text();

                }

            });

            console.log(data_obj);

            $.post(
                "index.php?r=input/import",
                data_obj,
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
        <input type="button" value="导入" name="import">
    </form>


    <table class="drag-table" cellspacing="0">
        <thead>
        <tr>
        <th data-tpl="0" class="table-zero">dfas</th>
        <?php
           
            $ths = Import::tpl(Yii::$app->request->get('tpl'));
           
            foreach ( $ths as $key => $value) {
                echo '<th data-tpl="' . $key . '">' . $value . '</th>';
            }

        ?>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
    
    
</div>