<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use app\module\register\models\Department;
    use app\assets\LoginAsset;
    LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title>管理员登录</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<form action="index.php?r=admin/default/login" method="post">
<div class="bigbox">
    <div class="fixedvox">
    <div style="height:80px;"></div>
       
        <div class="logininput">
            <div class="password">
                <ul>
                    <li class="titlename">管理员登录</li>   
                    <li>
                         <div class="form-group field-loginform-username required has-error">
<label class="control-label" for="loginform-username">法院代号:</label>
</div>      
                        <?=Html::dropDownList("LoginForm[departnum]", null, Department::courtList())?>
                    </li>
                    <li>
                        <div class="form-group field-loginform-username required has-error">
<label class="control-label" for="loginform-username">帐号:</label>
</div>                        <div class="form-group field-loginform-username required has-error">
<input type="text" id="loginform-username" class="form-control" name="LoginForm[username]">
</div>                    </li>
                    <li>
                        <div class="form-group field-loginform-password required has-error">
<label class="control-label" for="loginform-password">密码:</label>
</div>                        <div class="form-group field-loginform-password required has-error">
<input type="password" id="loginform-password" class="form-control" name="LoginForm[password]">
</div>                    </li>
                                       <li><input type="submit"  value="登录" /><input type="reset"  value="重置" /></li>
                </ul>
            </div>
        </div>
      
    </div>
</div>
</form>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>