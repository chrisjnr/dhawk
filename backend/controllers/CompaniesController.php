<?php

namespace backend\controllers;

use Yii;
use backend\models\Companies;
use backend\models\CompaniesSearch;
use backend\models\AuthAssignment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * CompaniesController implements the CRUD actions for Companies model.
 */
class CompaniesController extends Controller
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
     * Lists all Companies models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->hasProperty('admin')) {
            $searchModel = new CompaniesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else {
            //print_r(Yii::$app->user);
            //die('see');
            throw new ForbiddenHttpException("You lack the required Privlieges to view this Page,", 1);
        }


    }

    /**
     * Displays a single Companies model.
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
     * Creates a new Companies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {


        if (Yii::$app->user->hasProperty('admin')){

            if (!empty(Yii::$app->user->identity->id)) {
                $model = new Companies();
                $user_id=Yii::$app->user->identity->id;
                $company_name=Yii::$app->user->identity->company_name;
                if ($model->load(Yii::$app->request->post())) {
                    $model->created_by=$company_name;
                    $model->joined_date=date('Y-m-d');
                    $model->company_id=$user_id;
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

            }
        }

        else {
            //print_r(Yii::$app->user);
            //die('see');
            throw new ForbiddenHttpException("You lack the required Privlieges to view this Page,", 1);
        }




        
    }

    /**
     * Updates an existing Companies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $auth= new AuthAssignment();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->status=='inactive'){
                $auth->item_name='blacklist';
                $auth->user_id=$model->id;
                $auth->save();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Companies model.
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
     * Finds the Companies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Companies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Companies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
