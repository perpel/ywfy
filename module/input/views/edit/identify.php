<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Common;
?>
<?php
    $this->registerJs($script);
?>

<?php $form = ActiveForm::begin(); ?>
<table width="100%" border="0" class="tablelist" cellspacing="0">
<input type="hidden" disabled id="utype" value="<?=$utype?>">
<input type="hidden" disabled id="action" value="identify">
<?= $form->field($model, 'EntrustCycle', ['template'=>'{input}{error}'])->hiddenInput(["data-entrust-cycle"=>"entrust-cycle"]) ?>
<?= $form->field($model, 'GetbackCycle', ['template'=>'{input}{error}'])->hiddenInput(["data-getback-cycle"=>"getback-cycle"]) ?>
<?= $form->field($model, 'PutOnRecordCycle', ['template'=>'{input}{error}'])->hiddenInput(["data-puton-cycle"=>"puton-cycle"]) ?>
<tr>
    <td><?= $form->field($model, 'Year', ['template'=>'{label}'])->label("年度")  ?></td>
    <td><?= $form->field($model, 'Year', ['template'=>'{input}{error}'])->dropDownList( Common::years( date("Y"), "1995") )?></td>
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
    <td><?= $form->field($model, 'EntrustDeparment', ['template'=>'{input}{error}'])->dropDownList(Common::PrincipalDepartment()) ?></td>
    <td><?= $form->field($model, 'IdentifiedType', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'IdentifiedType', ['template'=>'{input}{error}'])->dropDownList($model::IdentifyType()) ?></td>
    <td><?= $form->field($model, 'Undertaker', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'Undertaker', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'UndertakerTel', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'UndertakerTel', ['template'=>'{input}{error}']) ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'TransferMaterial', ['template'=>'{label}']) ?></td>
    <td colspan="7"><?= $form->field($model, 'TransferMaterial', ['template'=>'{input}{error}']) ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'SubjectMatter', ['template'=>'{label}'])->label("标的物") ?></td>
    <td colspan="7"><?= $form->field($model, 'SubjectMatter', ['template'=>'{input}{error}'])->textarea() ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'Agency', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'Agency', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'Master', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'Master', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'MasterTel', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'MasterTel', ['template'=>'{input}{error}']) ?></td>
  </tr>

   <tr>
    <td><?= $form->field($model, 'ChoiceWay', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'ChoiceWay', ['template'=>'{input}{error}'])->dropDownList(Common::selectedMode()) ?></td>
    <td><?= $form->field($model, 'ChoicedDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'ChoicedDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>


  <tr>
    <td><?= $form->field($model, 'CaseClosedDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'CaseClosedDate', ['template'=>'{input}{error}'])->textInput([ "data-case-closed"=>"case-closed", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'PutOnRecordDate', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'PutOnRecordDate', ['template'=>'{input}{error}'])->textInput(["data-mater-complete"=>"mater-complete", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'SuspendedDate', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'SuspendedDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

    <tr>
    <td><?= $form->field($model, 'EntrustDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'EntrustDate', ['template'=>'{input}{error}'])->textInput(["data-send-date"=>"send-date", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'MaterialsCompletionDate', ['template'=>'{label}'])->label("补充材料日期")?></td>
    <td><?= $form->field($model, 'MaterialsCompletionDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'RetractDate', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'RetractDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'SiteSurveyDate', ['template'=>'{label}'])->label("勘察日期")?></td>
    <td colspan="3"><?= $form->field($model, 'SiteSurveyDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'GetbackDate', ['template'=>'{label}'])->label("结案日期")?></td>
    <td><?= $form->field($model, 'GetbackDate', ['template'=>'{input}{error}'])->textInput(["data-back-date"=>"back-date", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'Cycle', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'Cycle', ['template'=>'{input}{error}'])->textInput(["readonly"=>"readonly", "data-cycle"=>"cycle"])?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'Progress', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'Progress', ['template'=>'{input}{error}'])->dropDownList($model::progress(),["data-auction-status"=>"status"]) ?></td>
    <td><?= $form->field($model, 'Fee', ['template'=>'{label}'])->label("鉴定价")?></td>
    <td><?= $form->field($model, 'Fee', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'DeliveryCourtDate', ['template'=>'{label}'])->label("送达业务庭日期")?></td>
    <td><?= $form->field($model, 'DeliveryCourtDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

   <tr>
     <td><?= $form->field($model, 'FllowResult', ['template'=>'{label}'])?></td>
    <td colspan="5"><?= $form->field($model, 'FllowResult', ['template'=>'{input}{error}'])?></td>
    <td><label>鉴定报告</label></td>
    <td>
 <?php
      if($model->ID){
      ?>
          <input data-id="<?=$model->ID?>" type="button" value="查看/添加" id="report" />
      <?php 
        }
      ?>

    </td>
  </tr>

  <tr>
     <td><?= $form->field($model, 'Suggestion', ['template'=>'{label}'])?></td>
    <td colspan="5"><?= $form->field($model, 'Suggestion', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'SuggestionAdmissible', ['template'=>'{label}'])->label("鉴定意见是否采信")?></td>
    <td><?= $form->field($model, 'SuggestionAdmissible', ['template'=>'{input}{error}'])->dropDownList(["是", "否"])?></td>
    
  </tr>

<tr>
     <td><?= $form->field($model, 'SourceIdentifiedDepartment', ['template'=>'{label}'])?></td>
    <td colspan="7"><?= $form->field($model, 'SourceIdentifiedDepartment', ['template'=>'{input}{error}'])?></td>
</tr>

<tr>
     <td><?= $form->field($model, 'SourceIdentifiedResult', ['template'=>'{label}'])?></td>
    <td colspan="7"><?= $form->field($model, 'SourceIdentifiedResult', ['template'=>'{input}{error}'])?></td>
</tr>

<tr>
     <td><?= $form->field($model, 'IdentifiedResult', ['template'=>'{label}'])?></td>
    <td colspan="7"><?= $form->field($model, 'IdentifiedResult', ['template'=>'{input}{error}'])?></td>
</tr>

<tr>
    <td><?= $form->field($model, 'Remark', ['template'=>'{label}'])?></td>
    <td colspan="7"><?= $form->field($model, 'Remark', ['template'=>'{input}{error}'])->textarea()?></td>
</tr>

</table>
<?= Html::submitButton('提交')?>
<?php ActiveForm::end(); ?> 