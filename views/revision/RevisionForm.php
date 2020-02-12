<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
/* @var $this yii\web\View */

$this->title = 'Revision Document';
?>

<div class="body-content">
<?php 
  $form = ActiveForm::begin([
    'method' => 'post',
  ]);
?>
  
<?= $form->field($model, 'NamaDoc'); ?>
<?= Html::submitButton('Update', ['class' => 'btn btn-primary']);?>
<?php ActiveForm::end(); ?>




