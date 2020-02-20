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