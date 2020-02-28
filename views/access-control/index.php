<?php

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\helpers\Html;

// use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */

$this->title = 'Set Access';
?>

<div class="site-index">
    <div class="body-content container-fluid">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model2, 'namaDoc')->widget(AutoComplete::className(), [
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'source' => ArrayHelper::getColumn($namaDoc, 'namaDoc')
                ],
            ])->label("Judul Dokumen") 
        ?> 
        <?= $form->field($model, 'EmailUser')->widget(AutoComplete::className(), [
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'source' => ArrayHelper::getColumn($namaUser, 'NamaUser')
                ],
            ])->label("Grant Access to :") 
        ?> 
        <div class="form-group">
            <?= Html::submitButton('Grant Access', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

