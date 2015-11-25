<?php

namespace app\assets;

use yii\web\AssetBundle;


class ImportAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'etc/table/table.css',
    ];
    public $js = [
        'etc/table/table.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
