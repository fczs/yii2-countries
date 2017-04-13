<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Adds Rubik font from Google Fonts
 */
class FontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Rubik&amp;subset=cyrillic',
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}