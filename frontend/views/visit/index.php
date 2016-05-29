<?php
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\VisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--    <p>-->
    <!--        --><? //= Html::a('Create Visit', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->
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
//        'filterModel' => $searchModel, //filter for each field of the table
        'columns' => [
            'visit_date_time',
//            ['class' => 'yii\grid\SerialColumn'],//number of the string is no need
            ['attribute' => 'service name',
                'value' => 'visitService.services_name'],//shows service name instead of service id
            ['attribute' => 'Last name of the master',
                'value' => 'visitMaster.masters_last_name'],
//            'visit_id',

//            'visit_user_id',//no need. showing only current user visits (visitsearch.php corrected)
//            'visit_master_id',
//            'visit_service_id',

//            ['class' => 'yii\grid\ActionColumn'],//buttons correct or delete the visit is no need
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
