<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use app\models\Conclusion;
?>
<script>
 $(function(){

$(".pop-title").html("<h3>鉴定录入-<?=$title?><span>(当前操作:<?= Yii::$app->user->identity->Name?>)</span></h3>");
    
    $(".form-group").has("label").each(function(){
        if($(this).hasClass("required")){
            $(this).children().append("<span style='color:red;'>*</span>");
        }    
    });

 });  

 $(".case_srch").dblclick(function(){

    if($(this).val() == ""){
        $(this).val("选择/填写");
    }
    var pop = $(this).pop({_size:"small",_top: "80px", _left: "150px"});
    pop.children(".pop-title").html("<h3>原审案号</h3>");
    $.get("index.php?r=input/case-number",function(data){pop.children(".pop-content").html(data);});

 }); 
    
</script>

<?php $form = ActiveForm::begin(); ?>

<input type="hidden" name="Conclusion[DepartID]" value="<?=Yii::$app->user->identity->DepartmentNumber ?>">
<input type="hidden" name="Conclusion[Type]" value="<?=$type?>">
<table width="100%" border="0" class="tablelist" cellspacing="0">

  <tr>
    <td><?= $form->field($model, 'Year', ['template'=>'{label}']) ?></td>
    <td><?= $form->field($model, 'Year', ['template'=>'{input}{error}'])->dropDownList(Conclusion::years())?></td>
    <td><?= $form->field($model, 'FlowNumber', ['template'=>'{label}']) ?></td>
    <td><?= $form->field($model, 'FlowNumber', ['template'=>'{input}{error}']) ?></td>
     <td><?= $form->field($model, 'Supervise', ['template'=>'{label}']) ?></td>
    <td><?= $form->field($model, 'Supervise', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'SuperviseTel', ['template'=>'{label}']) ?></td>
    <td><?= $form->field($model, 'SuperviseTel', ['template'=>'{input}{error}']) ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'CaseNumber', ['template'=>'{label}']); ?></td>
    <td colspan="3"><?= $form->field($model, 'CaseNumber', ['template'=>'{input}{error}'])->textInput(["class"=>"case_srch"]); ?></td>
    <td><?= $form->field($model, 'Case', ['template'=>'{label}']) ?></td>
    <td colspan="3"><?= $form->field($model, 'Case', ['template'=>'{input}{error}']) ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'LitigantOne', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'LitigantOne', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'LitigantTwo', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'LitigantTwo', ['template'=>'{input}{error}'])?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'EntrustDeparment', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'EntrustDeparment', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'IdentifiedType', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'IdentifiedType', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'Chambers', ['template'=>'{label}'])->label("承办人")?></td>
    <td><?= $form->field($model, 'Chambers', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'UndertakerTel', ['template'=>'{label}'])->label("电话")?></td>
    <td><?= $form->field($model, 'UndertakerTel', ['template'=>'{input}{error}']) ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'TransferMaterial', ['template'=>'{label}']) ?></td>
    <td colspan="7"><?= $form->field($model, 'TransferMaterial', ['template'=>'{input}{error}'])->textarea() ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'IdentifiedCondition', ['template'=>'{label}']) ?></td>
    <td colspan="7"><?= $form->field($model, 'IdentifiedCondition', ['template'=>'{input}{error}'])->textarea() ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'Agency', ['template'=>'{label}'])->label("鉴定机构")?></td>
    <td colspan="3"><?= $form->field($model, 'Agency', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'Assessor', ['template'=>'{label}'])->label("鉴定人")?></td>
    <td><?= $form->field($model, 'Assessor', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'AssessorTel', ['template'=>'{label}'])->label("鉴定人电话")?></td>
    <td><?= $form->field($model, 'AssessorTel', ['template'=>'{input}{error}']) ?></td>
  </tr>

   <tr>
    <td><?= $form->field($model, 'ChoiceWay', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'ChoiceWay', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'ChoicedDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'ChoicedDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>


  <tr>
    <td><?= $form->field($model, 'TropschOffice', ['template'=>'{label}'])->label("收案日期")?></td>
    <td colspan="3"><?= $form->field($model, 'TropschOffice', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'MaterialsCompletionDate', ['template'=>'{label}'])->label("立案日期")?></td>
    <td><?= $form->field($model, 'MaterialsCompletionDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'SuspendedDate', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'SuspendedDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

    <tr>
    <td><?= $form->field($model, 'SendDate', ['template'=>'{label}'])->label("委托日期")?></td>
    <td colspan="3"><?= $form->field($model, 'SendDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'BeginDate', ['template'=>'{label}'])->label("补充材料日期")?></td>
    <td><?= $form->field($model, 'BeginDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'RetractDate', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'RetractDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'SiteSurveyDate', ['template'=>'{label}'])->label("勘察日期")?></td>
    <td colspan="3"><?= $form->field($model, 'SiteSurveyDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'GetbackDate', ['template'=>'{label}'])->label("结案日期")?></td>
    <td><?= $form->field($model, 'GetbackDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><label>结案周期</label></td>
    <td><input type="text" /></td>
  </tr>

   <tr>
    <td><?= $form->field($model, 'AuctionStatus', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'AuctionStatus', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'Price', ['template'=>'{label}'])->label("评估价")?></td>
    <td><?= $form->field($model, 'Price', ['template'=>'{input}{error}'])?></td>
    <td><label>评估报告</label></td>
    <td><input type="file" /></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'NotifyPaymentDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'NotifyPaymentDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'Money', ['template'=>'{label}'])->label("鉴定费用")?></td>
    <td><?= $form->field($model, 'Money', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'DeliveryCourtDate', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'DeliveryCourtDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
</tr>

<tr>
     <td><?= $form->field($model, 'FllowResult', ['template'=>'{label}'])?></td>
    <td colspan="7"><?= $form->field($model, 'FllowResult', ['template'=>'{input}{error}'])?></td>
</tr>

<tr>
    <td><?= $form->field($model, 'Remark', ['template'=>'{label}'])?></td>
    <td colspan="7"><?= $form->field($model, 'Remark', ['template'=>'{input}{error}'])->textarea()?></td>
</tr>

</table>
<?= Html::submitButton('提交')?>
<?php ActiveForm::end(); ?> 