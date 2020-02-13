<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Document Management';
?>

<div class="site-index">
    <div class="body-content container-fluid">
        <div class="row">
            <?= Html::a('<button class="btn btn-primary"> Create Document </button>', ['document/create-form']) ?>
        </div>
        <div class="row">
            <div class="table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Document Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
                foreach($documents as $document){ ?>
                <div class="body-content">
    	<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card2 card-header card-chart" data-background-color="black">
						<div class="ct-chart" id="dailySalesChart"></div>
					</div>
					<div class="card-content">
						<h4 class="title"><?= $document['NamaDoc'] ?></h4>
						<!-- <p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p> -->
					</div>
					<div class="card-footer">
						<!-- <div class="stats">
							<i class="material-icons">access_time</i> updated 4 minutes ago
						</div> -->
					</div>
				</div>
			</div>
        <?php } ?>
        </ul>
    </div>
</div>





