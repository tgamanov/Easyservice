<?php

use yii\grid\GridView;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\MastersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masters-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Masters', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model) {
            if ($model->masters_status == 'ACTIVE') {
                return ['class' => 'success'];
            } elseif ($model->masters_status == 'INACTIVE') {
                return ['class' => 'danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'masters_services_id',
                'value' => 'mastersServices.services_name',
            ],
            'masters_first_name',
            'masters_last_name',
//            'masters_email:email',

            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Photography',
                'value' => function ($data) {

                    return Html::img(Yii::$app->params['back'] . '/' . $data['masters_photo'],
                        ['width' => '150px']);
                },
            ],

//            'masters_photo',
            'masters_rate',
            // 'masters_created_date',
            'masters_status',
            // 'masters_services_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
