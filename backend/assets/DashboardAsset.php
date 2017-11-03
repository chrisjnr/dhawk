<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'plugins/iCheck/flat/blue.css',
        'dist/css/skins/_all-skins.min.css',
        'dist/css/skins/skin-black.min.css',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    ];
    public $js = [
        'dist/js/main.js',
        //'bower_components/jquery/dist/jquery.min.js',
        'bower_components/jquery-ui/jquery-ui.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/raphael/raphael.min.js',
        'dist/js/adminlte.min.js',
        'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'bower_components/fastclick/lib/fastclick.js',
        //'dist/js/pages/dashboard.js',
        //'dist/js/pages/dashboard2.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}


