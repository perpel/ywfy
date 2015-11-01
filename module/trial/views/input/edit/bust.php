<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Conclusion;
?>
<?php
$this->registerJs($script);
?>

<?php $form = ActiveForm::begin(); ?>
<table width="100%" border="0" class="tablelist" cellspacing="0">
<input type="hidden" disabled id="utype" value="<?=$utype?>">
<?= $form->field($model, 'EntrustCycle', ['template'=>'{input}{error}'])->hiddenInput(["data-entrust-cycle"=>"entrust-cycle"]) ?>
  <tr>
    <td><?= $form->field($model, 'Year', ['template'=>'{label}'])->label("年度")  ?></td>
    <td><?= $form->field($model, 'Year', ['template'=>'{input}{error}'])->dropDownList(Conclusion::years())?></td>
    <td><?= $form->field($model, 'FlowNumber', ['template'=>'{label}']) ?></td>
    <td><?= $form->field($model, 'FlowNumber', ['template'=>'{input}{error}'])->textInput(["readonly"=>"readonly","data-flow-number"=>"flow-number"]) ?></td>
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
    <td><?= $form->field($model, 'Agency', ['template'=>'{label}'])->label("管理人/清算组")?></td>
    <td colspan="5"><?= $form->field($model, 'Agency', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'ChoiceWay', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'ChoiceWay', ['template'=>'{input}{error}'])->dropDownList(Conclusion::selectedMode()) ?></td>
    </tr>


  <tr>
    <td><?= $form->field($model, 'TropschOffice', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'TropschOffice', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'MaterialsCompletionDate', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'MaterialsCompletionDate', ['template'=>'{input}{error}'])->textInput(["data-mater-complete"=>"mater-complete", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'SuspendedDate', ['template'=>'{label}'])->label("暂缓日期")?></td>
    <td><?= $form->field($model, 'SuspendedDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

    <tr>
    <td><?= $form->field($model, 'SendDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'SendDate', ['template'=>'{input}{error}'])->textInput(["data-send-date"=>"send-date", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'BeginDate', ['template'=>'{label}'])->label("补充材料日期")?></td>
    <td><?= $form->field($model, 'BeginDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'RetractDate', ['template'=>'{label}'])->label("撤回日期")?></td>
    <td><?= $form->field($model, 'RetractDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'SiteSurveyDate', ['template'=>'{label}'])->label("勘察日期")?></td>
    <td colspan="3"><?= $form->field($model, 'SiteSurveyDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'GetbackDate', ['template'=>'{label}'])->label("结案日期")?></td>
    <td><?= $form->field($model, 'GetbackDate', ['template'=>'{input}{error}'])->textInput(["data-back-date"=>"back-date", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'Cycle', ['template'=>'{label}'])->label("破产周期")?></td>
    <td><?= $form->field($model, 'Cycle', ['template'=>'{input}{error}'])->textInput(["readonly"=>"readonly", "data-cycle"=>"cycle"])?></td>
  </tr>

   <tr>
    <td><?= $form->field($model, 'AuctionStatus', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'AuctionStatus', ['template'=>'{input}{error}'])->dropDownList($model::status(),["data-auction-status"=>"status"]) ?></td>
    <td><?= $form->field($model, 'Money', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'Money', ['template'=>'{input}{error}'])?></td>
    <td><label>评估报告</label></td>
    <td><input type="file" /></td>
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