<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
/* @var $this yii\web\View */

$this->title = 'Approved Document';
?>

<div class="body-content">

<div class="site-index">
    <div class="body-content container-fluid">
        <?= Html::a('<button class="btn btn-primary"> Download </button>', ['document/create-form']) ?>
        <div style="height: 500px; width: 100%;">
            <?php echo 
                \lesha724\documentviewer\GoogleDocumentViewer::widget([
                    'url'=>'https://pdfs.semanticscholar.org/52b7/d9e08991622a7af6bfaae3171d8e87ab3982.pdf',
                    'width'=>'100%',
                    'height'=>'100%',
                    'embedded'=>true,
                    'a'=>\lesha724\documentviewer\GoogleDocumentViewer::A_BI
                ]); 
            ?>
        </div>
        <p>Given Notes </p>

		<div class="container-fluid">
			<?php
				foreach($givennotes as $note){ ?>
					<div class="col-md-8">
						<div class="box box-solid box-primary">
							<div class="box-header user-block">
								<span class="pull-left"><i class="fa fa-user-circle-o"></i> <?php echo $emailUser ?> </span>
								<!-- <span class="pull-right"><i class="fa fa-clock-o"></i> </span> -->
							</div>
							<div class="box-body">
								<?= $note['Content'] ?>
							</div>
						</div>
					</div>
				<?php } ?>

			<?php $form = ActiveForm::begin([
				'method' => 'post',
			]);
		?>
		<?= $form->field($notes, 'Content')-> textarea(['rows' => 5]) ?>
		<?= Html::submitButton('Post Notes', ['class' => 'btn btn-primary']);?>
		<?php ActiveForm::end(); ?>
    </div>
</div>

