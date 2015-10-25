<?php
namespace app\assets;

use yii\web\AssetBundle;

class UserAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/user.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}