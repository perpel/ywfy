<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class EditAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
         'css/style.css',
         'etc/pop/pop.css',
    ];
    public $js = [
        'etc/My97DatePicker/WdatePicker.js',
        'js/edit.js',
        'etc/pop/pop.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\validators\ValidationAsset',
        'yii\widgets\ActiveFormAsset',
    ];
}      