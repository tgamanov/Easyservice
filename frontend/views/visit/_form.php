<?php

use frontend\models\Masters;
use frontend\models\Services;
use kartik\widgets\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Visit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-form">
    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>
    <?= $form->field($model, 'visit_service_id')->dropDownList(//dropdown list with services
        ArrayHelper::map(Services::find()->all(), 'services_id', 'services_name'),
        [
            'prompt' => 'Select name of the service',
            'onchange' => '
            $.post( "/masters/lists?id=' . '"+$(this).val(),function( data ){
                $( "select#visit-visit_master_id" ).html(data);
            });'
        ]
    );
    ?>

    <?= $form->field($model, 'visit_master_id')->dropDownList(//dropdown list with masters which depends on selected service
        ArrayHelper::map(Masters::find()->all(), 'masters_id', 'masters_last_name'),
        [
            'prompt' => 'Select last name of the master',
        ]
    ) ?>

    <?= $form->field($model, 'visit_date_time')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
