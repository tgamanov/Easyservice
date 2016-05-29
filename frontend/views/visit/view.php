<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Visit */

$this->title = $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => 'Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'visit_id' => $model->visit_id, 'visit_user_id' => $model->visit_user_id, 'visit_master_id' => $model->visit_master_id, 'visit_service_id' => $model->visit_service_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'visit_id' => $model->visit_id, 'visit_user_id' => $model->visit_user_id, 'visit_master_id' => $model->visit_master_id, 'visit_service_id' => $model->visit_service_id], [
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
            'visit_id',
            'visit_date_time',
            'visit_user_id',
            'visit_master_id',
            'visit_service_id',
        ],
    ]) ?>

</div>
