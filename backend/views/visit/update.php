<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Visit */

$this->title = 'Update Visit: ' . ' ' . $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => 'Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->visit_id, 'url' => ['view', 'visit_id' => $model->visit_id, 'visit_user_id' => $model->visit_user_id, 'visit_master_id' => $model->visit_master_id, 'visit_service_id' => $model->visit_service_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
