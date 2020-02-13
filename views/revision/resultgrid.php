<?php

use app\models\Document;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */

$this->title = 'Revision Document';

$dataProvider = new ActiveDataProvider([
//    $searchModel = new NewsSearch(),
//    $dataProvider = $searchModel->search(Yii::$app->request->queryParams),

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
                    'class' => 'yii\grid\SerialColumn',
                ],
                [
                    'attribute' => 'namaDoc',
                    'label' => 'Nama Document',
                ],
                [
                    'attribute' => 'JenisDoc',
                    'label' => 'Type Document'
                ],
                "CreatedBy",
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '<button class="btn btn-success"> See Detail </button>'
                ],
            ]
        ]) ?>

    </div>
</div>
