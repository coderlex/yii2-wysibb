# yii2-wysibb
Implements WysiBB visual editor http://www.wysibb.com/ to Yii2 applications.
More about WysiBB read at http://www.wysibb.com/

## Install via composer

Run in your console:

```bash
php composer.phar global require "fxp/composer-asset-plugin:1.0.0"
php composer.phar require "coderlex/yii2-wysibb" "*"
```

## Basic usage

```php
$form = \yii\widgets\ActiveForm::begin();
print $form->field($model, 'content')->widget(\coderlex\wysibb\WysiBB::className(), [
...
]);
\yii\widgets\ActiveForm::end();
```
