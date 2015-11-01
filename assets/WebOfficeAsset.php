<?php
namespace app\assets;

use yii\web\AssetBundle;

class WebOfficeAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'etc/main.js',
        'etc/webOffice/LoadWebOffice.js',
    ];
    
}