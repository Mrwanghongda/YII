<?php

namespace backend\controllers;

use Yii;
use backend\models\Admin;
use yii\web\Controller;

class LoginController extends Controller{

    public $layout = false;
    public $enableCsrfValidation = false;
    
    public function actionIndex(){
        $admin = new Admin();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            $res = $admin->login($post);
            if($res){
                $this->redirect(['index/index']);
                Yii::$app->end();
            }
        }
        return $this->render('index',['model' => $admin]);
    }

    public function actionLogout(){
        Yii::$app->session->removeAll();
        if(!isset(Yii::$app->session['admin']['isLogin'])){
            $this->redirect(['login/index']);
            Yii::$app->end();
        }
        $this->goback();
    }

    public function actionSetpassword(){
        $admin = new Admin();
        if(Yii::$app->request->isPost){
            $data = Yii::$app->request->post();
            if($admin->seekPass($data)){
                Yii::$app->session->setFlash('success','电子邮件发送成功，请注意查收');
            }
        }
        return $this->render('setpassword',['model' => $admin]);
    }
}