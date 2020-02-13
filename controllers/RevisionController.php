<?php

namespace app\controllers;

use App\Post;
use Yii;
use yii\web\Cookie;
use yii\web\Controller;
use app\models\Document;
use app\models\Revisi;
use app\models\Commentbox;

class RevisionController extends \yii\web\Controller
{
    // untuk menampilkan revision document (status = 6))
    public function actionIndex()
    {
        if (($cookie = Yii::$app->request->cookies->get('emailUser')) !== null) {
            $emailUser = $cookie->value;
        } else return $this->redirect('login/index');

        $query = "SELECT M_User.IdUser
                        FROM M_User
                        WHERE M_User.EmailUser = '$emailUser'";
        $idUser = Yii::$app->db->createCommand($query)->queryScalar();

        $model = new Commentbox();
        if ($model->load(Yii::$app->request->post()) && $model->validateComment('1')) {
            // return $this->render('index', ['model' => $model]);
            $query = "INSERT INTO M_Commentbox (IdComment, Comments, IdDoc, NoRev, IdUser, TimeChat)
            VALUES ('1', '$model->Comments', 1, 2, '$idUser', now())"; //BLM DIGANTI
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

        return $this->render('index', ['model' => $model, 'comments' => $comments]);
    }
}
