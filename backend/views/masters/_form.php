<?php

use backend\models\Services;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Masters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masters-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'masters_services_id')->dropDownList(
        ArrayHelper::map(Services::find()->all(), 'services_id', 'services_name'),
        ['prompt' => 'Select service']
    ) ?>


    <?= $form->field($model, 'masters_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masters_last_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'masters_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput(); ?>

    <?= $form->field($model, 'masters_rate')->textInput() ?>

    <?= $form->field($model, 'masters_status')->dropDownList(['active' => 'Active', 'inactive' => 'Inactive',], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
