<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Document Management';
?>

<div class="site-index">
    <div class="body-content container-fluid">
        <div class="row">
            <?= Html::a('<button class="btn btn-primary"> Create Document </button>', ['document/create-form']) ?>
        </div>
        <div class="row">
            <div class="table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Document Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <ul>
        <?php
                foreach($documents as $document){ ?>
                <?= $document['NamaDoc'] ?>
            </li>
        <?php } ?>
        </ul>
    </div>
</div>
