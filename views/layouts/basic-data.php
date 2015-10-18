<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\BasicDataAsset;

BasicDataAsset::register($this);
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

<?php $actionId=Yii::$app->controller->action->id;  ?>

<div id="section-bar">
    <ul class="fnt-ul">
        <input name="ctrl" type="hidden" value="<?=Yii::$app->controller->id; ?>">
        <li class="fnt ico-refesh"><?=$this->blocks["refesh"]; ?></li>
        <li class="fnt ico-import" data-pop="pop"><span data-action="import" data-tpl="<?= $actionId  ?>">导入</span></li>
        <li class="fnt ico-add" data-pop="pop"><span data-action="add-<?= $actionId  ?>" data-update="update-<?= $actionId  ?>">增加</a></li>
        <li class="fnt ico-del"><?=$this->blocks["del"]; ?></li>
        <li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print" data-pop="pop"><span data-action="print">打印</span></li>
        <li class="fnt ico-search" data-pop="pop"><span data-action="search">查询</span><input type="text"></li>
        <li class="fnt ico-exit"><span data-action="exit">exit</span></li>
    </ul>
    
</div>

<?= $content; ?>

<?php $this->endBody() ?>
<div id="pop"></div>
 </body>

</html>
<?php $this->endPage() ?>