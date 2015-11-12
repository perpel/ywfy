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
<input type="hidden" disabled id="utype" value="<?=$utype?>">
<?= $form->field($model, 'EntrustCycle', ['template'=>'{input}{error}'])->hiddenInput(["data-entrust-cycle"=>"entrust-cycle"]) ?>
  <tr>
    <td><?= $form->field($model, 'Year', ['template'=>'{label}'])->label("年度") ?></td>
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
    <td colspan="3"><?= $form->field($model, 'TransferMaterial', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'Assessor', ['template'=>'{label}']) ?></td>
    <td colspan="3"><?= $form->field($model, 'Assessor', ['template'=>'{input}{error}']) ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'SubjectMatter', ['template'=>'{label}']) ?></td>
    <td colspan="7"><?= $form->field($model, 'SubjectMatter', ['template'=>'{input}{error}'])->textarea() ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'Agency', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'Agency', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'ChoiceWay', ['template'=>'{label}'])->label("选定方式")?></td>
    <td colspan="3"><?= $form->field($model, 'ChoiceWay', ['template'=>'{input}{error}'])->dropDownList(Conclusion::selectedMode())?></td>
     </tr>


  <tr>
    <td><?= $form->field($model, 'TropschOffice', ['template'=>'{label}'])->label("收案日期")?></td>
    <td colspan="3"><?= $form->field($model, 'TropschOffice', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'MaterialsCompletionDate', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'MaterialsCompletionDate', ['template'=>'{input}{error}'])->textInput(["data-mater-complete"=>"mater-complete", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'GetbackDate', ['template'=>'{label}'])->label("结案日期")?></td>
    <td><?= $form->field($model, 'GetbackDate', ['template'=>'{input}{error}'])->textInput(["data-back-date"=>"back-date", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

    <tr>
    <td><?= $form->field($model, 'SendDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'SendDate', ['template'=>'{input}{error}'])->textInput(["data-send-date"=>"send-date", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'AuctionStatus', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'AuctionStatus', ['template'=>'{input}{error}'])->dropDownList($model::status(),["data-auction-status"=>"status"]) ?></td>
    </tr>

  <tr>
    <td></td>
    <td>第一次拍卖</td>
    <td>第二次拍卖</td>
    <td>第三次拍卖</td>
    <td>变卖</td>
     <td><?= $form->field($model, 'SuspendedDate', ['template'=>'{label}'])?></td>
    <td  colspan="2"><?= $form->field($model, 'SuspendedDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

  <tr>
    <td>公告</td>
    <td><?= $form->field($model, 'AnnouncementDate1', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'AnnouncementDate2', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'AnnouncementDate3', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'SaleDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'RetractDate', ['template'=>'{label}'])?></td>
    <td colspan="2"><?= $form->field($model, 'RetractDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

<tr>
  <td>时间</td>
  <td><?= $form->field($model, 'Time1', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  <td><?= $form->field($model, 'Time2', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  <td><?= $form->field($model, 'Time3', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  <td></td>
  <td><?= $form->field($model, 'Money', ['template'=>'{label}'])?></td>
  <td colspan="2"><?= $form->field($model, 'Money', ['template'=>'{input}{error}'])?></td>
</tr>



  <tr>
    <td>状态</td>
    <td><?= $form->field($model, 'Status1', ['template'=>'{input}{error}'])->dropDownList($model::status2())?></td>
    <td><?= $form->field($model, 'Status2', ['template'=>'{input}{error}'])->dropDownList($model::status2())?></td>
    <td><?= $form->field($model, 'Status3', ['template'=>'{input}{error}'])->dropDownList($model::status2())?></td>
    <td><?= $form->field($model, 'SaleStatus', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'TotalDate', ['template'=>'{label}'])?></td>
    <td colspan="2"><?= $form->field($model, 'TotalDate', ['template'=>'{input}{error}'])->textInput(["class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
  </tr>

   <tr>
    <td>起拍价</td>
    <td><?= $form->field($model, 'StartAuctionPrice1', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'StartAuctionPrice2', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'StartAuctionPrice3', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'SalePrice', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'Cycle', ['template'=>'{label}'])->label("拍卖周期")?></td>
    <td><?= $form->field($model, 'Cycle', ['template'=>'{input}{error}'])->textInput(["readonly"=>"readonly", "data-cycle"=>"cycle"])?></td>
  </tr>

  <tr>
    <td>价格</td>
    <td><?= $form->field($model, 'Price1', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'Price2', ['template'=>'{input}{error}'])?></td>
    <td><?= $form->field($model, 'Price3', ['template'=>'{input}{error}'])?></td>
    <td></td>
    <td></td>
    <td colspan="2"><input type="file" /></td>
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