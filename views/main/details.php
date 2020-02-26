<?php

use app\models\Document;
use yii\helpers\Html;

// use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */

$this->title = 'Preview Document';
?>

<div class="site-index">
    <div class="body-content container-fluid">
        <?= Html::a('<button class="btn btn-primary"> Download </button>', ['document/create-form']) ?>
        <div style="height: 1000px; width: 100%;">
            <?php echo 
                \lesha724\documentviewer\GoogleDocumentViewer::widget([
                    'url'=>'https://pdfs.semanticscholar.org/52b7/d9e08991622a7af6bfaae3171d8e87ab3982.pdf',
                    'width'=>'70%',
                    'height'=>'70%',
                    'embedded'=>true,
                    'a'=>\lesha724\documentviewer\GoogleDocumentViewer::A_BI
                ]); 
            ?>
        </div>
        <div>
        
        </div>
    </div>
</div>

