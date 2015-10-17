<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<?php $form = ActiveForm::begin(); ?>
<table width="100%" border="0" class="tablelist" cellspacing="0">
  <tr>
    <td><label>年度 </label></td>
    <td><select><option>2013</option><option>2014</option><option>2015</option></select></td>
    <td><label>委托案号 </label></td>
    <td><input type="text" /></td>
     <td><label>督办人  </label></td>
    <td><input type="text" /></td>
    <td><label>电话</label></td>
    <td><input type="text" /></td>
  </tr>
  <tr>
    <td><label>原审案号</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>案由</label></td>
    <td colspan="3"><input type="text" /></td>
  </tr>
  <tr>
    <td><label>当事人1</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>当事人2</label></td>
    <td colspan="3"><input type="text" /></td>
  </tr>
  <tr>
    <td><label>委托部门</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>承办人</label></td>
    <td><input type="text" /></td>
    <td><label>电话</label></td>
    <td><input type="text" /></td>
  </tr>
  <tr>
    <td><label>移交材料</label></td>
    <td colspan="7"><input type="text" /></td>
  </tr>
  <tr>
    <td bgcolor="#ddecfb"><label>标的物</label></td>
    <td colspan="7"><textarea></textarea></td>
  </tr>
  <tr>
    <td><label>评估机构</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>评估师</label></td>
    <td><input type="text" /></td>
    <td><label>电话</label></td>
    <td><input type="text" /></td>
  </tr>
  <tr>
    <td><label>选定方式</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>选定日期</label></td>
    <td colspan="3"><input type="text" /></td>
  </tr>
  <tr>
    <td><label>收案日期</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>立案日期 </label></td>
    <td><input type="text" /></td>
    <td><label>暂款日期</label></td>
    <td><input type="text" /></td>
  </tr>
    <tr>
    <td><label>委托日期</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>补充材料日期 </label></td>
    <td><input type="text" /></td>
    <td><label>撤回日期</label></td>
    <td><input type="text" /></td>
  </tr>
  <tr>
    <td><label>勘验日期</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>结案日期 </label></td>
    <td><input type="text" /></td>
    <td><label>结案周期</label></td>
    <td><input type="text" /></td>
  </tr>
   <tr>
    <td><label>进度</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>评估价</label></td>
    <td><input type="text" /></td>
    <td><label>评估报告</label></td>
    <td><input type="text" /></td>
  </tr>
  <tr>
    <td><label>通知缴费日期</label></td>
    <td colspan="3"><input type="text" /></td>
    <td><label>评估费用</label></td>
    <td><input type="text" /></td>
    <td><label>送达业务庭日期</label></td>
    <td><input type="text" /></td>
    <tr>
    <td><label>跟踪评查情况</label></td>
    <td colspan="7"><input type="text" /></td>
  </tr>
  <tr>
    <td bgcolor="#ddecfb"><label>备注</label></td>
    <td colspan="7"><textarea></textarea></td>
  </tr>
</table>


<!--<table class="tablelist">
    
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

</table>-->

<?=Html::submitButton('提交')?>

<?php ActiveForm::end(); ?>