<?php

use app\models\Document;
use app\models\AccessUser;
use app\models\GridViewSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
// use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */

$this->title = 'View Document';
//  echo $querydocumentaccess;
 
?>

<div class="site-index">
    <div class="body-content container-fluid">
        <h2 class="text-bold">View Documents</h2>
        <hr>

        <?php
//  echo $querydocumentaccess;
//  echo $iduserresult;
//  echo $query222;

        // foreach($querydocumentaccess as $query){
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
//            'showFooter' => true,
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
                    'label' => 'Type Document',
                    'filter' => ['Kebijakan Mutu' => 'Kebijakan Mutu', 'Kebijakan K3L' => 'Kebijakan K3L',
                        'Manual Mutu' => 'Manual Mutu', 'Manual K3L' => 'Manual K3L',
                        'Standard Mutu' => 'Standard Mutu', 'Standard K3L' => 'Standard K3L',
                        'Prosedur Mutu' => 'Prosedur Mutu', 'Prosedur K3L' => 'Prosedur K3L',
                        'SOP Mutu' => 'SOP Mutu', 'SOP K3L' => 'SOP K3L',
                        'Formulir' => 'Formulir', 'Userguide Mutu' => 'Userguide Mutu',
                        'K3L' => 'K3L', 'Dokumen kegiatan umum' => 'Dokumen kegiatan umum']
                ],
                "CreatedBy",
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'headerOptions' => ['width' => '80'],
                    'template' => '{seedetails} {request}',
                    'buttons' => [
                        'seedetails' => function ($url, $searchModel) {
                            if($searchModel['sama']){
                                return Html::a('<span class="btn btn-primary">See Details</span>', $url);
                            }
                        },
                        'request' => function($url2, $searchModel) {
                            if(!$searchModel['sama'] ){
                                return Html::a('<span class="btn btn-danger">Request</span>', $url2);
                            }
                        }
                    ],
                    'urlCreator' => function ($action, $searchModel) {
                        if ($action === 'seedetails') {
                            $url = './?r=main/show-details&IdDoc=' . $searchModel->IdDoc;
                            return $url;
                        }

                        if ($action === 'request') {
                            $url2 = './?r=revision/show-details&IdDoc=' . $searchModel->IdDoc;
                            return $url2;
                        }
                    }
                ],
            ],
        ]); 
        ?>

    </div>
</div>
