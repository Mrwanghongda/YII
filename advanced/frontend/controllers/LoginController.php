<?php

namespace frontend\controllers;

use yii\web\Controller;
use backend\models\User;
use Yii;

class LoginController extends Controller{

    public $layout = 'index';

    public function actionIndex(){
        $model = new User();
        return $this->render('index' , ['model' => $model]);
    }

    public function actionReg(){
        $model = new User();
        if(Yii::$app->request->isPost){
            $data = Yii::$app->request->post();
            if($model->sendEmail($data)){
                Yii::$app->session->setFlash('info' , '邮件已发送，请注意查收');
            }
        }
        return $this->render('reg' , ['model' => $model]);
    }
}