<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BasicDataAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'js/etc/pop.css',
        'js/etc/table.css',
    ];
    public $js = [
        'js/etc/pop.js',
        'js/nav.js',
        //'js/etc/jquery.dataTables.js',
        'js/public.js',
        'js/basic-data.js',
        'js/etc/table.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        
    ];

}