<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use app\models\Conclusion;
?>
<script>
 $(function(){

$(".pop-title").html("<h3>评估录入-<?=$title?><span>(当前操作:<?= Yii::$app->user->identity->Name?>)</span></h3>");
    
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
    <td colspan="3"><?= $form->field($model, 'EntrustDeparment', ['template'=>'{input}{error}']) ?></td>
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
    <td colspan="3"><?= $form->field($model, 'Agency', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'Assessor', ['template'=>'{label}'])?></td>
    <td><?= $form->field($model, 'Assessor', ['template'=>'{input}{error}']) ?></td>
    <td><?= $form->field($model, 'AssessorTel', ['template'=>'{label}'])?></td>
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

<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#w0').yiiActiveForm([{"id":"conclusion-year","name":"Year","container":".field-conclusion-year","input":"#conclusion-year","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"年度 cannot be blank."});yii.validation.string(value, messages, {"message":"年度 must be a string.","max":12,"tooLong":"年度 should contain at most 12 characters.","skipOnEmpty":1});}},{"id":"conclusion-year","name":"Year","container":".field-conclusion-year","input":"#conclusion-year","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"年度 cannot be blank."});yii.validation.string(value, messages, {"message":"年度 must be a string.","max":12,"tooLong":"年度 should contain at most 12 characters.","skipOnEmpty":1});}},{"id":"conclusion-flownumber","name":"FlowNumber","container":".field-conclusion-flownumber","input":"#conclusion-flownumber","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"委托案号必填"});yii.validation.string(value, messages, {"message":"委托案号 must be a string.","max":50,"tooLong":"委托案号 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-flownumber","name":"FlowNumber","container":".field-conclusion-flownumber","input":"#conclusion-flownumber","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"委托案号必填"});yii.validation.string(value, messages, {"message":"委托案号 must be a string.","max":50,"tooLong":"委托案号 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-supervise","name":"Supervise","container":".field-conclusion-supervise","input":"#conclusion-supervise","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"督办人 must be a string.","max":20,"tooLong":"督办人 should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"conclusion-supervise","name":"Supervise","container":".field-conclusion-supervise","input":"#conclusion-supervise","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"督办人 must be a string.","max":20,"tooLong":"督办人 should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"conclusion-supervisetel","name":"SuperviseTel","container":".field-conclusion-supervisetel","input":"#conclusion-supervisetel","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"督办人电话 must be a string.","max":50,"tooLong":"督办人电话 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-supervisetel","name":"SuperviseTel","container":".field-conclusion-supervisetel","input":"#conclusion-supervisetel","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"督办人电话 must be a string.","max":50,"tooLong":"督办人电话 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-casenumber","name":"CaseNumber","container":".field-conclusion-casenumber","input":"#conclusion-casenumber","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"原审案号必填"});yii.validation.string(value, messages, {"message":"原审案号 must be a string.","max":50,"tooLong":"原审案号 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-casenumber","name":"CaseNumber","container":".field-conclusion-casenumber","input":"#conclusion-casenumber","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"原审案号必填"});yii.validation.string(value, messages, {"message":"原审案号 must be a string.","max":50,"tooLong":"原审案号 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-case","name":"Case","container":".field-conclusion-case","input":"#conclusion-case","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"案由必填"});yii.validation.string(value, messages, {"message":"案由 must be a string.","max":50,"tooLong":"案由 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-case","name":"Case","container":".field-conclusion-case","input":"#conclusion-case","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"案由必填"});yii.validation.string(value, messages, {"message":"案由 must be a string.","max":50,"tooLong":"案由 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-litigantone","name":"LitigantOne","container":".field-conclusion-litigantone","input":"#conclusion-litigantone","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"当事人1 must be a string.","max":200,"tooLong":"当事人1 should contain at most 200 characters.","skipOnEmpty":1});}},{"id":"conclusion-litigantone","name":"LitigantOne","container":".field-conclusion-litigantone","input":"#conclusion-litigantone","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"当事人1 must be a string.","max":200,"tooLong":"当事人1 should contain at most 200 characters.","skipOnEmpty":1});}},{"id":"conclusion-litiganttwo","name":"LitigantTwo","container":".field-conclusion-litiganttwo","input":"#conclusion-litiganttwo","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"当事人2 must be a string.","max":200,"tooLong":"当事人2 should contain at most 200 characters.","skipOnEmpty":1});}},{"id":"conclusion-litiganttwo","name":"LitigantTwo","container":".field-conclusion-litiganttwo","input":"#conclusion-litiganttwo","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"当事人2 must be a string.","max":200,"tooLong":"当事人2 should contain at most 200 characters.","skipOnEmpty":1});}},{"id":"conclusion-entrustdeparment","name":"EntrustDeparment","container":".field-conclusion-entrustdeparment","input":"#conclusion-entrustdeparment","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"委托部门 must be a string.","max":50,"tooLong":"委托部门 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-entrustdeparment","name":"EntrustDeparment","container":".field-conclusion-entrustdeparment","input":"#conclusion-entrustdeparment","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"委托部门 must be a string.","max":50,"tooLong":"委托部门 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-chambers","name":"Chambers","container":".field-conclusion-chambers","input":"#conclusion-chambers","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"业务庭承办人 must be a string.","max":20,"tooLong":"业务庭承办人 should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"conclusion-chambers","name":"Chambers","container":".field-conclusion-chambers","input":"#conclusion-chambers","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"业务庭承办人 must be a string.","max":20,"tooLong":"业务庭承办人 should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"conclusion-undertakertel","name":"UndertakerTel","container":".field-conclusion-undertakertel","input":"#conclusion-undertakertel","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"承办人电话 must be a string.","max":50,"tooLong":"承办人电话 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-undertakertel","name":"UndertakerTel","container":".field-conclusion-undertakertel","input":"#conclusion-undertakertel","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"承办人电话 must be a string.","max":50,"tooLong":"承办人电话 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-transfermaterial","name":"TransferMaterial","container":".field-conclusion-transfermaterial","input":"#conclusion-transfermaterial","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"移交材料 must be a string.","max":50,"tooLong":"移交材料 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-transfermaterial","name":"TransferMaterial","container":".field-conclusion-transfermaterial","input":"#conclusion-transfermaterial","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"移交材料 must be a string.","max":50,"tooLong":"移交材料 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-subjectmatter","name":"SubjectMatter","container":".field-conclusion-subjectmatter","input":"#conclusion-subjectmatter","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"标的物 must be a string.","skipOnEmpty":1});}},{"id":"conclusion-subjectmatter","name":"SubjectMatter","container":".field-conclusion-subjectmatter","input":"#conclusion-subjectmatter","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"标的物 must be a string.","skipOnEmpty":1});}},{"id":"conclusion-agency","name":"Agency","container":".field-conclusion-agency","input":"#conclusion-agency","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"机构名称 must be a string.","max":100,"tooLong":"机构名称 should contain at most 100 characters.","skipOnEmpty":1});}},{"id":"conclusion-agency","name":"Agency","container":".field-conclusion-agency","input":"#conclusion-agency","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"机构名称 must be a string.","max":100,"tooLong":"机构名称 should contain at most 100 characters.","skipOnEmpty":1});}},{"id":"conclusion-assessor","name":"Assessor","container":".field-conclusion-assessor","input":"#conclusion-assessor","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"评估师 must be a string.","max":20,"tooLong":"评估师 should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"conclusion-assessor","name":"Assessor","container":".field-conclusion-assessor","input":"#conclusion-assessor","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"评估师 must be a string.","max":20,"tooLong":"评估师 should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"conclusion-assessortel","name":"AssessorTel","container":".field-conclusion-assessortel","input":"#conclusion-assessortel","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"评估师电话 must be a string.","max":20,"tooLong":"评估师电话 should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"conclusion-assessortel","name":"AssessorTel","container":".field-conclusion-assessortel","input":"#conclusion-assessortel","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"评估师电话 must be a string.","max":20,"tooLong":"评估师电话 should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"conclusion-choiceway","name":"ChoiceWay","container":".field-conclusion-choiceway","input":"#conclusion-choiceway","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"选定方式 must be a string.","max":10,"tooLong":"选定方式 should contain at most 10 characters.","skipOnEmpty":1});}},{"id":"conclusion-choiceway","name":"ChoiceWay","container":".field-conclusion-choiceway","input":"#conclusion-choiceway","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"选定方式 must be a string.","max":10,"tooLong":"选定方式 should contain at most 10 characters.","skipOnEmpty":1});}},{"id":"conclusion-auctionstatus","name":"AuctionStatus","container":".field-conclusion-auctionstatus","input":"#conclusion-auctionstatus","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"进度 must be a string.","max":10,"tooLong":"进度 should contain at most 10 characters.","skipOnEmpty":1});}},{"id":"conclusion-auctionstatus","name":"AuctionStatus","container":".field-conclusion-auctionstatus","input":"#conclusion-auctionstatus","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"进度 must be a string.","max":10,"tooLong":"进度 should contain at most 10 characters.","skipOnEmpty":1});}},{"id":"conclusion-price","name":"Price","container":".field-conclusion-price","input":"#conclusion-price","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/,"message":"价格 must be a number.","skipOnEmpty":1});}},{"id":"conclusion-price","name":"Price","container":".field-conclusion-price","input":"#conclusion-price","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/,"message":"价格 must be a number.","skipOnEmpty":1});}},{"id":"conclusion-money","name":"Money","container":".field-conclusion-money","input":"#conclusion-money","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/,"message":"费用 must be a number.","skipOnEmpty":1});}},{"id":"conclusion-money","name":"Money","container":".field-conclusion-money","input":"#conclusion-money","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/,"message":"费用 must be a number.","skipOnEmpty":1});}},{"id":"conclusion-fllowresult","name":"FllowResult","container":".field-conclusion-fllowresult","input":"#conclusion-fllowresult","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"跟踪评查情况 must be a string.","max":50,"tooLong":"跟踪评查情况 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-fllowresult","name":"FllowResult","container":".field-conclusion-fllowresult","input":"#conclusion-fllowresult","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"跟踪评查情况 must be a string.","max":50,"tooLong":"跟踪评查情况 should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"conclusion-remark","name":"Remark","container":".field-conclusion-remark","input":"#conclusion-remark","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"备注 must be a string.","max":100,"tooLong":"备注 should contain at most 100 characters.","skipOnEmpty":1});}},{"id":"conclusion-remark","name":"Remark","container":".field-conclusion-remark","input":"#conclusion-remark","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"备注 must be a string.","max":100,"tooLong":"备注 should contain at most 100 characters.","skipOnEmpty":1});}}], []);
});</script>