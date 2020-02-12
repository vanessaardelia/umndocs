<?php

namespace app\controllers;
use App\Post;
use Yii;
use yii\web\Controller;
use app\models\Document;
use app\models\Revisi;

class RevisionController extends \yii\web\Controller
{
    // untuk menampilkan revision document (status = 6))
    public function actionIndex()
    {
        $query = "SELECT *
                        FROM M_Revisi
                        JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc
                        WHERE M_Document.DocumentStatus = '6'";
        $documents = Yii::$app->db->createCommand($query);
        $result = $documents->query();
        return $this->render('index', ['documents' => $result]);
    }

    public function actionCreateFormRevision($IdDoc){
        // $documents = Document::findOne($IdDoc);
        $query = "SELECT *
                        FROM M_Revisi
                        JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc
                        WHERE (M_Document.DocumentStatus = '6' AND M_revisi.RevisionStatus = '1') AND M_Document.IdDoc = '$IdDoc'";
        $documents = Yii::$app->db->createCommand($query);
        $result = $documents->query();
        return $this->render('formRevision', ['documents' => $result]);
    }
}