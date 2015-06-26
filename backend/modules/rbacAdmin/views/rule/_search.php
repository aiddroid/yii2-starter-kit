<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\rbacAdmin\models\search\RuleSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'username') ?>

    <?php echo $form->field($model, 'auth_key') ?>

    <?php echo $form->field($model, 'password_hash') ?>

    <?php echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'oauth_client') ?>

    <?php // echo $form->field($model, 'oauth_client_user_id') ?>

    <?php // echo $form->field($model, 'nickname') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'uploaded_size') ?>

    <?php // echo $form->field($model, 'uploaded_limit_size') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'logged_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
