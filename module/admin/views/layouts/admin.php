<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--begin header-->
<div class="header bg-img">
    <h1>委托案件电子管理系统</h1>
    <div class="login-message">
        <span class="login-name">管理员：<?=Yii::$app->session->get("admin");?></span>
        <span class="welcom-msg">欢迎您登录本系统</span>
        <span class="clock"><?= date("Y-m-d");?></span>
        <span> | <a href="index.php?r=admin/default/logout" style="color:white;">退出</a></span>
    </div>
</div>
<!--end header-->


<div class="content">
 <!--begin side-->    
<div class="side">
    <!--begin .side-bar -->

    <div class="side-bar">
        <ul>
       
            <li class="side-dropdown">
                <a class="a-up" href="#">系统管理</a>
                <ul class="side-dropdown-menu">
                    <li><a href="index.php?r=admin/user/user">用户管理</a></li>
                    <!--<li><a href="index.php?r=sys/default/premission">权限管理</a></li>-->
                    <li><a href="index.php?r=admin/sys/logs">系统日志</a></li>
                    <li><a href="index.php?r=admin/sys/department">单位信息</a></li>
                    <!--<li class="side-dropdown">
                       <a href="#"><span>+</span> 数据管理</a>
                        <ul class="side-dropdown-menu">
                            <li><a target="container" href="index.php?r=sys/dbs/backup">数据备份</a></li>
                            <li><a target="container" href="index.php?r=sys/dbs/recovery">数据恢复</a></li>
                            <li><a target="container" href="index.php?r=sys/dbs/collection">数据采集</a></li>
                        </ul>
                    </li>-->
                </ul>
             </li>


        </ul>
        
    </div>
    <!--end .side-bar-->
</div>
<!--end side-->
 
<!--begin section-->    
<div class="section">
    <?= $content ?>
<div id="pop"></div>
</div>
 <!--end section-->
 </div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; 人民法院 <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>