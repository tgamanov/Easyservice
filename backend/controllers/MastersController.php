<?php

namespace backend\controllers;

use backend\models\Masters;
use backend\models\MastersSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * MastersController implements the CRUD actions for Masters model.
 */
class MastersController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Masters models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MastersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Masters model.
     * @param integer $masters_id
     * @param integer $masters_services_id
     * @return mixed
     */
    public function actionView($masters_id, $masters_services_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($masters_id, $masters_services_id),
        ]);
    }

    /**
     * Finds the Masters model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $masters_id
     * @param integer $masters_services_id
     * @return Masters the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($masters_id, $masters_services_id)
    {
        if (($model = Masters::findOne(['masters_id' => $masters_id, 'masters_services_id' => $masters_services_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Masters model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
//        if(Yii::$app->user->can('create-masters'))
//        {
        $model = new Masters();

        if ($model->load(Yii::$app->request->post())) {

            if ($_FILES['Masters']['size']['file'] > 0) {
                //get the instance of uploaded file
                $imageName = $model->masters_last_name;
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('uploads/' . $imageName . '.' . $model->file->extension);

                //save the path in the db
                $model->masters_photo = 'uploads/' . $imageName . '.' . $model->file->extension;
            } else {
                $model->masters_photo = 'noimage.jpg';
            }
            $model->masters_created_date = date('Y-m-d h:m:s');
            $model->save();
            return $this->redirect(['view', 'masters_id' => $model->masters_id, 'masters_services_id' => $model->masters_services_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

//        }
//        else
//        {
//            throw new ForbiddenHttpException;
//        }

    }

    /**
     * Updates an existing Masters model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $masters_id
     * @param integer $masters_services_id
     * @return mixed
     */
    public function actionUpdate($masters_id, $masters_services_id)
    {
        $model = $this->findModel($masters_id, $masters_services_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'masters_id' => $model->masters_id, 'masters_services_id' => $model->masters_services_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Masters model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $masters_id
     * @param integer $masters_services_id
     * @return mixed
     */
    public function actionDelete($masters_id, $masters_services_id)
    {
        $this->findModel($masters_id, $masters_services_id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLists($id)
    {
        $countMasters = Masters::find()
            ->where(['masters_services_id' => $id])
            ->count();

        $masters = Masters::find()
            ->where(['masters_services_id' => $id])
            ->all();
        if ($countMasters > 0) {
            foreach ($masters as $master) {
                echo "<option value='" . $master->masters_id . "'>" . $master->masters_last_name . "</option>";
            }
        } else {
            echo "<option> - </option>";
        }
        echo $id;

    }
}
