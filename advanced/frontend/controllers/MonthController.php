<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\User;
use frontend\models\Goods;
use frontend\models\Orders;
use yii\data\Pagination;


class MonthController extends  Controller{

        //用户注册
       public function actionReg(){
           $model = new User();
           return $this->render('reg' , ['model' => $model]);
       }

       //接受用户数据
       public function actionAdd(){
           $user = new User();
           $data = Yii::$app->request->post();
           if($user->add($data)){
                echo "注册成功,已赠送您200积分;</br><a href='?r=month/login'>前往登录</a>";
           }else{
               $this->redirect(['month/reg']);
           }
       }

       //用户登录
       public function actionLogin(){
           $user = new User();
           return $this->render('login' , ['model' => $user]);
       }

       //处理用户登录
       public function actionDo(){
           $data = Yii::$app->request->post();
           $session = Yii::$app->session;
           $session->remove('language');
           // 检查session是否开启
           if ($session->isActive){
               // 开启session
               $session->open();
               if(!$session->has('username') && !$session->has('userpass')){
                   $user = new User();
                   if($user->login($data)){
                       $this->redirect(['month/index']);
                   }else{
                       $this->redirect(['month/login']);
                   }
               }else{
                  $this->redirect(['month/index']);
               }
           }
       }

       public function actionIndex(){
           $session = Yii::$app->session;
           // 检查session是否开启
           if ($session->isActive){
               // 开启session
               $session->open();
               $users['name'] = $session->get('username');
               $users['pass'] = $session->get('userpass');
               $user = new User();
               $userOne = $user->one($users);
               $goodes = new Goods();
               $goods = $goodes::find();
               $pagination = new Pagination([
                   'defaultPageSize' => 5,
                   'totalCount' => $goods->count(),
               ]);
               $good = $goods->orderBy('id')
                   ->offset($pagination->offset)
                   ->limit($pagination->limit)
                   ->all();
               return $this->render('index' , [
                   'model' => $goodes,
                   'user' => $userOne ,
                   'goods' => $good,
                   'pagination' => $pagination,
                   ]);
           }
       }

       //搜索
       public function actionSearch(){
           $session = Yii::$app->session;
           // 检查session是否开启
           if ($session->isActive) {
               // 开启session
               $session->open();
               $users['name'] = $session->get('username');
               $users['pass'] = $session->get('userpass');
               $user = new User();
               $userOne = $user->one($users);
               $search = Yii::$app->request->post();
               $search = $search['Goods']['goods_name'];
               $goodes = new Goods();
               $data = $goodes->search($search);
               return $this->render('search',[
                   'model' => $goodes,
                   'user' => $userOne ,
                   'goods' => $data,
               ]);
           }
       }

       //购买
      public function actionBuy(){
          $gid = (int)Yii::$app->request->get('id');
          $session = Yii::$app->session;
          // 检查session是否开启
          if ($session->isActive) {
              // 开启session
              $session->open();
              $users['name'] = $session->get('username');
              $users['pass'] = $session->get('userpass');
              $user = new User();
              $userOne = $user->one($users);
              $uid = $userOne['id'];
              $order = new Orders();
              if($order->add($gid,$uid)){
                  echo "添加购物车成功</br><a href='?r=month/car'>前往购物车</a>";
              }else{
                  $this->redirect(['month/index']);
              }
          }
      }

      //购物车页面
    public function actionCar(){
        $order = new Orders();
        $orders = $order->all();
        return $this->render('car' , ['order' => $orders]);
    }

    //付款
    public function actionPay(){
        $gid = (int)Yii::$app->request->get('id');
        if($gid){
            $orders = new orders();
            $res = $orders->del($gid);
            if($res){
               echo "付款成功";
            }
        }
    }

    //完善信息
    public function actionInfo(){
           $user = new User();
           return $this->render('info' , ['model' => $user]);
    }
}


