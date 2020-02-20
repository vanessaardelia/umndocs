<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Document Management';
?>

<div class="container-fluid">
	<?php
	foreach ($comments as $comment) { ?>
		<div class="col-md-8">
			<div class="box box-solid box-primary">
				<div class="box-header user-block">
					<span class="pull-left"><i class="fa fa-user-circle-o"></i> <?= $comment['Nama'] ?> </span>
					<span class="pull-right"><i class="fa fa-clock-o"></i> <?= $comment['TimeChat'] ?> </span>
				</div>
				<div class="box-body">
					<?= $comment['Comments'] ?>
				</div>
			</div>
		</div>
	<?php } ?>




</div>
<div class="container-fluid">
	<div class="col-md-8">
		<?php $form = ActiveForm::begin(['id' => 'comment-form']); ?>
		<?= $form->field($model, 'Comments')->textInput()->input('', ['placeholder' => 'Write a comment...']) ?>

		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'comment-button']) ?>
		<?php ActiveForm::end(); ?>
	</div>
</div>