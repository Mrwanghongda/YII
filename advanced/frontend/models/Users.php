<?php
namespace frontend\models;

use  yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord{

    public function rules(){
        return [
            ['username' , 'required' , 'message' => '姓名不能为空'],
            ['userpass' , 'required' , 'message' => '密码不能为空'],
        ];
    }

    public function add($data){
        $session = Yii::$app->session;

        if($this->load($data) && $this->validate()){
            $this->username = $data['User']['username'];
            $this->userpass = $data['User']['userpass'];
            $this->status = 1;
            $this->save();
            // 检查session是否开启
            if ($session->isActive){
                // 开启session
                $session->open();
                $session->set('username' , $this->username);
                $session->set('userpass' , $this->userpass);
                return true;
            }
        }
        return false;
    }

    public function login($data){
        if($this->load($data) && $this->validate()){
            $user = User::find()->where(['username' => $data['User']['username'] , 'userpass' => $data['User']['userpass']])->one();
            if(!is_null($user)){
                return true;
            }
            return false;
        }
    }

    public function one($data){
        $user = User::find()->where(['username' => $data['name'] , 'userpass' => $data['pass']])->one();
        if(!is_null($user)){
            return $user;
        }
        return false;
    }

    public function info($uid,$email='',$tel=''){
        if(!empty($email)){
            $sql = "update user set email = {$email},integral = integral+20";
            Yii::$app->db->createCommand($sql)->execute();
            return true;
        }

        if(!empty($tel)){
            $sql = "update user set tel = {$tel},integral = integral+20";
            Yii::$app->db->createCommand($sql)->execute();
            return true;
        }

    }
}

