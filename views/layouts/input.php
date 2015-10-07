<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\InputAsset;

InputAsset::register($this);
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
    <ul>
        <li>
            <span>年度</span>
            <select name="" id="">
                <option value="">2001</option>
                <option value="">2002</option>
                <option value="">2003</option>
                <option value="">2004</option>
            </select>
        </li>
    
        <li class="fnt ico-refesh"><a href="index.php?r=input/<?= $actionId  ?>">刷新</a></li>
        <li class="fnt ico-import" data-pop="pop"><span data-action="import">导入</span></li>
        <li class="fnt ico-add" data-pop="pop"><span data-action="add-<?= $actionId  ?>">增加</a></li>
        <li class="fnt ico-edit" data-pop="pop"><span data-action="edit-<?= $actionId  ?>">编辑</a></li>
        <li class="fnt ico-del"><span data-action="del">删除</span></li>
        <li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print" data-pop="pop"><span data-action="print">打印</span></li>
        <li class="fnt ico-search" data-pop="pop"><span data-action="search">条件查询</span></li>
    </ul>
    <li class="fnt ico-exit"><span data-action="exit">exit</span></li>
</div>

<?= $content; ?>

<?php $this->endBody() ?>
<div id="pop"></div>
 </body>

</html>
<?php $this->endPage() ?>