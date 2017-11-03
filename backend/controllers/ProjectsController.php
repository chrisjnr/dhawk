<?php

namespace backend\controllers;

use backend\models\NgdeltaStates;
use Yii;
use backend\models\Projects;
use backend\models\ProjectsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use backend\models\ProjectUpdates;
use\yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;
use backend\models\NgdeltaLga;
/**
 * ProjectsController implements the CRUD actions for Projects model.
 */
class ProjectsController extends Controller
{
    /**
     * @inheritdoc
     */

    public $layout='admin_layout';


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
     * Lists all Projects models.
     * @return mixed
     */



    public function actionIndex()
    {

        if (!Yii::$app->user->can('blacklist')) {
            $user_id = Yii::$app->user->identity->id;
            //$rows=Projects::find(['*'])->where(['companies_company_id'=>$user_id])->asArray()->all();


            $searchModel = new ProjectsSearch();
            $dataProvider = new ActiveDataProvider(['query' => Projects::find(['*'])->where(['companies_company_id' => $user_id]),]);
            if (Yii::$app->user->can('admin')){
                $dataProvider = new ActiveDataProvider(['query' => Projects::find()]);
            }


            return $this->render('index', [

                'dataProvider' => $dataProvider, 'searchModel' => $searchModel,
            ]);
        }else{
            throw new ForbiddenHttpException("Your Company Status has been Revoked, Please Contact the Administrator for Details", 1);
        }
    }

    /**
     * Displays a single Projects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        // we grab the id and pass it through to the view

        $dataProvider = new ActiveDataProvider(['query'=>ProjectUpdates::find(['*'])->where(['project_id'=>$id]),]);
        

        return $this->render('view', [
            'model' => $this->findModel($id),'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->hasProperty('blacklist')) {
            $model = new Projects();
            $user_id = Yii::$app->user->identity->id;
            if (!empty($user_id)) {
                if ($model->load(Yii::$app->request->post())) {
                    $model->created_date = date('Y-m-d');
                    $model->companies_company_id = $user_id;
                    $State=NgdeltaStates::find(['state_name'])->where(['state_id'=>$model->state])->one();
                    $lga=NgdeltaLga::find(['local_name'])->where(['local_id'=>$model->location])->one();
                    $model->state=$State['state_name'];
                    $model->location=$lga['local_name'];
                    //print_r($model->location);
                    //print_r($model->state);
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
        }else{
                throw new ForbiddenHttpException("Your Company Status has been Revoked", 1);
    }
    }

    /**
     * Updates an existing Projects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //$model = $this->findModel($id);
        //$model = $this::find($id)->asArray()->one();
        $user_id=Yii::$app->user->identity->id;
        $project_id= $_GET['id'];
        $model=new ProjectUpdates;
        $project_name=Projects::find(['project_name'])->asArray()->where(['id'=>$project_id])->all();
        $project_name=$project_name[0]['project_name'];
        $timestamp=date("YmdGis"); 
            //it will generate a timestamp,making it easier to avoid duplicate filenames
        $imageName=$project_name.$timestamp;
      


        if ($model->load(Yii::$app->request->post())) {
            
            $model->update_image=UploadedFile::getInstance($model,'update_image');
            $model->update_image->saveAs('uploads/'.$imageName.'.'.$model->update_image->extension);
            $model->update_image='uploads/'.$imageName.'.'.$model->update_image->extension;
            $model->companies_company_id=$user_id;
            $model->project_id=$project_id;
            $model->project_name=$project_name;
            $model->uploaded=date('Y-m-d');
            $model->save();
            return $this->redirect(['/project-updates/view', 'id' => $model->id]);
        } else {
            return $this->render('/project-updates/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Projects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('admin')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else {
            throw new ForbiddenHttpException("You lack the required Privliege to Perform this action", 1);
        
        }

    }

    /**
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }




    public function actionUpload()
    {
        $fileName = 'file';
        $uploadPath = 'uploads';

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data


            if ($file->saveAs($uploadPath . '/' . $file->name)) {
                //Now save file data to database
                echo \yii\helpers\Json::encode($file);

            }

        }
        else{
            return $this->render('upload');
        }

        return false;

    }

    public function actionLists($id){
        $countStates=NgdeltaLga::find()
            ->where(['state_id'=>$id])
            ->count();
        $states=NgdeltaLga::find()
            ->where(['state_id'=>$id])
            ->all();

        if($countStates>0){
            foreach ($states as $state) {
                echo "<option value='".$state->local_id."'>".$state->local_name."</option> ";
            }
        }else{
            echo '<option>...</option>';
        }
    }







}
