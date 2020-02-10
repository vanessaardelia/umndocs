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

    <div class="body-content">
    	<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header card-chart" data-background-color="green">
						<div class="ct-chart" id="dailySalesChart"></div>
					</div>
					<div class="card-content">
						<h4 class="title">Daily Sales</h4>
						<p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">access_time</i> updated 4 minutes ago
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-header card-chart" data-background-color="orange">
						<div class="ct-chart" id="emailsSubscriptionChart"></div>
					</div>
					<div class="card-content">
						<h4 class="title">Email Subscriptions</h4>
						<p class="category">Last Campaign Performance</p>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">access_time</i> campaign sent 2 days ago
						</div>
					</div>

				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-header card-chart" data-background-color="red">
						<div class="ct-chart" id="completedTasksChart"></div>
					</div>
					<div class="card-content">
						<h4 class="title">Completed Tasks</h4>
						<p class="category">Last Campaign Performance</p>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">access_time</i> campaign sent 2 days ago
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>

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
