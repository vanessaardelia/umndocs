<?php

namespace app\controllers;

use Yii;
use app\models\GridViewSearch;
use app\models\Document;

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

        return $this->render('index', ['documents' => $result, 'emailUser' => $emailUser]);
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
    $query = "SELECT M_Document.IdDoc as IdDoc, M_Revisi.NamaDoc as namaDoc
                FROM M_Document
                JOIN M_Revisi ON M_Document.IdDoc = M_Revisi.IdDoc";
    $documents = Yii::$app->db->createCommand($query);
    $result = $documents->query();

    $searchModel = new GridViewSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    // $emailUser = Yii::$app->getRequest()->getCookies()->getValue('emailUser');

    // $queryuser = "SELECT M_User.IdUser
    //                     FROM M_User
    //                     WHERE M_User.EmailUser = '$emailUser'";
    // $iduserr = Yii::$app->db->createCommand($queryuser);
    // $iduserresult = $iduserr->queryScalar();

    // $querydocumentaccess = "SELECT M_accessuser.IdDoc as idDoc FROM M_accessuser WHERE M_accessuser.IdUser = '$iduserresult'";
    // $documentaccess = Yii::$app->db->createCommand($querydocumentaccess);
    // $documentaccessresult = $documentaccess->query();

    // $documentaccessresult = $iduserresult;

    // $Model = new Document();

    // $query2 = "SELECT M_AccessUser.IdUser AS IdUser
    //             FROM M_Document
    //             JOIN M_AccessUser ON M_AccessUser.IdDoc = M_Document.IdDoc";
    // $query22 = Yii::$app->db->createCommand($query2);
    // $query222 = $query22->queryScalar();
    
    // Document::find() ->select(['M_AccessUser.IdUser AS IdUser','M_Document.IdDoc', 'JenisDoc', 'DocumentStatus', 'CreatedBy', 'M_Revisi.NamaDoc AS namaDoc'])
    //         ->from('M_Document')
    //         ->join('join', 'M_Revisi', 'M_Revisi.IdDoc = M_Document.IdDoc')
    //         ->join('join', 'M_AccessUser', 'M_AccessUser.IdDoc = M_Document.IdDoc');

       return $this->render('Kebijakan', [
        // 'iduserresult' => $iduserresult,
        // 'query222' => $query222,
        // 'model' => $Model,
        'documents' => $result,
        'searchModel' => $searchModel,
        // 'querydocumentaccess' => $documentaccessresult,
        'dataProvider' => $dataProvider,
    ]);
   }

   public function actionShowDetails()
   {
       return $this->render('details');
   }
}
