<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'etc/nav-bar/nav.css',
        'etc/side-bar/side-bar.css',
        'css/style.css',
        'etc/pop/pop.css',
    ];
    public $js = [
        'js/main.js',
        'etc/nav-bar/nav.js',
        'etc/side-bar/side-bar.js',
        'etc/pop/pop.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
