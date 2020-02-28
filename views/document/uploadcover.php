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
        <?= Html::a('<button class="btn btn-primary"> Upload Cover </button>', ['document/uploadcover']) ?>
    </div>
</div>

