<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Document Management System UMN';
?>
<?php

/* @var $this yii\web\View */
$this->title = 'Dashboard';
?>
<div class="site-index">
    <?php echo $emailUser ?>
    <div class="body-content">
    	<div class="row">
            <?php
            foreach($documents as $document): ?>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header card-chart" data-background-color="green">
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
            <?php endforeach; ?>
		</div>
    </div>
</div>

<style>
    .card:hover {
        transition: all 0.2s ease-out;
        box-shadow: 4px 3px 0px rgba(40, 38, 38, 0.2);
        top: -10px;
        border: 0.3px solid #cccccc;
    }

    .redBackground {
        background-color: indianred;
    }

    .blueBackground {
        background-color: cornflowerblue;
    }

    .greenBackground {
        background-color: green;
    }

    /* equal card height */
    .row-equal>div[class*='col-'] {
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
        overflow: hidden;
    }
</style>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.9/jquery.jcarousel.min.js"></script>
<script>
    (function($) {
        "use strict";

        // manual carousel controls
        $('.next').click(function() {
            $('.carousel').carousel('next');
            return false;
        });
        $('.prev').click(function() {
            $('.carousel').carousel('prev');
            return false;
        });

    })(jQuery);
</script>

<section class="carouselSlide" data-ride="carousel" id="carouselExampleIndicators">
    <div class="site-index">
        <div class="body-content">
            <div class="row">
                <?php
                $x = 0;
                foreach ($documents as $document) :
                if ($x % 3 == 0)
                    $class = 'indianred';
                else if ($x % 3 == 1)
                    $class = 'palegreen';
                else
                    $class = 'skyblue';

                if($x<10){
                ?>
                <div class="col-md-4">
                    <div class="card card-project my-2 my-md-0">
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
                    <?php } $x++; endforeach; ?>
            </div>
        </div>
    </div>
</section>
