<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Visit', ['value' => Url::to('create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <?php
    Modal::begin(
        ['header' => '<h4>Visits</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',]
    );
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'visit_date_time',
                'value' => 'visit_date_time',
                'filter' => DateTimePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'visit_date_time',
                    'options' => ['placeholder' => 'Enter event time ...'],
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ])

            ],
            ['attribute' => 'visit_service_id',
                'value' => 'visitService.services_name'],
            [
                'attribute' => 'visit_master_id',
                'value' => 'visitMaster.masters_last_name'
            ],
            [
                'attribute' => 'visit_user_id',
                'value' => 'visitUser.last_name'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>