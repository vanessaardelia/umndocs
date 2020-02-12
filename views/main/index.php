<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Document Management System UMN';
?>
<?php

/* @var $this yii\web\View */
 $this->title = 'Dashboard';
?>
<style>
    .card:hover {
         transition: all 0.2s ease-out;
         box-shadow: 4px 3px 0px rgba(40, 38, 38, 0.2);
         top: -10px;
         border: 0.3px solid #cccccc;
     }

    .redBackground { background-color:indianred; }
    .blueBackground { background-color:cornflowerblue;}
    .greenBackground { background-color:green; }

    /* equal card height */
    .row-equal > div[class*='col-'] {
        display: flex;
        flex: 1 0 auto;
    }

    .row-equal .card {
        width: 100%;
    }

    /* ensure equal card height inside carousel */
    .carousel-inner>.row-equal.active,
    .carousel-inner>.row-equal.next,
    .carousel-inner>.row-equal.prev {
        display: flex;
    }

    /* prevent flicker during transition */
    .carousel-inner>.row-equal.active.left,
    .carousel-inner>.row-equal.active.right {
        opacity: 0.5;
        display: flex;
    }


    /* control image height */
    .card-img-top-250 {
        max-height: 250px;
        overflow:hidden;
    }
</style>
<section class="carousel slide" data-ride="carousel" id="postsCarousel">
<div class="site-index">
    <div class="body-content">
    	<div class="row">
            <div class="col-xs-12 text-md-right lead">
                <a class="btn btn-outline-secondary prev" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
                <a class="btn btn-outline-secondary next" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <?php
            $x = 0;
            foreach($documents as $document):
                if($x%3 == 0)
                    $class = 'indianred';
                else if($x%3 == 1 )
                    $class = 'palegreen';
                else
                    $class = 'skyblue';
                ?>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header card-chart" style="background-color: <?= $class ?>">
						<div class="ct-chart" id="dailySalesChart"></div>
					</div>
					<div class="card-content">
						<h4 class="title text-bold"><?= $document['NamaDoc'] ?>
                        </h4>
					</div>
					<div class="card-footer">
						<div class="stats">
                            <p class="category"><span class="text-success"><i class="fa fa-pencil"></i> Created By: </span><?= $document['createdBy'] ?></p>
						</div>
                    </div>
				</div>
			</div>
            <?php $x++; endforeach; ?>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
		</div>
    </div>
</div>
</section>

<!-- <div class="site-index">
    <div class="body-content container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <?= Html::a('Document', ['main/document']) ?>
            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</div> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.9/jquery.jcarousel.min.js"></script>
<script>
    (function($) {
        "use strict";

        // manual carousel controls
        $('.next').click(function(){ $('.carousel').carousel('next');return false; });
        $('.prev').click(function(){ $('.carousel').carousel('prev');return false; });

    })(jQuery);
</script>