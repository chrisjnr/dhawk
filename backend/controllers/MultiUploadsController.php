<?php

namespace backend\controllers;

use Yii;
use backend\models\MultiUploads;
use backend\models\MultiUploadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MultiUploadsController implements the CRUD actions for MultiUploads model.
 */
class MultiUploadsController extends Controller
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
     * Lists all MultiUploads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MultiUploadsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MultiUploads model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionUpload(){

    }

    /**
     * Creates a new MultiUploads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $fileName = 'file';
        $uploadPath = 'uploads';
        $model = new MultiUploads();

        if (isset($_FILES[$fileName])) {


            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data


            if ($file->saveAs($uploadPath . '/' . $file->name)) {
                //Now save file data to database
                $model->project_id='1';
                //$model->upload_path=$uploadPath;
                $model->upload_path=$uploadPath.'/'.$file->name;
                $model->save();
                echo \yii\helpers\Json::encode($file);

            }

        }

        //return false;
        else {
            return $this->render('create');
        }

    }

    /**
     * Updates an existing MultiUploads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MultiUploads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MultiUploads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MultiUploads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MultiUploads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
