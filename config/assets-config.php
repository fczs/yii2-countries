<?php
/**
 * Configuration file for the "yii asset" console command.
 */

Yii::setAlias('@webroot', str_replace('\\', '/',  __DIR__) . '/../web');
Yii::setAlias('@web', '/../');

return [
    'jsCompressor' => 'gulp compress-js --gulpfile gulpfile.js --src {from} --dist {to}',
    'cssCompressor' => 'gulp compress-css --gulpfile gulpfile.js --src {from} --dist {to}',
    'bundles' => [
        'app\assets\AppAsset',
    ],
    'targets' => [
        'all' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot',
            'baseUrl' => '@web',
            'js' => 'js/app.min.js',
            'css' => 'css/style.min.css',
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@webroot/assets',
        'baseUrl' => '@web/assets',
        'linkAssets' => true
    ],
];