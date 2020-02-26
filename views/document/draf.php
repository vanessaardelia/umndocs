
<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Document Management';
?>

<div class="site-index">
    <div class="body-content container-fluid">
        <?php if(count($documents) > 0): ?>
            <?php foreach($documents as $document): ?>
                <div class="body-content">
    	        <div class="row">
			        <div class="col-md-3">
				        <div class="card">
					        <div class="card-header card-chart" data-background-color="green">
						        <div class="ct-chart" id="dailySalesChart"></div>
					        </div>
					        <div class="card-content">
						        <h4 class="title"><?= $document['NamaDoc'] ?></h4>
						        <!-- <p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p> -->
					        </div>
					        <div class="card-footer">
							<!-- <?= Html::a('<button class="btn btn-primary"> View Draf </button>', ['document/givennotes', 'IdDoc' => $document['IdDoc']], ['class' => 'btn btn-primary']) ?> -->
                            <?= Html::a('View Draf', ['document/givennotes', 'IdDoc' => $document['IdDoc']], ['class' => 'btn btn-primary']) ?>
					        </div>
				        </div>
			        </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p> Tidak ada data </p>
            <?php endif; ?>

    </div>
</div>





