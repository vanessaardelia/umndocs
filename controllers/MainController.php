<?php

namespace app\controllers;

use Yii;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = "SELECT M_Revisi.NamaDoc, M_Document.createdBy
                        FROM M_Revisi
                        JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc";
        $documents = Yii::$app->db->createCommand($query);
        $emailUser = Yii::$app->getRequest()->getCookies()->getValue('emailUser');
        $result = $documents->queryAll();

        return $this->render('index', ['documents' => $result, 'emailUser' => $emailUser],);
    }

   public function actionDocument()
   {
       $query = "SELECT M_Revisi.NamaDoc
                       FROM M_Revisi
                       JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc
                       WHERE M_Document.DocumentStatus = '5'";
       $documents = Yii::$app->db->createCommand($query);
       $result = $documents->query();
       return $this->render('document', ['documents' => $result]);
   }
   
   public function actionKebijakan()
   {
       //ada di view querynya
       return $this->render('Kebijakan');
   }

   public function actionStandar()
   {
       //ada di view querynya
       return $this->render('Standar');
   }

   public function actionProsedurmutu()
   {
       //ada di view querynya
       return $this->render('Prosedurmutu');
   }

   public function actionSop()
   {
       //ada di view querynya
       return $this->render('Sop');
   }

   public function actionForm()
   {
       //ada di view querynya
       return $this->render('Form');
   }
}
