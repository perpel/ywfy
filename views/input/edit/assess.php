<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<h1>Edit-Assess</h1>

<?php $form = ActiveForm::begin(); ?>

<table>
    
    <tr>

        <input type="text" name="Detail[ID]" value=12>
        <input type="text" name="Detail[DepartID]" value=2014>
        <input type="text" name="Detail[Type]" value="TEST">

        <td>
            <?php $d = ["2011"=>"2011","2012"=>"2012","2013"=>"2013","2014"=>"2014","2015"=>"2015"]; ?>
            <?= $form->field($model, 'Year')->dropDownList($d) ?>
            
        </td>
        
        <td>
            
            <?= $form->field($model, 'FlowNumber')->textInput() ?>
            
        </td>
        <td>
        
            <?= $form->field($model, 'Supervise')->textInput() ?>  
           
        </td>
        <td>
        
             <?= $form->field($model, 'SuperviseTel')->textInput() ?>  
        </td>
        

    </tr>
    <tr>
        
        <td colspan="2">
            <?= $form->field($model, 'CaseNumber')->textInput() ?>  
        </td>
        
        <td colspan="2">
            <?= $form->field($model, 'Case')->textInput() ?> 
        </td>
        
    </tr>
    <tr>
        
        <td colspan="2">
            <?= $form->field($model, 'LitigantOne')->textInput() ?>  
        </td>
        
        <td colspan="2">
            <?= $form->field($model, 'LitigantTwo')->textInput() ?> 
        </td>
        
    </tr>
    
    <tr>
        
        <td>
            <?= $form->field($model, 'EntrustDeparment')->textInput() ?> 
        </td>
        <td>
       
             <?= $form->field($model, 'Chambers')->textInput() ?>  
        </td>
        <td>
            <?= $form->field($model, 'UndertakerTel')->textInput() ?> 
        </td>
        <td></td>
        
    </tr>
    
    <tr>
        
        <td colspan="4">
            <?= $form->field($model, 'TransferMaterial')->textInput() ?> 
        </td>
        
    </tr>
    
    <tr>
        <td colspan="4">
            <?= $form->field($model, 'SubjectMatter')->textarea() ?> 
        </td>
    </tr>
    
    
     <tr>
        <td>
            <?= $form->field($model, 'Agency')->textInput() ?>  
        </td>
        <td>
             <?= $form->field($model, 'Assessor')->textInput() ?>
         </td>
        <td>
             <?= $form->field($model, 'AssessorTel')->textInput() ?>
         </td>
        <td></td>
    </tr>
    
    
     <tr>
       
        <td colspan="2">
         <?= $form->field($model, 'ChoiceWay')->textInput() ?>
         </td>
        <td colspan="2">
         <?= $form->field($model, 'ChoicedDate')->textInput() ?>
         </td>
        
    </tr>
    
    
    <tr>
        <td>
        <?= $form->field($model, 'GetbackDate')->textInput() ?>
        </td>
        
        <td>
         <?= $form->field($model, 'MaterialsCompletionDate')->textInput() ?>
        </td>
        
        <td>
        <?= $form->field($model, 'SuspendedDate')->textInput() ?>
        </td>
        <td></td>
    </tr>
    
    
    <tr>
        
        <td>
        <?= $form->field($model, 'SendDate')->textInput() ?>
        </td>
        
        <td>
            
          <?= $form->field($model, 'TransferMaterial')->textInput() ?>  
        </td>
        
        <td>
            <?= $form->field($model, 'RetractDate')->textInput() ?> 
        </td>
        <td></td>
        
    </tr>
    
    
    <tr>
        
        <td>
        <?= $form->field($model, 'SiteSurveyDate')->textInput() ?> 
        </td>
        
        <td>
        <?= $form->field($model, 'GetbackDate')->textInput() ?> 
        </td>
        
        <td>结案周期</td>
        <td><input type="text"></td>
        
    </tr>
    
    <tr>
        
        <td>进度</td>
        <td><input type="text"></td>
        
        <td>评估价</td>
        <td><input type="text"></td>
        
        <td>评估报告</td>
        <td><input type="text"></td>
    </tr>
    
    <tr>
        
        <td>通知缴费日期</td>
        <td><input type="text"></td>
        
        <td>评估费用</td>
        <td><input type="text"></td>
        
        <td>送达业务庭日期</td>
        <td><input type="text"></td>
    </tr>
    
    
    <tr>
        
        <td>跟踪评查情况</td>
        <td><input type="text"></td>
        
    </tr>
    
    <tr>
        
        <td>备注</td>
        <td colspan="7"><textarea name="" id="" cols="30" rows="10"></textarea></td>
    </tr>

</table>

<?=Html::submitButton('提交')?>

<?php ActiveForm::end(); ?>