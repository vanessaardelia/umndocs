
<?php
use yii\helpers\Html;
use app\models\GridViewAllDocument;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Document Management';
?>

<div class="site-index">
    <div class="body-content container-fluid">
        <h2 class="text-bold">View Documents</h2>
        <hr>

        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
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
                    'template' => '{revise} {edit} {cancel} {addtag} {uploadcover} {approved}',
                    'buttons' => [
                        'revise' => function ($url, $searchModel) {
                            if($searchModel['statusrevised']){
                                return Html::a('<span class="btn btn-primary">Revise</span>', $url);
                            }
                        },
                        'edit' => function($url2, $searchModel) {
                            if($searchModel['statusdraf'] ){
                                return Html::a('<span class="btn btn-primary">Edit Draf</span>', $url2);
                            }
                            
							if($searchModel['statussubmitted'] ){
                                return Html::a('<span class="btn btn-primary">Edit</span>', $url2);
                            }
						},
						'cancel' => function($url2, $searchModel) {
                            if($searchModel['statussubmitted'] ){
                                return Html::a('<span class="btn btn-danger">Cancel</span>', $url2);
                            }
						},
						'addtag' => function($url2, $searchModel) {
                            if($searchModel['statuswaitingfortag'] ){
                                return Html::a('<span class="btn btn-primary">Add Tags</span>', $url2);
                            }
						},
						'uploadcover' => function($url2, $searchModel) {
                            if($searchModel['statusuploadcover'] ){
                                return Html::a('<span class="btn btn-primary">Upload Cover</span>', $url2);
                            }
                        },
                        'approved' => function ($url, $searchModel) {
                            if($searchModel['statusapproved']){
                                return Html::a('<span class="p-3 mb-2 bg-success">Approved</span>', $url);
                            }
                        },
                    ],
                    'urlCreator' => function ($action, $searchModel) {
                        if ($action === 'revise') {
                            $url = './?r=document/givennotes&IdDoc=' . $searchModel->IdDoc;
                            return $url;
						}
                        if ($action === 'edit') {
                            $url2 = './?r=main/request&IdDoc=' . $searchModel->IdDoc;
                            return $url2;
						}
						if ($action === 'cancel') {
                            $url2 = './?r=document/cancelsubmitted&IdDoc=' . $searchModel->IdDoc;
                            return $url2;
						}
						if ($action === 'addtags') {
                            $url2 = './?r=main/request&IdDoc=' . $searchModel->IdDoc;
                            return $url2;
						}
						if ($action === 'uploadcover') {
                            $url2 = './?r=document/uploadcover&IdDoc=' . $searchModel->IdDoc;
                            return $url2;
						}
						
                    }
                ],
            ],
        ]); 
        ?>

    </div>
</div>








