<?php

namespace app\controllers;

class ViewController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('View');
    }

}
