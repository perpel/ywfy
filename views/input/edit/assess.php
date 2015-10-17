<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use app\models\Conclusion;
?>
<script>
    
    $(".pop-title").html("<h3>评估录入-<?=$title?><span>(当前操作:<?= Yii::$app->user->identity->Name?>)</span></h3>");

</script>

<?php $form = ActiveForm::begin(); ?>
<table class="tablelist" cellspacing="0">
	
<!--<table class="tablelist">-->

<input type="hidden" name="Conclusion[DepartID]" value="<?=Yii::$app->user->identity->DepartmentNumber ?>">
<input type="hidden" name="Conclusion[Type]" value="<?=$type?>">
    
    <tr>
        <td><?= $form->field($model, 'Year')->dropDownList(Conclusion::years())?></td>
        <td><?= $form->field($model, 'FlowNumber')->textInput() ?></td>
        <td><?= $form->field($model, 'Supervise')->textInput() ?></td>
        <td><?= $form->field($model, 'SuperviseTel')->textInput() ?></td>
   </tr>

    <tr>
        <td colspan="2"><?= $form->field($model, 'CaseNumber')->textInput() ?></td>
        <td colspan="2"><?= $form->field($model, 'Case')->textInput() ?></td>
    </tr>

    <tr>
        <td colspan="2"><?= $form->field($model, 'LitigantOne')->textInput() ?></td>
        <td colspan="2"><?= $form->field($model, 'LitigantTwo')->textInput() ?></td>
    </tr>

    <tr>
        <td><?= $form->field($model, 'EntrustDeparment')->textInput() ?></td>
        <td><?= $form->field($model, 'Chambers')->textInput() ?></td>
        <td><?= $form->field($model, 'UndertakerTel')->textInput() ?></td>
        <td></td>     
    </tr>
    
    <tr>
        <td colspan="4"><?= $form->field($model, 'TransferMaterial')->textInput() ?></td>
    </tr>
    
    <tr>
        <td colspan="4"><?= $form->field($model, 'SubjectMatter')->textarea() ?></td>
    </tr>
    
     <tr>
        <td><?= $form->field($model, 'Agency')->textInput() ?></td>
        <td><?= $form->field($model, 'Assessor')->textInput() ?></td>
        <td><?= $form->field($model, 'AssessorTel')->textInput() ?></td>
        <td></td>
    </tr>

     <tr>
       <td colspan="2"><?= $form->field($model, 'ChoiceWay')->textInput() ?></td>
        <td colspan="2"><?= $form->field($model, 'ChoicedDate')->textInput() ?></td>   
    </tr>
    
    <tr>
        <td><?= $form->field($model, 'GetbackDate')->textInput() ?></td>
        <td><?= $form->field($model, 'MaterialsCompletionDate')->textInput() ?></td>    
        <td><?= $form->field($model, 'SuspendedDate')->textInput() ?></td>
        <td></td>
    </tr>
    
    
    <tr>
        <td><?= $form->field($model, 'SendDate')->textInput() ?></td>
        <td><?= $form->field($model, 'TransferMaterial')->textInput() ?></td>
        <td><?= $form->field($model, 'RetractDate')->textInput() ?></td>
        <td></td>   
    </tr>
    
    <tr>
        <td><?= $form->field($model, 'SiteSurveyDate')->textInput() ?></td>
        <td><?= $form->field($model, 'GetbackDate')->textInput() ?></td>
        <td><?= $form->field($model, 'GetbackDate')->textInput() ?></td>
    </tr>
    
   <tr>
        <td><?php $jd = ["2011"=>"委托","2012"=>"暂缓","2013"=>"撤回","2014"=>"完成","2015"=>"2015"]; ?>
        <?= $form->field($model, 'AuctionStatus')->dropDownList($jd) ?>        
</td>
        
        
        <td>
        <?= $form->field($model, 'Price')->textInput() ?> 
        </td>
        
        <td>评估报告</td>
        <td><input type="text"></td>
    </tr>
    
    <tr>
        
        <td>
        <?= $form->field($model,  'NotifyPaymentDate')?> 

        </td>
        
        <td>评估费用</td>
        <td><input type="text"></td>
        
        <td>
        <?= $form->field($model, 'DeliveryCourtDate')->textInput([ "class"=>"Wdate", "onClick"=>"WdatePicker()"]) ?> 
        </td>
    </tr>

    <tr>
        
        <td>
        <?= $form->field($model, 'FllowResult')->textInput() ?> 
        </td>
        
    </tr>
    
    <tr>
        
        <td>
        <?= $form->field($model, 'Remark')->textArea() ?> 
        </td>
        
    </tr> 

</table>

<?=Html::submitButton('提交')?>

<?php ActiveForm::end(); ?>    