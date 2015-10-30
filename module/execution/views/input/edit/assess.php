<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Conclusion;
use app\module\data\models\Agency;
?>
<?php
$this->registerJs($script);
?>

<?php $form = ActiveForm::begin(); ?>
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
    <td colspan="3"><?= $form->field($model, 'EntrustDeparment', ['template'=>'{input}{error}'])->dropDownList(Conclusion::PrincipalDepartment()) ?></td>
    <td><?= $form->field($model, 'Chambers', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'Chambers', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'UndertakerTel', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'UndertakerTel', ['template'=>'{input}{error}']) ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'TransferMaterial', ['template'=>'{label}']) ?></td>
    <td colspan="7"><?= $form->field($model, 'TransferMaterial', ['template'=>'{input}{error}']) ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'SubjectMatter', ['template'=>'{label}']) ?></td>
    <td colspan="7"><?= $form->field($model, 'SubjectMatter', ['template'=>'{input}{error}'])->textarea() ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'Agency', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'Agency', ['template'=>'{input}{error}'])->dropDownList(Agency::dropList( $model->type )) ?></td>
    <td><?= $form->field($model, 'Assessor', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'Assessor', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'AssessorTel', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'AssessorTel', ['template'=>'{input}{error}']) ?></td>
  </tr>

   <tr>
    <td><?= $form->field($model, 'ChoiceWay', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'ChoiceWay', ['template'=>'{input}{error}'])->dropDownList(Conclusion::selectedMode()) ?></td>
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
    <td colspan="3"><?= $form->field($model, 'AuctionStatus', ['template'=>'{input}{error}'])->dropDownList($model::status()) ?></td>
    <td><?= $form->field($model, 'Price', ['template'=>'{label}'])->label("评估价")?></td>
    <td><?= $form->field($model, 'Price', ['template'=>'{input}{error}'])?></td>
    <td><label>评估报告</label></td>
    <td><input type="file" /></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'NotifyPaymentDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'NotifyPaymentDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'Money', ['template'=>'{label}'])->label("评估费用")?></td>
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