<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Conclusion;
?>

<style>
ul,li{ list-style:none;}
.printbox{ width:100%; height:30px; line-height:30px; background:url(../../web/images/payment_bg.jpg) repeat-x;}
.tablebook{ width:100%; max-height:350px; overflow-y:auto; overflow-x:hidden; margin-top:10px;}
.tablebook table{ width:100%; border:1px solid #cacaca; border-top:none;}
.tablebook table tr td{ padding: 5px;}
.tablebook table input{ width: 90%;}
</style>

<script>
  $(function(){

    $(".fnt.ico-del", ".pop").click(function(){
        $(this).parents(".pop").find("form")[0].reset();
    });

    $(".fnt.ico-search", ".pop").click(function(){
        $(this).parents(".pop").find("form")[0].submit();       
    });
     

  });
  
</script>

<div class="printbox">
    <ul class="fnt-ul">
      <li></li>
      <li class="fnt ico-del"><span>清除条件</span></li>
      <li class="fnt ico-search"><span>查询</span></li>
      <li class="fnt ico-exit"><span>退出</span></li>
    </ul>
</div>
<div class="tablebook">
  <form action="index.php?r=<?=$module?>/input/<?=$action?>" method="post">
    <table cellspacing="0">
    <tr>
            <td>年度</td>
            <td>
                <select name="Year">
                <option value="all">-全部-</option>
                <?php
                    foreach ( Conclusion::years() as $year) {
                        echo "<option name='" . $year . "'>" . $year . "</option>";
                        }
                    ?>
                </select>
            </td>
            <td>流水号</td>
            <td><input type="text" name="FlowNumber"></td>
            <td>督办人</td>
            <td><input type="text" name="Supervise"></td>
            <td>业务庭承办人</td>
            <td><input type="text" name="Chambers"></td>
    </tr>

    <tr>
        <td>案号</td>
        <td colspan="3">
            <input type="text" name="CaseNumber">
        </td>
        <td>案由</td>
        <td colspan="3">
            <input type="text" name="Case">
        </td>
    </tr>

    <tr>
        <td>当事人1</td>
        <td colspan="3">
            <input type="text" name="LitigantOne">
        </td>
        <td>当事人2</td>
        <td colspan="3">
            <input type="text" name="LitigantTwo">
        </td>
    </tr>

    <tr>
        <td>移交材料</td>
        <td colspan="7">
            <input type="text" name="TransferMaterial">
        </td>
    </tr>

    <tr>
        <td>标的物</td>
        <td colspan="7">
            <input type="text" name="SubjectMatter">
        </td>
    </tr>
 
    </table>
    </form>
</div>