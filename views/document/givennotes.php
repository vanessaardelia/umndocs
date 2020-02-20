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

<?php echo $emailUser ?>
<p>Given Notes </p>
<p> Notes: </p>
<?php foreach($givennotes as $note){ ?>
<?= $note['Content'] ?>
<?php } ?>

<?php $form = ActiveForm::begin([
  'method' => 'post',
]);
?>

<?= $form->field($notes, 'Content')-> textarea(['rows' => 5]) ?>
<?= Html::submitButton('Post Notes', ['class' => 'btn btn-primary']);?>
<?php ActiveForm::end(); ?>