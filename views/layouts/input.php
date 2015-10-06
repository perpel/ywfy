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

<?php $actionId=1;  ?>
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
        <li class="fnt ico-import"><span data-action="import">导入</span></li>
        <li class="fnt ico-add"><span data-action="add-<?= $actionId  ?>">增加</a></li>
        <li class="fnt ico-edit"><span data-action="edit-<?= $actionId  ?>">编辑</a></li>
        <li class="fnt ico-del"><span data-action="del">删除</span></li>
        <li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print"><span data-action="print">打印</span></li>
        <li class="fnt ico-search"><span data-action="search">条件查询</span></li>
    </ul>
    <li class="fnt ico-exit"><span data-action="exit">exit</span></li>
</div>





<div id="pop-input" >
            <div class="close drag" id="a" style="width:100px; height:30px; background-color:red;">
                <span>Close</span>
            </div>
            <div class="title drag"></div>
            <div class="content"></div>
</div>

<?php $this->endBody() ?>
 </body>

</html>
<?php $this->endPage() ?>