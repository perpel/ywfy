<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use app\assets\EditAsset;

EditAsset::register($this);
?>

<?php
    $this->registerJs($script);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<style>
/*登录*/
body{ background:#EAF7FD; margin:0;}
ul li{ list-style:none;}
.bigbox{ width:100%;margin:0px auto; background:url(../web/images/fybg.jpg); height:100%;}
.fixedvox{ width:990px; margin:0 auto; height:100%;}
.fixedvox h1{ text-align:center; height:30px; font-size:30px;}

.logininput{ width:787px; height:389px; background-color:rgb(250,250,250); border-radius:8px; margin:40px auto;  background:url(../web/images/img-fy.png) no-repeat; position:relative;}
.password{ width:470px; height:300px; margin:0 auto; padding-top:5px;}
.password ul{ width:470px; margin:20px 0 0 0;}
.password ul li {height:55px;}
.password ul li.titlename{ text-align:center; font-size:22px; font-family:"微软雅黑"; padding-right:50px; color:#ea9100; height:60px;}
.password ul li label{ font-size:14px; width:100px; text-align:right; display:block; float:left; line-height:36px; margin-right:15px;}
.password ul li select{ width:226px; height:30px; border-radius:4px; border:1px solid #cacaca;float:left;}
.password ul li input{ width:226px; height:30px; border-radius:4px; border:1px solid #cacaca; float:left;}
.password ul li a{ color:#666; text-decoration:none;font-size:12px;}
.password ul li a:hover{ color:#F00; text-decoration:none;}
.password ul li span{ margin:0 5px; font-size:10px;}
.password ul li input[type=submit]{ width:120px; height:36px; line-height:30px; font-size:16px; background:#3180bf; color:#fff; cursor:pointer; margin-left:70px;}
.password ul li input[type=reset]{ width:120px; height:36px; line-height:30px; font-size:16px; background:#3180bf; color:#fff; cursor:pointer; margin-left:40px;}
.password ul li input:hover[type=submit]{ background:#1c6aa8;}
.password ul li input:hover[type=reset]{ background:#1c6aa8;}
.password ul li input[type=checkbox]{ width:18px; height:15px; float:left;}
.imgload { position:absolute; top:0px; right:110px;}
.form-group{ display:block;}
.help-block{ width:300px; display:block; white-space: nowrap; clear:both; margin-left:115px; height:20px;font-size:14px; color:#F00; font-family:Arial, Helvetica, sans-serif;}
</style>
<?php $form = ActiveForm::begin(); ?>
<div class="bigbox">
    <div class="fixedvox">
    <div style="height:80px;"></div>
       
        <div class="logininput">
            <div class="password">
                <ul>
                    <li class="titlename">法院注册系统</li>   
                    <li>
                        <?= $form->field($model, 'Name', ['template'=>'{label}']) ?>                     
                        <?= $form->field($model, 'Name', ['template'=>'{input}{error}'])?>
                    </li>

                    <li>
                        <?= $form->field($model, 'FlowNumber', ['template'=>'{label}']) ?>
                        <?= $form->field($model, 'FlowNumber', ['template'=>'{input}{error}'])->textInput(["value"=>"浙江法委"])?>
                    </li>

                    <li>
                        <?= $form->field($model, 'Number', ['template'=>'{label}']) ?>
                        <?= $form->field($model, 'Number', ['template'=>'{input}{error}'])?>
                    </li>

                    <li>
                            <?= $form->field($model, 'RegistrationCode', ['template'=>'{label}']) ?>    
                            <?= $form->field($model, 'RegistrationCode', ['template'=>'{input}{error}'])?>  
                    </li>
                    <li>
                        <input type="submit"  value="注册法院" />
                    </li>
                </ul>
            </div>
        </div>

        <?php ActiveForm::end(); ?> 


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>





