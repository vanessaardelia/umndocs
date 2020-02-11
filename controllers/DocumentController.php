<?php

namespace app\controllers;
use Yii; 
use app\models\Document;
use app\models\Revisi;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DocumentController extends \yii\web\Controller
{
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateForm()
    {
    	$model = new Document();
    	if ($model->load(Yii::$app->request->post())) {
          	return $this->redirect(['document/create-form-next', 'jenisDoc' => $model->JenisDoc]);
        }

    	return $this->render('formPilih', ['model' => $model]);
    }

    public function actionCreateFormNext($jenisDoc)
    {
    	$model = new Document();
    	if ($model->load(Yii::$app->request->post())) {
    		$this->generateCover($model);
			return $this->redirect(['main/document']);
    	}

    	return $this->render('formCreate', ['jenisDoc' => $jenisDoc, 'model' => $model]);
    }

    public function generateCover($model){
		$fileTemplateWord = \Yii::$app->basePath . '/web/Resources/FormatDokumen/Format'.$model->JenisDoc.'.DOCX';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($fileTemplateWord);
        $templateProcessor->setValue('namaDokumen', $model->namaDoc);
        $templateProcessor->setValue('noDokumen', $model->NoDoc);
        $temp_file_word = tempnam(sys_get_temp_dir(), 'PHPWord');
        $templateProcessor->saveAs($temp_file_word);
        $filename = $model->NoDoc. ".docx";
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_file_word));
  //       $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($templateProcessor, 'Word2007');
		// $objWriter->save($filename.'.docx');
        flush();
        readfile($temp_file_word);
        // Hapus file word dari folder temporary server
        unlink($temp_file_word);
    }


    // untuk menampilkan semua document
    public function showalldocument(){
        return $this->redirect(['main/document']);
    }

}
