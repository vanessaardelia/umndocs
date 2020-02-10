<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Create Document';
$items = ['0' => 'Kebijakan', '1' => 'Standar', '2' => 'Prosedur Mutu', '3' => 'SOP', '4' => 'Form'];
?>
<div class="site-index">
    <div class="body-content container-fluid">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        
        <?= $form->field($model, 'JenisDoc')->dropDownList(
        	$items,
        	['prompt' => 'Jenis Dokumen']
        ); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Next', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Cancel', ['main/document'], ['class' => 'btn btn-info']) ?>
        </div>

    	<?php ActiveForm::end(); ?>
    </div>
</div>
