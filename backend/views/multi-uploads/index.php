<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MultiUploadsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Multi Uploads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="multi-uploads-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Multi Uploads', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'project_id',
            'upload_path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
