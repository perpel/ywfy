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

<!--begin Nav-->
<!--   <div class="nav">
        <ul class="nav-bar lock">
            <li class="dropdown"  data-keycode="73">
                <a class="dropdown-toggle" href="#">数据录入(I)</a>
                <ul class="dropdown-menu">
                    <li><a href="#">评估录入</a></li>
                    <li><a href="#">鉴定录入</a></li>
                    <li><a href="#">拍卖录入</a></li>
                    <li class="divider"></li>
                    <li><a href="#">工程造价</a></li>
                    <li><a href="#">破产录入</a></li>
                </ul>
            </li>
            <li class="dropdown"  data-keycode="81">
                <a class="dropdown-toggle" href="#">查询考核(Q)</a>
                <ul class="dropdown-menu">
                    <li><a href="#">综合查询</a></li>
                    <li class="divider"></li>
                    <li><a href="#">评估机构考核</a></li>
                    <li><a href="#">鉴定机构考核</a></li>
                    <li><a href="#">拍卖机构考核</a></li>
                    <li class="divider"></li>
                    <li><a href="#">翻译机构考核</a></li>
                    <li><a href="#">破产机构考核</a></li>
                </ul>
            
            </li>
            <li class="dropdown" data-keycode="66">
                <a href="#" class="dropdown-toggle">基础数据(B)</a>
                <ul class="dropdown-menu">
                    <li><a href="#">案由定义</a></li>
                    <li class="divider"></li>
                    <li><a href="#">评估机构定义</a></li>
                    <li><a href="#">鉴定机构定义</a></li>
                    <li><a href="#">拍卖机构定义</a></li>
                    <li><a href="#">工程造价机构定义</a></li>
                    <li><a href="#">破产机构定义</a></li>
                    <li class="divider"></li>
                    <li><a href="#">打印模板设置</a></li>
                </ul>
            
            
            </li>
            <li class="dropdown" data-keycode="83">
                <a href="#" class="dropdown-toggle">系统管理(S)</a>
                <ul class="dropdown-menu">
                    <li><a href="#">用户管理</a></li>
                    <li><a href="#">权限管理</a></li>
                    <li><a href="#">修改密码</a></li>
                    <li class="divider"></li>
                    <li><a href="#">系统日志</a></li>
                    <li class="divider"></li>
                    <li><a href="#">单位信息</a></li>
                    <li class="sidepush">
                        <a class="sidepush-toggle" href="#">数据管理</a>
                        <ul class="sidepush-menu">
                            <li><a href="#">数据备份</a></li>
                            <li><a href="#">数据恢复</a></li>
                            <li class="divider"></li>
                            <li><a href="#">数据采集</a></li>
                        </ul>
                    </li>
                </ul>
            
            </li>
            <li class="dropdown" data-keycode="82">
                <a class="dropdown-toggle" href="#">报表中心(R)</a>
                <ul class="dropdown-menu">
                    <li><a href="#">报表预览</a></li>
                    <li><a href="#">报表设计</a></li>
                    <li class="divider"></li>
                    <li><a href="#">引出所有报表</a></li>
                    <li><a href="#">引入所有报表</a></li>
                </ul>
            
            </li>
            <li class="dropdown" data-keycode="72">
                <a class="dropdown-toggle" href="#">帮助(H)</a>
                <ul class="dropdown-menu">
                    <li><a href="#">修改密码</a></li>
                    <li><a href="#">锁定系统</a></li>
                    <li><a href="#">关于</a></li>
                </ul>
             </li>

        </ul>
        
</div>-->
 <!-- end Nav-->   

<!--begin header-->
<div class="header bg-img">
    <h1><?= Yii::$app->session->get('COURTNAME');?>委托案件电子管理系统</h1>
    <div class="login-message">
        <span class="login-number">(<?= Yii::$app->user->identity->Number ?>)</span>
        <span class="login-name"><?= Yii::$app->user->identity->Name ?></span>
        <span class="welcom-msg">欢迎您登录本系统</span>
        <span class="clock"><?= date("Y-m-d");?></span>
        <span> | <a href="index.php?r=site/logout" style="color:white;">退出</a></span>
    </div>
</div>
<!--end header-->


<div class="content">
 <!--begin side-->    
