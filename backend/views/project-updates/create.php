<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ProjectUpdates */

$this->title = 'Create Project Updates';
$this->params['breadcrumbs'][] = ['label' => 'Project Updates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-updates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
