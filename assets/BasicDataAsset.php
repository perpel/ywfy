<?php
namespace app\assets;

use yii\web\AssetBundle;

class BasicDataAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/basic-data.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}