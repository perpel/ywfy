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
var tid = $("#tid").val();
    $("#agency-finished").click(function(){
        var v = selected_info();
        $("#" + tid).val(v);
        $(this).parents(".pop").remove();
    });

    var selected_info = function(){
        var arr = new Array();
        trs.each(function(){
           
           if($(this).find(":checkbox").is(":checked")){
                arr.push($(this).find("td").eq(1).text());
            }
        });

        return arr.join(",");
    }


        var trs = $(".agency-number").find("tr:gt(0)");

        $(".print-search").keyup(function(){

            var srch = $(this).val();
            if( $.trim(srch) == "" ){
              trs.show();
              return false;
            }
            trs.show();
            trs.each(function(){
                if( $(this).text().indexOf(srch) == -1){
                    $(this).hide();
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
<input type="hidden" id="tid" value="<?=$tid?>">
<div class="printbox">
    <ul class="fnt-ul">
      <li></li>
      <li class="fnt ico-save-as"><span>另存为</span></li>
      <li class="fnt ico-print" data-pop="pop"><span>打印</span></li>
      <li class="fnt ico-search"><span>查询</span><input type="text" class="print-search"></li>
      <li class="fnt ico-refesh" id="agency-finished"><span>完成</span></li>
      <li class="fnt ico-exit"><span>退出</span></li>
    </ul>
</div>
<div class="tablebook agency-number">
<table cellspacing="0">
        <tr>
            <th></th>
        <th>机构名称</th>
        <th>联系人</th>
        <th>联系手机</th>
      </tr>
      <?php
        foreach($model_info as $v){
            echo "<tr>";
            echo "<td><input type='checkbox'></td>";
            echo "<td>" . $v["Name"] . "</td>";
            echo "<td>" . $v["Contacts"] . "</td>";
            echo "<td>" . $v["ContactsPhone"] . "</td>";
            echo "</tr>";
        }
      ?>
    </table>
    <br><br>
</div>