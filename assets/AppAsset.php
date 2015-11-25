<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle{

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
    ];

}