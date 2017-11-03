<?php
/**
 * Created by PhpStorm.
 * User: Chrisjnr
 * Date: 10/30/2017
 * Time: 2:11 PM
 */
use slavkovrn\imagegalary\ImageGalaryWidget;
?>

<?= ImageGalaryWidget::widget([
    'id' =>'imagegalary',       // id of plugin should be unique at page
    'class' =>'imagegalary',    // class of div to define style
    'css' => 'border:white;',   // css commands of class (for example - border-radius:5px;)
    'image_width' => 320,       // height of image visible in pixels
    'image_height' => 240,      // width of image visible in pixels
    'thumb_width' => 80,        // height of thumb images in pixels
    'thumb_height' => 50,       // width of thumb images in pixels
    'items' => 3,               // number of thumb items
    'images' => [               // images of galary
        [
            'src' => 'https://static.pexels.com/photos/20974/pexels-photo.jpg',
            'title' => 'Image visible in widget',
        ],
        [
            'src' => 'http://images.all-free-download.com/images/graphiclarge/beautiful_nature_landscape_05_hd_picture_166223.jpg',
            'title' => 'image 2',
        ],
        [
            'src' => 'http://images.all-free-download.com/images/graphiclarge/beautiful_nature_landscape_03_hd_picture_166205.jpg',
            'title' => 'image 3',
        ],
        [
            'src' => 'https://static.pexels.com/photos/207962/pexels-photo-207962.jpeg',
            'title' => 'image 4',
        ],
    ]
]) ?>

//lets add another role to the companies table, we shall call it role(e.g contractor)
