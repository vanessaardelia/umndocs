<?php

namespace app\controllers;

use Yii;
use app\models\Document;

class CreateDocumentController extends \yii\web\Controller
{
    public function actionForm()
    {
        $model = new Document();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $fileName = rand(10, 100);
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file) {
                    $post = Yii::$app->request->post('Document');
                    $jenisDoc = $post['JENISDOC'];
                    $owner = $post['OWNER'];
                    $parent = $post['PARENTID'];
                    $noDoc = "";
                    //$nama = $post['DOCNAME'];
                    $fullFileName = 'document/' . $fileName . '.' . $model->file->extension;
                    $model->OWNER = $owner;
                    $model->IDDOC = $this->getCountId() + 1;
                    $model->JENISDOC = $jenisDoc;
                    //$model->linkDoc = $fullFileName;
                    $model->PARENTID = $parent;
                    $model->DOCUMENTSTATUS = 5;
                    if ("Kebijakan" == $jenisDoc) {
                        $no = $this->getMaxKebijakan();
                        if (0 == $no) {
                            $no = 1;
                        }
                        $noDoc = "KBJ0" . $no;
                    }
                    //$model->DOCNAME = $nama;
                    $model->NODOC = $noDoc;
                    $model->CREATEDBY = "Sep";
                    $model->save(false);

                    $model->file->saveAs($fullFileName);
                }
                return $this->goBack();
            }
        }

        return $this->render('create-document', ['model' => $model]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
