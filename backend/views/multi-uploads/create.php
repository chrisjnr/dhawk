<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MultiUploads */

$this->title = 'Create Multi Uploads';
$this->params['breadcrumbs'][] = ['label' => 'Multi Uploads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="multi-uploads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form') ?>

</div>
