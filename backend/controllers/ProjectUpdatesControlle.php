<?php

namespace backend\controllers;

use Yii;
use backend\models\ProjectUpdates;
use backend\models\ProjectUpdatesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use\yii\web\UploadedFile;

/**
 * ProjectUpdatesController implements the CRUD actions for ProjectUpdates model.
 */
class ProjectUpdatesController extends Controller
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
     * Lists all ProjectUpdates models.
     * @return mixed
     */
    public function actionIndex()
    {

        $user_id=Yii::$app->user->identity->id;
        
        //$searchModel = new ProjectUpdatesSearch();
         $dataProvider = new ActiveDataProvider(['query'=>ProjectUpdates::find(['*'])->where(['companies_company_id'=>$user_id]),]);

        return $this->render('index', [
            
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectUpdates model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProjectUpdates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectUpdates();

        if ($model->load(Yii::$app->request->post())) {
            $imageName='project_name';
            $model->updated_image=UploadedFile::getInstance($model,'updated_image');


            $model->updated_image->saveAs('uploads/'.$imageName.'.'.$model->updated_image->extension);
           
            $model->updated_image='uploads/'.$imageName.'.'.$model->updated_image->extension;
            echo( $model->id);
            die('yooo');
            $model->save();
          
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProjectUpdates model.
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
     * Deletes an existing ProjectUpdates model.
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
     * Finds the ProjectUpdates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectUpdates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectUpdates::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
