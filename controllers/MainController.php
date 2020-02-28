<?php

namespace app\controllers;

use Yii;
use app\models\GridViewSearch;
use app\models\Document;
use app\models\RequestAccess;
use yii\bootstrap\Alert;
use yii\base\Widget;

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
    // $query = "SELECT M_Document.IdDoc as IdDoc, M_Revisi.NamaDoc as namaDoc
    //             FROM M_Document
    //             JOIN M_Revisi ON M_Document.IdDoc = M_Revisi.IdDoc";
    // $documents = Yii::$app->db->createCommand($query);
    // $result = $documents->query();

    $searchModel = new GridViewSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       return $this->render('Kebijakan', [
        // 'documents' => $result,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
   }

   public function actionShowDetails($IdDoc)
   {
        // $model = Document::findOne($IdDoc);
        // $filePath = '/your/file/path';
        // $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->fileName);
        // return Yii::$app->response->sendFile($completePath, $model->fileName);
       return $this->render('details');
   }

   public function actionRequest($IdDoc)
   {   
        $model = new RequestAccess();
        //insert into
        if ($model->validateRequest($IdDoc)) {
            $emailUser = Yii::$app->getRequest()->getCookies()->getValue('emailUser');

            $queryuser = "SELECT M_User.IdUser AS IdUser
                            FROM M_User
                            WHERE M_User.EmailUser = '$emailUser'";
            $idUser = Yii::$app->db->createCommand($queryuser)->queryOne();
            $idUser = $idUser['IdUser'];

            $query = "INSERT INTO M_Requestaccess (IdDoc, IdUser) VALUES ($IdDoc, '$idUser')";
            $request = Yii::$app->db->createCommand($query)->query();

            // echo Alert::widget([
            //     'options' => [
            //         'class' => 'alert-info',
            //     ],
            //     'body' => 'Say hello...',
            // ]);
        }

       //balik ke halaman utama lg
        $query = "SELECT M_Document.IdDoc as IdDoc, M_Revisi.NamaDoc as namaDoc
                    FROM M_Document
                    JOIN M_Revisi ON M_Document.IdDoc = M_Revisi.IdDoc";
        $documents = Yii::$app->db->createCommand($query);
        $result = $documents->query();

        $searchModel = new GridViewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('Kebijakan', [
            'documents' => $result,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
   }
}
