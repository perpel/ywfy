<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<style>
ul,li{ list-style:none;}
.printbox{ width:100%; height:30px; line-height:30px; background:url(../../web/images/payment_bg.jpg) repeat-x;}
.tablebook{ width:100%; max-height:350px; overflow-y:auto; overflow-x:hidden; margin-top:10px;}
.tablebook table{ width:100%; border:1px solid #cacaca; border-top:none;}
.tablebook table th{ line-height:30px;  border:1px solid #cacaca; border-bottom:none; border-right:none; background:#f5f7fa; font-size:14px;}
.tablebook table td{ line-height:25px;  border:1px solid #cacaca; border-bottom:none; border-right:none; text-align:center; font-size:12px;}
.selected{color: red;}
</style>

<script>
  $(function(){

    $("#__print").parents(".pop").children(".pop-title").html("双击编辑模板");
    $("#__print").find("tr:gt(0)").dblclick(function(){
        var name = $(this).find("td").eq(1).text();
        var dia = confirm("是否进行“" + name + "”模板的编辑？");
        var id = $(this).attr("data-id");
        if( dia ){
            var rand = Math.random()*1000+1;
            window.open ('./index.php?r=input/print/create-template&id=' + id + "&rand=" + rand);
        }
    });

      $(".fnt.ico-search").click(function(){
          $(".print-search").slideToggle("slow");
        });

        var tds = $(".tablebook").find("table td:odd");

        $(".print-search").children("input").keyup(function(){

            var srch = $(this).val();
            if( $.trim(srch) == "" ){
              tds.parent("tr").show();
              return false;
            }
            tds.parent("tr").show();
            tds.each(function(){
                if( $(this).text().indexOf(srch) == -1){
                    $(this).parent("tr").hide();
                }
            });
        });

        $(".printbox .fnt.ico-print").click(function(){

            var sel = $(".tablebook").find("table").find(".selected");
            if( sel.length == 0){
                alert("请选择要打印的模板");
                return false;
            }
            var id = sel.attr("data-id");

            var tr = $("#myTable").find("tr[class='active']");
            if( tr.length == 0){
                alert("请选择数据");
                return false;
            }
            var data_id = tr.attr("data-id");

            var x = "n";

            $.ajax({  
                    type : "get",  
                    url : "index.php?r=input/print/has-template",  
                    data : "id=" + id,  
                    async : false,  
                    success : function(data){  
                        x = data;
                    }  
            });  

            if (x=="n"){
                alert("模板不存在，请先创建模板");
                return false;
            }

            var action = $("#section-bar").find(".fnt.ico-print").find("span").attr("data-action");
            var title = sel.children("td").eq(1).text();
            var rand = Math.random()*1000+1;
            window.open ('./index.php?r=input/print/print-template&id=' + id + "&data_id=" + data_id + "&action=" + action + "&rand=" + rand, title);

        });

  });
  
</script>

<div class="printbox">
    <ul class="fnt-ul">
      <li></li>
      <li class="fnt ico-search"><span>查询</span></li>
      <li class="fnt ico-save-as"><span>另存为</span></li>
      <li class="fnt ico-print" data-pop="pop"><span>打印</span></li>
      <li class="fnt ico-exit"><span>退出</span></li>
    </ul>
</div>
<div class="tablebook">
  <div class="print-search" style="display:none;">
    <input type="text" style="width:95%; height:26px;  margin:3px 5px; padding-left:8px;">
  </div>
  
    <table id="__print" cellspacing="0">
        <tr>
            <th>序号</th>
            <th>文书名称</th>
        </tr>
        <?php
        $i = 1;
        foreach( $model_info as $k=>$v){
            echo "<tr data-id='" . $v["ID"] . "'>";
            echo "<td>$i</td>";
            echo "<td>" . $v['Name'] . "</td>";
            echo "</tr>";
            $i++;
        }
        ?>
    </table>
</div>