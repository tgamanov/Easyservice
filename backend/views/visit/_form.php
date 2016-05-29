<?php

use backend\models\Masters;
use backend\models\Services;
use backend\models\User;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Visit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>

    <?= $form->field($model, 'visit_user_id')->widget(Select2::classname(), [//select user
        'data' => ArrayHelper::map(User::find()->all(), 'id', 'last_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select user last name ...'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>

    <?= $form->field($model, 'visit_service_id')->dropDownList(//dropdown list with services
        ArrayHelper::map(Services::find()->all(), 'services_id', 'services_name'),
        [
            'prompt' => 'Select name of the service',
            'onchange' => '
            $.post( "/admin/masters/lists?id=' . '"+$(this).val(),function( data ){
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