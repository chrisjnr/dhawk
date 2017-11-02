<?php
namespace backend\controllers;

use backend\models\Companies;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Projects;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout='admin_layout';
    public function adminLayout(){
        if (!Yii::$app->user->hasProperty('admin') ){
            $this->layout='admin_layout';

        }
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user_id=Yii::$app->user->identity->id;
        $projects_unfinished=Projects::find(['*'])->asArray()->andWhere(['companies_company_id' =>$user_id])->andWhere(['project_status'=>'unfinished'])->count();
        $projects_finished=Projects::find(['*'])->asArray()->andWhere(['companies_company_id' =>$user_id])->andWhere(['project_status'=>'finished'])->count();
        $joined_date=Companies::find(['*'])->where(['company_id'=>$user_id])->one();
        $joined_date=$joined_date['joined_date'];
        $companies=Companies::find(['*'])->asArray()->count();
        if(Yii::$app->user->can('admin')) {
            $project_count = Projects::find()->count();
            $projects_finished = Projects::find()->where(['project_status' => 'finished'])->count();
            $projects_unfinished = Projects::find()->where(['project_status' => 'unfinished'])->count();
        }


        //print_r($companies);
        //die('haha');
        //$logo=Companies::find(['logo'])->asArray()->where(['company_id'=>4])->all();
        //$logo=$logo[0]['logo'];
        //print_r($logo[0]['logo']);
        //die('ylup');
        return $this->render('index',['projects_finished'=>$projects_finished,'projects_unfinished'=>$projects_unfinished,'joined_date'=>$joined_date,'companies'=>$companies ]);

    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function getadmin()
    {
        if(Yii::$app->user->can('admin')){
            $project_count=Projects::find()->all()->count();
            $project_finished=Projects::find(['*'])->where(['project_status'=>'finished'])->count();
            print_r($project_count);
            die('ylup');


        }



        return $this->project_count;

    }
}
