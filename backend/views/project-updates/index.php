<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectUpdatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Updates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-updates-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Updates', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'companies_company_id',
            //'project_id',
            'project_name',
            'update_image:url',
            'update_report:ntext',
            // 'uploaded',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
