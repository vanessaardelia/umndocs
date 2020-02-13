<?php

use app\models\Document;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */

$this->title = 'Revision Document';

$dataProvider = new ActiveDataProvider([
//    'query' => $query,
//        'query' => $documents->asArray(),
    'query' => Document::find() ->select(['JenisDoc', 'DocumentStatus', 'CreatedBy', 'M_Revisi.NamaDoc AS namaDoc'])
                                ->from('M_Document')
                                ->join('join', 'M_Revisi', 'M_Revisi.IdDoc = M_Document.IdDoc'),

    'pagination' => [
        'pageSize' => 10,
    ]
])
?>

<div class="site-index">
    <div class="body-content container-fluid">
        <h2 class="text-bold">Revision Document</h2>
        <hr>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
////            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'namaDoc',
                    'label' => 'Nama Document',
                ],
                [
                    'attribute' => 'JenisDoc',
                    'label' => 'Type Document'
                ],
                [
                    'attribute' => 'CreatedBy',
                    'label' => 'Created By'
                ],
                [
                    'attribute' => 'DocumentStatus',
                    'label' => 'Document Status',
                    'value' => function($documents){
                        if($documents->DocumentStatus == 5){
                            return 'Approved';
                        }elseif ($documents->DocumentStatus == 4){
                            return 'Waiting for Cover';
                        }elseif ($documents->DocumentStatus == 3){
                            return 'Waiting for Tags';
                        }elseif ($documents->DocumentStatus == 2){
                            return 'Submitted Document';
                        }elseif ($documents->DocumentStatus == 1){
                            return 'Draft';
                        }
                    }
                ],
            ]
        ])?>

    </div>
</div>
