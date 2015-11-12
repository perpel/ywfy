<style>
ul,li{ list-style:none;}
.printbox{ width:100%; height:30px; line-height:30px; background:url(../../web/images/payment_bg.jpg) repeat-x;}
.tablebook{ width:100%; height:90%;overflow-y:auto; overflow-x:hidden; margin-top:10px;}
.tablebook table{ width:100%; border:1px solid #cacaca; border-top:none;}
.tablebook table th{ line-height:30px;  border:1px solid #cacaca; border-bottom:none; border-right:none; background:#f5f7fa; font-size:14px;}
.tablebook table td{ line-height:25px;  border:1px solid #cacaca; border-bottom:none; border-right:none; text-align:center; font-size:12px;}
.selected{color: red;}
</style>

<script>
  $(function(){
    var type = '<?=$type?>';
    var uid = <?=$uid?>;

    $(".report-number").find("tr:gt(0)").dblclick(function(){
        var title = "";
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var rand = Math.random()*1000+1;
        window.open ('./index.php?r=input/report/template&id=' + id + "&uid=" + uid + "&name=" + name + "&type=" + type + "&rand=" + rand, "");

    });

    $(".report").find(".fnt.ico-add").click(function(){
        var name = prompt("请输入报告名称", "");

        if( !name){
            return false;
        }

        if( $.trim(name) == "" ){
            alert("名称不能为空");
            return false;
        }

        var rand = Math.random()*1000+1;
        window.open ('./index.php?r=input/report/template&id=0&uid=' + uid + "&name=" + name + "&type=" + type + "&rand=" + rand, "");
    });

});
  
</script>
<div class="printbox report">
    <ul class="fnt-ul">
      <li></li>
      <li class="fnt ico-add"><span>增加</span></li>
      <li class="fnt ico-del"><span>删除</span></li>
    </ul>
</div>
<div class="tablebook report-number">
<table cellspacing="0">
      <tr>
        <th>序号</th>
        <th>名称</th>
      </tr>
      <?php
        $i = 1;
        foreach($model_info as $v){
            echo "<tr data-id='" . $v['ID'] . "' data-name='" . $v["Name"] . "'>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $v["Name"] . "</td>";
            echo "</tr>";
            $i++;
        }
      ?>
    </table>
    <br><br>
</div>