<?php

namespace backend\controllers;

use yii\db\Exception;
use yii\web\Controller;
use backend\models\User;
use backend\models\Profile;
use yii\data\Pagination;
use Yii;

class UserController extends  Controller{

    public $layout = 'index';

    public function actionList()
    {
        //两表联查
        $user = User::find()->joinWith('profile');
        // 得到文章的总数（但是还没有从数据库取数据）
        $count = $user->count();
        //页面条数
        $pageSize = Yii::$app->params['pageSize']['manage'];
        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count , 'pageSize' => $pageSize]);
        $users = $user->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('list' , ['users' => $users , 'pagination' => $pagination]);
    }

    //添加用户
    public function actionAdduser()
    {
        $user = new User();
        if(Yii::$app->request->isPost){
            $data = Yii::$app->request->post();
            if($user->addUser($data) === true){
                Yii::$app->session->setFlash('info','添加用户成功');
            }
        }
        return $this->render('adduser' , [ 'model' => $user]);
    }

    //删除用户
    public function actionDel(){
        $id = (int)Yii::$app->request->get('id');
        if($id < 0){
            $this->redirect(['user/list']);
        }
        $transaction = Yii::$app->db->beginTransaction();
        //删除2张表, 1张user主表 1张profile是用户副表
        try{
            //判断profile表中有无这个用户, 有的话删除profile副表数据
            if($res = Profile::find()->where('userid = :id' , [':id' => $id])->one()){
                //删除副表
                $res1 = Profile::deleteAll('userid = :id' , [':id' => $id]);
                if(empty($res1)){
                    throw new Exception('用户副表删除失败');
                }
            }
            //删除主表
            if(!User::deleteAll('userid = :id' , [':id' => $id])){
                throw new Exception('删除用户失败1');
            }
            $transaction->commit();
        } catch (\Exception $e){
//            $error = $e->getMessage();  //获取抛出的错误
//            $this->error($error);
//            $transaction->rollBack();
            if(Yii::$app->db->getTransaction()){
                $transaction->rollBack();
            }
        }
        $this->redirect(['user/list']);
    }

    public function actionUserinfo()
    {
        return $this->render('userinfo');
    }

}