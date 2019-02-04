<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/materialize.css',
        'css/themes/all-themes.min.css',
        'css/style.min.css',
        'css/custom.css',
        'plugins/node-waves/waves.css',
        'plugins/animate-css/animate.css',
        'plugins/bootstrap-select/css/bootstrap-select.css'
    ];
    public $js = [
      'plugins/jquery/jquery.min.js',
      'plugins/node-waves/waves.js',
      'js/admin.js',
      'plugins/bootstrap/js/bootstrap.js',
      'plugins/bootstrap-select/js/bootstrap-select.js',
      'plugins/jquery-slimscroll/jquery.slimscroll.js',
      'plugins/light-gallery/js/lightgallery-all.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
