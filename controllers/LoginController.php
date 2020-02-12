<?php

namespace app\controllers;
use Yii;
use app\models\User;

class LoginController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();
        if ($model->load(Yii::$app->request->post()) && $model->validateLogin($model->EmailUser, $model->Password)) {
            $cookie = new yii\web\Cookie([
                'name'=>'emailUser',
                'value'=>$model->EmailUser
            ]);
            Yii::$app->getResponse()->getCookies()->add($cookie);
            return $this->redirect(['main/index']);
        }

        return $this->render('index', ['model' => $model]);
    }
}