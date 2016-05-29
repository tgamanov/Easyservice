<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Masters */

$this->title = $model->masters_id;
$this->params['breadcrumbs'][] = ['label' => 'Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masters-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'masters_id' => $model->masters_id, 'masters_services_id' => $model->masters_services_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'masters_id' => $model->masters_id, 'masters_services_id' => $model->masters_services_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'masters_id',
            'masters_first_name',
            'masters_last_name',
            'masters_email:email',
            'masters_photo',
            'masters_rate',
            'masters_created_date',
            'masters_status',
            'masters_services_id',
        ],
    ]) ?>

</div>
