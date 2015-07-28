<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $categories common\models\ArticleCategory[] */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => 1024]) ?>

    <?php echo $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(
            $categories,
            'id',
            'title'
        ), ['prompt'=>'']) ?>

    <?php
//    echo $form->field($model, 'body')->widget(
//        \yii\imperavi\Widget::className(),
//        [
//            'plugins' => ['fullscreen', 'fontcolor', 'video','imagemanager'],
//            'options' => [
//                'lang' => 'zh_cn',
//                'minHeight' => 400,
//                'maxHeight' => 400,
//                'buttonSource' => true,
//                'convertDivs' => false,
//                'removeEmptyTags' => false,
//                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi']),
//                'fileManagerJson' => Yii::$app->urlManager->createUrl(['/file-storage/list']),
//            ]
//        ]
//    )
    ?>
    
    <?php
    echo $form->field($model, 'body')->widget(
        \aiddroid\yii2tinymce\Widget::className(),
        [
            'options' => [
                'language' => 'zh_CN',
                'selector' => 'textarea',
                'height' => 500,
                'menubar' => false,
                'plugins' => [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste imagetools elfinder"
                ],
                'toolbar' => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table link image preview",
                //'external_filemanager_path' => "/file-manager-elfinder/manager?lang=zh_CN",
                //'filemanager_title' => "Responsive Filemanager",
                //'external_plugins' => [ "filemanager" => "/responsivefilemanager/plugin.min.js"]
            ]
        ]
    )
    ?>

    <?php echo $form->field($model, 'thumbnail')->widget(
        \trntv\filekit\widget\Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>

    <?php echo $form->field($model, 'attachments')->widget(
        \trntv\filekit\widget\Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 10
        ]);
    ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php echo $form->field($model, 'published_at')->widget(
        'trntv\yii\datetimepicker\DatetimepickerWidget',
        [
            'phpDatetimeFormat' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ',
            'clientOptions' => [
                'useCurrent' => false,
                'locale' => 'zh_cn',
            ]
        ]
    ) ?>

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
