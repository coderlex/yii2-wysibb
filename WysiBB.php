<?php
namespace coderlex\wysibb;

use Yii;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * WysiBB bbcode WYSIWYG editor widget.
 *
 * Example of usage:
 * @code
 * <?= WysiBB::widget(['options'=>[
 *	'id' => 'pm-modal-field-body',
 *	'name' => 'Message[body]',
 *	'style'=>'width:100%;height:200px;']]) ?>
 * @endcode
 */
class WysiBB extends InputWidget
{
	/**
	 * WysiBB options.
	 */
	public $clientOptions = [];

	/**
	 * Initialized the widget.
	 */
	public function init()
	{
		parent::init();
		$this->clientOptions += [
			'debug' => false,
			'lang' => Yii::$app->language,
			'resize_maxheight' => 400,
			'buttons' => 'bold,italic,underline,|,link,|,code,quote',
		];
	}

	/**
	 * Renders the widget.
	 */
	public function run()
	{
		$view = $this->getView();
		WysiBBAsset::register($view);

		if ($this->hasModel())
			echo Html::activeTextarea($this->model, $this->attribute, $this->options);
		else
			echo Html::textarea($this->name, $this->value, $this->options);
		
		$clientOptions = [];
		foreach ($this->clientOptions as $key => $value) {
			$clientOptions[] = $key.': '.json_encode($value);
		}
		$js = 'wbbdebug=false;';
		$js .= 'jQuery("#'.$this->options['id'].'").wysibb({'.implode(', ', $clientOptions).'});';
		$view->registerJs($js);
	}
}