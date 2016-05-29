<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Masters */

$this->title = 'Update Masters: ' . ' ' . $model->masters_id;
$this->params['breadcrumbs'][] = ['label' => 'Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->masters_id, 'url' => ['view', 'masters_id' => $model->masters_id, 'masters_services_id' => $model->masters_services_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
