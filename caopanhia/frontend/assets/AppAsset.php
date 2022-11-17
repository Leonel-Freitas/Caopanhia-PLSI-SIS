<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/Página-Inicial.css',
        'css/style.css',
        'css/nicepage.css',

    ];
    public $js = [
        'jQuery/jquery.js',
        'jQuery/main.js',
        'jQuery/nicepage.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',

    ];
}
