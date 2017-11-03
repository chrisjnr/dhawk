<?php
/**
 * Created by PhpStorm.
 * User: Chrisjnr
 * Date: 10/25/2017
 * Time: 11:35 AM
 */



echo \kato\DropZone::widget([
    'options' => [
        'maxFilesize' => '2',
    ],
    'clientEvents' => [
        'complete' => "function(file){console.log(file)}",
        'removedfile' => "function(file){alert(file.name + ' is removed')}"
    ],
]);