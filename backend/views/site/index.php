<?php

/* @var $this yii\web\View */


$this->title = 'Project Delta Hawk';
$this->params['joined_date']=$joined_date;
?>
<head>
    <style>
        .carousel-inner>.item>img,.carousel-inner>.item>a>img{
            display: block;
            height:auto;
            max-width: 100%;
            line-height: 1;
            width: 100%;
        }

        .carousel .item{
            height:400px;
        }
        .carousel-caption{
            color: black;
        }
        .item img{
            position: absolute;
            top:0;
            left:0;
            min-height: 350px;
        }
    </style>
</head>
<div class="site-index">

    <!--<h1 class="text-center bg-danger>Project Delta Hawk</h1>-->
    <div  class="jumbotron">

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="img/slider/banner.jpg" alt="...">
                    <div class="carousel-caption">
                        <h3>Ensuring Transparency.......</h3>
                        <p><a class="btn btn-lg btn-success" href="index.php?r=projects">Add A New Project </a></p>
                    </div>
                </div>
                <div class="item">
                    <img src="img/slider/banner3.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                ...
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>


    </div>

    <div class="body-content">
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $projects_finished?> <sup style="font-size: 40px"></sup></h3>

                        <p><?php
                            if($projects_finished<2){
                                echo " Finished Project";
                            }else{
                                echo "Finished Projects";
                            }
                            ?> </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $projects_unfinished?></h3>

                        <p><?php if ($projects_unfinished<2) {
                                echo "Current Project";}
                            else{
                                echo "Current Projects";
                            }
                            ?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <?php
            if (Yii::$app->user->can('admin')){
                 echo
            '<div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>'.$companies.'</h3>

                        <p>Registered Companies</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>';

            }




            ?>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Current Projects</h2>

                <div class="thumbnail">
                    <img src="uploads/pic.png " alt="...">
                    <div class="caption">
                        <h3>Julius Berger</h3>
                        <p>
                            <a class="btn btn-default" href="http://www.yiiframework.com/doc/">Construction Of Obudu Road &raquo;</a></p>


                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h2>News</h2>
                <div class="thumbnail">
                    <img src="uploads/images.jpg " alt="...">
                    <div class="caption">
                        <h3>Sematech</h3>
                        <p>
                            <a class="btn btn-default" href="http://www.yiiframework.com/doc/">Construction Bakassi Primary School&raquo;</a></p>


                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h2>Finished Projects</h2>

                <div class="thumbnail">
                    <img src="uploads/road_construct.jpg " alt="...">
                    <div class="caption">
                        <a class="btn text-center btn-default" href="http://www.yiiframework.com/doc/">Construction Bakassi Primary School&raquo;</a>

                    </div>
            </div>
        </div>


    </div>
</div>
