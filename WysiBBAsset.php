<?php
namespace coderlex\wysibb;

use yii\web\AssetBundle;

class WysiBBAsset extends AssetBundle
{
	public $sourcePath = '@bower/jqjquery-wysibb';
	public $css = ['theme/default/wbbtheme.css'];
	public $js = ['jquery.wysibb.min.js'];
	public $depends = ['yii\web\JqueryAsset'];
}