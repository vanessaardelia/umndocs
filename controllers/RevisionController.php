<?php

namespace app\controllers;

use app\models\GridViewSearch;
use App\Post;
use Yii;
use yii\web\Cookie;
use yii\web\Controller;
use app\models\Document;
use app\models\Revisi;
use app\models\Commentbox;

class RevisionController extends \yii\web\Controller
{
    public function actionIndex(){
        $query = "SELECT M_Document.*, M_Revisi.NamaDoc as namaDoc
                        FROM M_Document
                        JOIN M_Revisi ON M_Document.IdDoc = M_Revisi.IdDoc";
        $documents = Yii::$app->db->createCommand($query);
        $result = $documents->query();

        $searchModel = new GridViewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if (($cookie = Yii::$app->request->cookies->get('emailUser')) !== null) {
            $emailUser = $cookie->value;
        } else return $this->redirect('login/index');

        $query = "SELECT M_User.IdUser
                        FROM M_User
                        WHERE M_User.EmailUser = '$emailUser'";
        $idUser = Yii::$app->db->createCommand($query)->queryScalar();

        $queryIdComment = "SELECT MAX(IdComment) FROM M_CommentBox";
        $IdComment = Yii::$app->db->createCommand($queryIdComment)->queryScalar();
        $IdComments = ($IdComment + 1);

        $model = new Commentbox();
        if ($model->load(Yii::$app->request->post()) && $model->validateComment($IdComments)) {
            $query = "INSERT INTO M_Commentbox (IdComment, Comments, IdDoc, NoRev, IdUser, TimeChat)
            VALUES ($IdComments, '$model->Comments', 1, 2, '$idUser', now())"; //BLM DIGANTI
            Yii::$app->db->createCommand($query)->query();
        }
        
        $model = new Commentbox();
        $query = "SELECT M_Commentbox.IdComment, M_Commentbox.Comments, M_Commentbox.IdDoc, 
                            M_Commentbox.NoRev, M_Commentbox.TimeChat, M_User.Nama
                        FROM M_Commentbox
                        JOIN M_Document ON M_Commentbox.IdDoc = M_Document.IdDoc
                        JOIN M_Revisi ON M_Commentbox.NoRev = M_Revisi.NoRev
                        JOIN M_User ON M_Commentbox.IdUser = M_User.IdUser
                        WHERE M_Commentbox.IdUser = '$idUser'";  //BLM DIGANTI PAKE COOKIE
        $comments = Yii::$app->db->createCommand($query)->query();


        return $this->render('index', [
            'documents' => $result,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'comments' => $comments
        ]);
//        return $this->render('index', ['model' => $model, 'comments' => $comments]);
    }
}
