<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Document;
use app\models\Revisi;

class RevisionController extends \yii\web\Controller
{
    public function actionIndex(){
        $query = "SELECT M_Document.*, M_Revisi.NamaDoc as NamaDoc
                        FROM M_Document
                        JOIN M_Revisi ON M_Document.IdDoc = M_Revisi.IdDoc";
        $documents = Yii::$app->db->createCommand($query);
        $result = $documents->query();

        $query2 = 'Select m_document.IdDoc, m_document.JenisDoc, m_document.DocumentStatus, m_document.CreatedBy,
                m_revisi.NamaDoc 
        from m_document
                join m_revisi on m_document.IdDoc = m_revisi.IdDoc';
        $documents2 = Yii::$app->db->createCommand($query2);
        $result2 = $documents2->query();

        return $this->render('resultgrid', ['documents' => $result, 'query' => $documents2]);
    }
}
