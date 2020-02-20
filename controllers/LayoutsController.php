<?php

namespace app\controllers;

use Yii; 
use app\models\Notification;
use app\models\NotificationStatus;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
// use yii\filters\VerbFilter;
use yii\web\Cookie; 

class LayoutsController extends \yii\web\Controller
{
    public function actionNotification()
    {
        // $cookies = Yii::$app->request->cookies;
        //     if (($cookie = $cookies->get('emailUser')) !== null) {
        //         $emailUser = $cookie->value;
        //         $IdUserquery = "SELECT M_User.IdUser FROM M_User WHERE M_User.EmailUser = '$emailUser'";
        //         $IdUser = Yii::$app->db->createCommand($IdUserquery)->queryScalar();
        //         $query = "SELECT *
        //                         FROM M_Notification
        //                         JOIN M_NotificationStatus ON M_Notification.IdContentNotif = M_NotificationStatus.IdContentNotif
        //                         WHERE M_Notification.IdUser = '$IdUser'";
        //         $notifications = Yii::$app->db->createCommand($query);
        //         $result = $notifications->query();
        //         var_dump($result);
        //         return $this->render('layouts/header', ['notifications' => $result]);
        //     }else{
                
        //     }

            $cookies = Yii::$app->request->cookies;
            if (($cookie = $cookies->get('emailUser')) !== null) {
                $emailUser = $cookie->value;
                $IdUserquery = "SELECT M_User.IdUser FROM M_User WHERE M_User.EmailUser = '$emailUser'";
                $IdUser = Yii::$app->db->createCommand($IdUserquery)->queryScalar();
                $query = "SELECT *
                                FROM M_Notification
                                JOIN M_NotificationStatus ON M_Notification.IdContentNotif = M_NotificationStatus.IdContentNotif
                                WHERE M_Notification.IdUser = '$IdUser'";
                $notifications = Yii::$app->db->createCommand($query);
                $result = $notifications->query();
                return $this->render('layouts/header', ['notifications' => $result]);
            }else{
                
            }
    }

}
