<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
/* @var $this yii\web\View */

$this->title = 'Revision Document';
?>

<?php if(count($documents) > 0): ?>
    <?php foreach($documents as $document): ?>
		<h4 class="title"><?= $document['NamaDoc'] ?></h4>
    <?php endforeach; ?>
    <?php else: ?>
    <p> Tidak ada data </p>
    <?php endif; ?>

<?php $form=ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
  <?= $form->field($model, 'NamaDoc')->textInput() ?> //Model gk ada
  <?= $form->field($model, 'DocumentFile')->fileInput() ?>
  <button> Submit </button>
<?php ActiveForm::end() ?>
