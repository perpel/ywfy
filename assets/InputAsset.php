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
class InputAsset extends AssetBundle
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
        'js/etc/table.js',
        'js/input.js',
        'js/etc/My97DatePicker/WdatePicker.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\validators\ValidationAsset',
        'yii\widgets\ActiveFormAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];

}