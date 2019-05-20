<?php

namespace backend\controllers;

use backend\models\Admin;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;

class AdminController extends Controller{

    //layout
    public $layout = 'index';

    //admin show
    public function actionList(){
        $count = Admin::find()->count();
        $pageSize = \Yii::$app->params['pageSize']['manage'];
        $pagination = new Pagination(['totalCount' => $count , 'pageSize' => $pageSize ]);
        $res = Admin::find()->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('list',['admin' => $res , 'pagination' => $pagination]);
    }

    //admin add
    public function actionAdduser(){
        $admin = new Admin();
        if(Yii::$app->request->isPost){
            $data = Yii::$app->request->post();
            if($admin->Addadmin($data)){
                Yii::$app->session->setFlash('info' , '添加管理成功');
            }else{
                Yii::$app->session->setFlash('info' , '添加管理失败');
            }
        }
        $admin->adminuser = '';
        $admin->adminpass = '';
        $admin->pass = '';
        $admin->adminemail = '';
        return $this->render('adduser' , ['model' => $admin]);
    }

    //admin del
    public function actionDel(){
        $id = (int)Yii::$app->request->get('id');
        if($id < 0){
            $this->redirect('admin/list');
            Yii::$app->end();
        }
        $admin = new Admin();
        if ($admin->deleteAll('adminid = :id', [':id' => $id])) {
            Yii::$app->session->setFlash('info', '删除成功');
            $this->redirect(['admin/list']);
        }
    }

    //admin changepass
    public function actionUserinfo(){
        $admin = Admin::find()->where('adminuser = :user' , [':user' => Yii::$app->session['admin']['adminuser']])->one();
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
//            var_dump($admin->changePass($post));die;
            if($admin->checkPass($post)){
                Yii::$app->session->setFlash('info' , '修改成功');
            }
        }
        $admin->adminpass = '';
        return $this->render('userinfo' , ['model' => $admin]);
    }

    //changeemail
    public function actionMyinfo(){
        $admin = Admin::find()->where('adminuser = :user' , [':user' => Yii::$app->session['admin']['adminuser']])->one();
        if(Yii::$app->request->isPost){
            $data = Yii::$app->request->post();
            if($admin->changeEmail($data)){
                Yii::$app->session->setFlash('info' , '修改成功');
            }
        }
        $admin->adminpass = '';
        return $this->render('myinfo' , [ 'model' => $admin]);
    }
}