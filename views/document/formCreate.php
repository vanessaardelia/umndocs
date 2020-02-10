<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
/* @var $this yii\web\View */

$this->title = 'Create Document';

$items = ['Kebijakan', 'Standar', 'Prosedur Mutu', 'SOP', 'Form'];

if($jenisDoc == 0) $jenisDoc = 'Kebijakan';
else if ($jenisDoc == 1) $jenisDoc = 'Standar';
else if ($jenisDoc == 2) $jenisDoc = 'Prosedur Mutu';
else if ($jenisDoc == 3) $jenisDoc = 'SOP';
else if ($jenisDoc == 4) $jenisDoc = 'Form';    
?>
<div class="site-index">
    <div class="body-content container-fluid">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        
        <?= $form->field($model, 'JenisDoc')->textInput(['readonly' => true, 'value' => $jenisDoc]) ?>

        <?= $form->field($model, 'NoDoc')->widget(AutoComplete::className(), [
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'source' => $items
                ],
            ]) 
        ?>

        <?= $form->field($model, 'namaDoc')->textInput() ?>

        <?= $form->field($model, 'file')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Cancel', ['main/document'], ['class' => 'btn btn-info']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
