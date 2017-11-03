<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectUpdates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-updates-form">

   <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model,'update_image')->fileInput();?>
    <?=
    \kato\DropZone::widget([
        'options' => [
            'url'=>'index.php?r=multi-uploads/create',
            'maxFilesize' => '2',
        ],
        'clientEvents' => [
            'complete' => "function(file){console.log(file)}",
            'removedfile' => "function(file){alert(file.name + ' is removed')}"
        ],
    ]);?>

    <?= $form->field($model, 'update_report')->textarea(['rows' => 6]) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
