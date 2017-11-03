<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Projects */

$this->title = $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->project_name;
?>
<div class="projects-view">

    <h1><?= Html::encode($model->project_name) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'project_name',
            'state',
            'location',
            'start_date',
            'end_date',
            'project_description:ntext',
            'external_contractors',
            'date_of_award',
            'created_date',
        ],
    ]) ?>

    <p><h2>Recent Updates For the Project </h2></p>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [


            //'id',
            //'companies_company_id',
            //'project_id',
            'project_name',
            //'file:image',
            'update_report:ntext',
            'uploaded',
            ['class' => 'yii\grid\ActionColumn',
                'header' => 'View Update',
                'headerOptions' => ['style'=>'color:#337ab7'],
                'template' => '{view}',
                'buttons' => [
                    'view'=>function($url,$model){
                        return Html::a ('<span class="glyphicon glyphicon-eye-open"></span>',$url,['title'=>Yii::t('app','view'),] );

                    }
                ],
                'urlCreator' => function($action,$model,$key,$index){
                    if ($action==='view' ){
                        $url='index.php?r=project-updates/view&id='.$model->id;
                        return $url;
                    }
                }

            ],


        ],
    ]); ?>

</div>
