<?php

namespace frontend\controllers;

use frontend\models\Visit;
use frontend\models\VisitSearch;
use yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

/**
 * VisitController implements the CRUD actions for Visit model.
 */
class VisitController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Visit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Visit model.
     * @param integer $visit_id
     * @param integer $visit_user_id
     * @param integer $visit_master_id
     * @param integer $visit_service_id
     * @return mixed
     */
    public function actionView($visit_id, $visit_user_id, $visit_master_id, $visit_service_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($visit_id, $visit_user_id, $visit_master_id, $visit_service_id),
        ]);
    }

    /**
     * Finds the Visit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $visit_id
     * @param integer $visit_user_id
     * @param integer $visit_master_id
     * @param integer $visit_service_id
     * @return Visit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($visit_id, $visit_user_id, $visit_master_id, $visit_service_id)
    {
        if (($model = Visit::findOne(['visit_id' => $visit_id, 'visit_user_id' => $visit_user_id, 'visit_master_id' => $visit_master_id, 'visit_service_id' => $visit_service_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Visit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Visit();

        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->visit_user_id = Yii::$app->user->getId();
            $model->save();
            return $this->redirect(['index', 'visit_id' => $model->visit_id, 'visit_master_id' => $model->visit_master_id, 'visit_service_id' => $model->visit_service_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Visit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $visit_id
     * @param integer $visit_user_id
     * @param integer $visit_master_id
     * @param integer $visit_service_id
     * @return mixed
     */
    public function actionUpdate($visit_id, $visit_user_id, $visit_master_id, $visit_service_id)
    {
        $model = $this->findModel($visit_id, $visit_user_id, $visit_master_id, $visit_service_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'visit_id' => $model->visit_id, 'visit_user_id' => $model->visit_user_id, 'visit_master_id' => $model->visit_master_id, 'visit_service_id' => $model->visit_service_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Visit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $visit_id
     * @param integer $visit_user_id
     * @param integer $visit_master_id
     * @param integer $visit_service_id
     * @return mixed
     */
    public function actionDelete($visit_id, $visit_user_id, $visit_master_id, $visit_service_id)
    {
        $this->findModel($visit_id, $visit_user_id, $visit_master_id, $visit_service_id)->delete();

        return $this->redirect(['index']);
    }
}
