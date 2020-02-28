<?php

namespace app\controllers;
use Yii; 

use app\models\AccessUser;
use app\models\Revisi;

class AccessControlController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new AccessUser();
        $model2 = new Revisi();

        $idUser = Yii::$app->getRequest()->getCookies()->getValue('idUser');
        $query = "SELECT CONCAT(EmailUser, CONCAT('/',Jabatan)) as NamaUser FROM M_User WHERE NOT IdUser = '$idUser'";
        $namaUser = Yii::$app->db->createCommand($query)->queryAll();

        $query = "SELECT M_Revisi.NamaDoc as namaDoc
                    FROM M_Revisi
                    JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc";
        $namaDoc = Yii::$app->db->createCommand($query)->queryAll();
        
        return $this->render('index', ['model' => $model, 'namaUser' => $namaUser, 'model2' => $model2, 'namaDoc' => $namaDoc]);
    }
}