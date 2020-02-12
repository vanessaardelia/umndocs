<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Document Management System UMN';
?>
<?php

/* @var $this yii\web\View */
// $this->title = 'My Yii Application';
?>
<div class="site-index">

    <!-- <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->
    
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

