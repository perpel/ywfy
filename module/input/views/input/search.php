<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use app\models\Common;
?>

<script>
    
    $(".fnt.ico-del", ".pop").click(function(){
            $(this).parents(".pop").find("form")[0].reset();
        });
        $(".fnt.ico-search", ".pop").click(function(){
            $(this).parents(".pop").find("form")[0].submit();       
        });
        $(".pop-title").html("<h3><?=$model->type;?>:查询</h3>");

</script>

<div class="printbox">
    <ul class="fnt-ul">
      <li></li>
      <li class="fnt ico-del"><span>清除条件</span></li>
      <li class="fnt ico-search"><span>查询</span></li>
    </ul>
</div>

<?php $form = ActiveForm::begin(
[
'action' => ['input/index', "action"=>$action ],
'method'=>'post',
]
); ?>
<table width="100%" border="0" class="tablelist" cellspacing="0">
  
<tr>
    <td><?= $form->field($model, 'Year', ['template'=>'{label}'])->label("年度")  ?></td>
    <td colspan="3"><?= $form->field($model, 'Year', ['template'=>'{input}{error}'])->dropDownList( Common::years( date("Y"), "1995") )?></td>
    <td><?= $form->field($model, 'FlowNumber', ['template'=>'{label}']) ?></td>
    <td><?= $form->field($model, 'FlowNumber', ['template'=>'{input}{error}'])->textInput() ?></td>
    <td><?= $form->field($model, 'Supervise', ['template'=>'{label}']) ?></td>
    <td><?= $form->field($model, 'Supervise', ['template'=>'{input}{error}']) ?></td>
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
    <td colspan="3"><?= $form->field($model, 'EntrustDeparment', ['template'=>'{input}{error}'])->dropDownList( Common::PrincipalDepartment() ) ?></td>
    <td><?= $form->field($model, 'Undertaker', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'Undertaker', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'UndertakerTel', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'UndertakerTel', ['template'=>'{input}{error}']) ?></td>
  </tr>

  <tr>
    <td><?= $form->field($model, 'Agency', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'Agency', ['template'=>'{input}{error}'])?></td>
    <td></td>
    <td colspan="3"></td>
  </tr>

   <tr>
    <td><?= $form->field($model, 'ChoiceWay', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'ChoiceWay', ['template'=>'{input}{error}'])->dropDownList( Common::selectedMode() ) ?></td>
    <td><?= $form->field($model, 'EntrustDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'EntrustDate', ['template'=>'{input}{error}'])->textInput(["data-send-date"=>"send-date", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    </tr>

  <tr>
    <td><?= $form->field($model, 'CaseClosedDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'CaseClosedDate', ['template'=>'{input}{error}'])->textInput([ "data-case-closed"=>"case-closed", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
    <td><?= $form->field($model, 'PutOnRecordDate', ['template'=>'{label}'])?></td>
    <td colspan="3"><?= $form->field($model, 'PutOnRecordDate', ['template'=>'{input}{error}'])->textInput([ "data-mater-complete"=>"mater-complete", "class"=>"Wdate", "onfocus"=>"WdatePicker()"])?></td>
   </tr>

</table>
<?php ActiveForm::end(); ?> 