<div class="side">
    <!--begin .side-bar -->

    <div class="side-bar">
        <ul>
            <li class="side-dropdown active">
                <a class="a-up" href="#">数据录入</a>
                <ul class="side-dropdown-menu">
                    <li><a href="index.php?r=input/input/index&action=assess">评估录入</a></li>
                    <li><a href="index.php?r=input/input/index&action=identify">鉴定录入</a></li>
                    <li><a href="index.php?r=input/input/index&action=auction">拍卖录入</a></li>
                    <li><a href="index.php?r=input/input/index&action=project">工程造价</a></li>
                    <li><a href="index.php?r=input/input/index&action=bust">破产录入</a></li>
                </ul>
            </li>
           
            <!-- <li class="side-dropdown">
                <a class="a-up" href="#">查询考核</a>
                <ul class="side-dropdown-menu">
                    <li><a target="container" href="index.php?r=examine/complex">综合查询</a></li>
                    <li><a target="container" href="index.php?r=examine/assess">评估机构考核</a></li>
                    <li><a target="container" href="index.php?r=examine/identify">鉴定机构考核</a></li>
                    <li><a target="container" href="index.php?r=examine/auction">拍卖机构考核</a></li>
                    <li><a target="container" href="index.php?r=examine/translation">翻译机构考核</a></li>
                    <li><a target="container" href="index.php?r=examine/project-cost">破产机构考核</a></li>
                </ul>
            
            </li> -->
            <li class="side-dropdown">
                <a class="a-up" href="#">基础数据</a>
                <ul class="side-dropdown-menu">
                    <!--<li><a href="index.php?r=data/default/case">案由定义</a></li>-->
                    <li><a href="index.php?r=basic/default/definition&department=assess">评估机构定义</a></li>
                    <li><a href="index.php?r=basic/default/definition&department=identify">鉴定机构定义</a></li>
                    <li><a href="index.php?r=basic/default/definition&department=auction">拍卖机构定义</a></li>
                    <li><a href="index.php?r=basic/default/definition&department=project-cost">工程造价机构定义</a></li>
                    <li><a href="index.php?r=basic/default/definition&department=bust">管理人/清算组</a></li>
                    <li><a href="index.php?r=basic/default/document">打印模板设置</a></li>
                </ul>
            </li>

            <li class="side-dropdown">
                <a class="a-up" href="#">系统管理</a>
                <ul class="side-dropdown-menu">
                   <!-- <li><a href="index.php?r=sys/default/user">用户管理</a></li>
                    <li><a href="index.php?r=sys/default/premission">权限管理</a></li>-->
                    <li><a href="#" id="__pwpop">修改密码</a></li>
                    <!--<li><a href="index.php?r=sys/default/logs">系统日志</a></li>
                    <li><a href="index.php?r=sys/default/unit">单位信息</a></li>-->
                    <!-- <li class="side-dropdown">
                       <a href="#"><span>+</span> 数据管理</a>
                        <ul class="side-dropdown-menu">
                            <li><a target="container" href="index.php?r=sys/dbs/backup">数据备份</a></li>
                            <li><a target="container" href="index.php?r=sys/dbs/recovery">数据恢复</a></li>
                            <li><a target="container" href="index.php?r=sys/dbs/collection">数据采集</a></li>
                        </ul>
                    </li> -->
                </ul>
             </li>

             <!-- <li class="side-dropdown">
                <a class="a-up" href="#">报表中心</a>
                <ul class="side-dropdown-menu">
                    <li><a target="container" href="index.php?r=report-form/show">报表预览</a></li>
                    <li><a target="container" href="index.php?r=report-form/design">报表设计</a></li>
                    <li><a target="container" href="index.php?r=report-form/export-all">引出所有报表</a></li>
                    <li><a target="container" href="index.php?r=report-form/import-all">引入所有报表</a></li>
                </ul>
             </li> -->

            <!-- <li class="side-dropdown">
                <a class="a-up" href="#">帮助</a>
                <ul class="side-dropdown-menu">
                    <li><a target="container" href="index.php?r=help/password">修改密码</a></li>
                    <li><a target="container" href="index.php?r=help/lock-sys">锁定系统</a></li>
                    <li><a target="container" href="index.php?r=help/about">关于</a></li>
                </ul>
             </li> -->

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
