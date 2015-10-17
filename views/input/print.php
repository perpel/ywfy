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

      $(".fnt.ico-search").click(function(){
          $(".print-search").slideToggle("slow");
        });

        var tds = $("table td:odd");

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
            var pop = $(this).pop({_width: "300px", _height: "300px", _size: "custom"});
           //tpl 
            var objTpl = $("table", ".printbox").find("tr[class='active']");
            if( !objTpl ){
              tpl = "all";
            }else{
              tpl = objTpl.attr("data-id");
            }
            var objTr = $("#myTable").find("tr[class='active']");
            if(objTpl && !objTr){
                alert("请选择需要打印的数据！");
                return false;
            }
            var id = objTr.attr("data-id");
            $.get("index.php?r=input/start-print",{"id":id, "tpl":tpl},function(data){pop.children(".pop-content").html(data)});
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
  
<table cellspacing="0">
    	<tr>
        <th>序号</th>
        <th>文书名称</th>
      </tr>
        <tr data-id="1">
          <td>1</td>
          <td>移交单</td>
        </tr>
        <tr>
          <td>2</td>
          <td>撤回委托评估函</td>
        </tr>
        <tr>
          <td>3</td>
          <td>评估委托书</td>
        </tr>
    </table>
</div>