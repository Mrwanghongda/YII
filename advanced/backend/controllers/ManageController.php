<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Admin;

class ManageController extends Controller{

    //修改密码
    public function actionManagepass(){
        $this->layout = false;

        $time = Yii::$app->request->get('timestamp');
        $token = Yii::$app->request->get('token');
        $adminuser= Yii::$app->request->get('adminuser');

        $admin = new Admin();
        if($token != $admin->createToken($adminuser,$time)){
            $this->redirect(['login/index']);
            Yii::$app->end();
        }

        if(time() - $time > 300){
            $this->redirect(['login/index']);
            Yii::$app->end();
        }

        $admin->adminuser = $adminuser;
        if(Yii::$app->request->isPost){
            $data = Yii::$app->request->post();
            $res = $admin->checkPass($data);
            if($res){
                Yii::$app->session->setFlash('update_success','修改密码成功！');
            }
        }
        return $this->render('managepass' , ['model' => $admin]);
    }




}





