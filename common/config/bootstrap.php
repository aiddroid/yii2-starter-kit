<?php
// Path aliases
//Yii::setAlias('@app', realpath(__DIR__.'/../../'));
Yii::setAlias('@base', realpath(__DIR__.'/../../'));
Yii::setAlias('@common', realpath(__DIR__.'/../../common'));
Yii::setAlias('@frontend', realpath(__DIR__.'/../../frontend'));
Yii::setAlias('@backend', realpath(__DIR__.'/../../backend'));
Yii::setAlias('@console', realpath(__DIR__.'/../../console'));
Yii::setAlias('@storage', realpath(__DIR__.'/../../storage'));
Yii::setAlias('@tests', realpath(__DIR__.'/../../tests'));

// Url Aliases
Yii::setAlias('@frontendUrl', getenv('FRONTEND_URL'));
Yii::setAlias('@backendUrl', getenv('BACKEND_URL'));
Yii::setAlias('@storageUrl', getenv('STORAGE_URL'));


Yii::setAlias('@aiddroid', realpath(dirname(dirname(__DIR__)).'/vendor/aiddroid'));
//Yii::$classMap['aiddroid\yii2tinymce\Widget'] = dirname(dirname(__DIR__)).'/vendor/aiddroid/yii2-tinymce/Widget.php';
//Yii::$classMap['aiddroid\yii2tinymce\TinyMceAsset'] = dirname(dirname(__DIR__)).'/vendor/aiddroid/yii2-tinymce/TinyMceAsset.php';
//Yii::$classMap['aiddroid\yii2tinymce\TinyMcePluginAsset'] = dirname(dirname(__DIR__)).'/vendor/aiddroid/yii2-tinymce/TinyMcePluginAsset.php';