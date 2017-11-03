<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\ProjectsSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

       <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                
       
            
            'project_name:url',
            'state',
            'location',
            'start_date',
            // 'end_date',
            // 'project_description:ntext',
             'external_contractors',
            // 'date_of_award',
            // 'created_date',

            ['class' => 'yii\grid\ActionColumn'],
            
        ],
    ]);


     ?>
      <p>
        <?= Html::a('Create Projects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
