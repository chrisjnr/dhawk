<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectUpdates */

$this->title = $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Project Updates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->project_name;
?>
<div class="project-updates-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'companies_company_id',
            //'project_id',
            'project_name',
            'update_image',
            'update_report:ntext',
            'uploaded',
        ],
    ]) ?>

</div>
