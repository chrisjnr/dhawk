<?=
/**
 * Created by PhpStorm.
 * User: Chrisjnr
 * Date: 10/25/2017
 * Time: 11:35 AM
 */



 \kato\DropZone::widget([
    'options' => [
        'url'=>'index.php?r=projects/upload',
        'maxFilesize' => '2',
    ],
    'clientEvents' => [
        'complete' => "function(file){console.log(file)}",
        'removedfile' => "function(file){alert(file.name + ' is removed')}"
    ],
]);
