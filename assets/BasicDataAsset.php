<?php
namespace app\assets;

use yii\web\AssetBundle;

class BasicDataAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'etc/pop/pop.css',
    ];
    public $js = [
        'js/basic-data.js',
        'etc/pop/pop.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}