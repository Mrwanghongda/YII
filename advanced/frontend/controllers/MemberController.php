<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\User;

class MemberController extends Controller{
    public $layout = 'index';
    public function actionAuth(){
        $user = new User();
        if(Yii::$app->request->isPost){
            $data = Yii::$app->request->post();
            if($user->login($data)){
                //Yii::$app->request->referrer  前一页面
                return $this->goback(Yii::$app->request->referrer);
            }
        }
        $user->username = '';
        $user->useremail = '';
        return $this->render('auth' , ['model' => $user]);
    }

    public function actionQqlogin(){
        require_once ("../../vendor/qqlogin/qqConnectAPI.php");
        $qc = new \QC();
        $qc->qq_login();
    }

    public function actionQqcallback(){
        require_once ("../../vendor/qqlogin/qqConnectAPI.php");
        $auth = new \OAuth();
        $accessToken = $auth->qq_callback();
        $open_id = $auth->get_openid();
        $qc = new \QC($accessToken,$open_id);
        $user_info = $qc->get_user_info();
        $session = Yii::$app->session;
        $session['userinfo'] = $user_info;
        $session['openid'] = $open_id;
        if(User::find()->where('openid = :openid' , [':openid' => $open_id])->one()){
            $session['loginname'] = $user_info['nickname'];
            $session['isLogin'] = 1;
            return $this->redirect(['index/index']);
        }
        return $this->redriect(['member/qqreg']);
//        code=72FDBB1FA993CE83B529922F1C738FDB&state=05036267255afe9fc79992b195aee093
    }

    public function actionQqreg(){
        $model = new User();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->reg($post)){
                return $this->redriect(['index/index']);
            }
        }
        return $this->render('qqreg' , ['model' => $model]);
    }

    public function actionLogout(){
        $session = Yii::$app->session;
        $session->remove('loginname');
        $session->remove('isLogin');
        if(!isset($session->remove['isLogin'])){
            return $this->goBack(Yii::$app->request->referrer);
        }
    }
}


