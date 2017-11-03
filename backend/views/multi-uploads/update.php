<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MultiUploads */

$this->title = 'Update Multi Uploads: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Multi Uploads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="multi-uploads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
