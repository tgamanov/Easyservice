<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Masters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'masters_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masters_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masters_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masters_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masters_rate')->textInput() ?>

    <?= $form->field($model, 'masters_created_date')->textInput() ?>

    <?= $form->field($model, 'masters_status')->dropDownList(['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE',], ['prompt' => '']) ?>

    <?= $form->field($model, 'masters_services_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
