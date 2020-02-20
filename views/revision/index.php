<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Revision Document';
?>

<div class="container-fluid">
    <h2 class="text-bold">Revision Document</h2>
    <hr>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//            'showFooter' => true,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            [
                'attribute' => 'namaDoc',
                'label' => 'Nama Document',
            ],
            [
                'attribute' => 'JenisDoc',
                'label' => 'Type Document',
                'filter' => ['Kebijakan Mutu' => 'Kebijakan Mutu', 'Kebijakan K3L' => 'Kebijakan K3L',
                    'Manual Mutu' => 'Manual Mutu', 'Manual K3L' => 'Manual K3L',
                    'Standard Mutu' => 'Standard Mutu', 'Standard K3L' => 'Standard K3L',
                    'Prosedur Mutu' => 'Prosedur Mutu', 'Prosedur K3L' => 'Prosedur K3L',
                    'SOP Mutu' => 'SOP Mutu', 'SOP K3L' => 'SOP K3L',
                    'Formulir' => 'Formulir', 'Userguide Mutu' => 'Userguide Mutu',
                    'K3L' => 'K3L', 'Dokumen kegiatan umum' => 'Dokumen kegiatan umum']
            ],
            "CreatedBy",
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'headerOptions' => ['width' => '80'],
                'template' => '<button class="btn btn-success"> See Detail </button>'
            ],
        ],
//            'layout' => "\n{summary}\n{items}\n{pager}"
    ]) ?>


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