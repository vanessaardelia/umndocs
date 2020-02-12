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

    public function actionCreateForm($IdDoc){
        // $documents = Document::findOne($IdDoc);
        
        // return $this->render('RevisionForm', ['documents' => $result]);
    }

    public function actionRevisionNotes($IdDoc){
        // $query = "SELECT *
        //                 FROM M_Revisi
        //                 JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc
        //                 WHERE (M_Document.DocumentStatus = '6' AND M_revisi.RevisionStatus = '1') AND M_Document.IdDoc = '$IdDoc'";
        // $documents = Yii::$app->db->createCommand($query);
        // $result = $documents->query();
        $query = "SELECT MAX(NoRev) FROM M_Revisi WHERE IdDoc = '$IdDoc'";
        $noRev = Yii::$app->db->createCommand($query)->queryScalar();
        $model = Revisi::find()->where(['NoRev' => $noRev, 'IdDoc' => $IdDoc])->one();
        if(Yii::$app->request->post()){
            
        }
        return $this->render('revisionForm', ['model' => $model]);
    }

    public function givennotes($IdDoc){
        $query = "SELECT MAX(NoRev) FROM M_Revisi WHERE IdDoc = '$IdDoc'";
        $noRev = Yii::$app->db->createCommand($query)->queryScalar();
        $model = Revisi::find()->where(['NoRev' => $noRev, 'IdDoc' => $IdDoc])->one();
        $emailUser = Yii::$app->getRequest()->getCookies()->getValue('emailUser');
        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yi::$app->setSession()->setFlash('message', 'sukses');
            // return $this->redirect(['index', 'IdDoc'=>$model->$IdDoc]);
        } else {
            return $this->render('revisionForm', ['model' => $model]);
        }
    }
}
