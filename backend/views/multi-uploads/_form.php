<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MultiUploads */
/* @var $form yii\widgets\ActiveForm */
?>


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