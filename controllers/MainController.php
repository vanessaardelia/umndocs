<?php

namespace app\controllers;
use Yii;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDocument()
    {
        $query = "SELECT M_Revisi.NamaDoc
                        FROM M_Revisi
                        JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc";
        $documents = Yii::$app->db->createCommand($query);
        $result = $documents->query();
        return $this->render('document', ['documents' => $result]);
    }
}