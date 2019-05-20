<?php
namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord{

    public $primaryKey = 'userid';
    public $repass;

    //返回表名
    public static function tableName()
    {
        return "{{%user}}";
    }

    //更改默认提示
    public function attributeLabels()
    {
        return [
            'useremail' => '用户邮箱',
        ];
    }

    //规则
    public function rules()
    {
        return [
          ['useremail' , 'email' , 'message' => '电子邮箱格式不正确' , 'on' => ['reg']],
          ['useremail' , 'required' , 'message' => '电子邮箱不能为空' , 'on' => ['reg']],
          ['useremail' , 'unique ' , 'message' => '电子邮箱已被注册' , 'on' => ['reg']],
          ['userpass', 'required', 'message' => '用户密码不能为空', 'on' => ['reg']],
          ['repass', 'required', 'message' => '确认密码不能为空', 'on' => ['reg']],
          ['repass', 'compare', 'compareAttribute' => 'userpass', 'message' => '两次密码输入不一致', 'on' => ['reg']],
          ['username', 'required', 'message' => '用户名不能为空', 'on' => ['reg']],
          ['username', 'unique', 'message' => '用户名已被注册', 'on' => ['reg']],
        ];
    }

    //验证邮箱
    public function verifyEmail(){

    }
    //发送邮件
    public function sendEmail($data){
        if($this->load($data) && $this->validate()){
            $data['User']['username'] = 'shop_'.uniqid();
            $data['User']['userpass'] = uniqid();
            // 渲染一个视图作为邮件内容
            $mailer = Yii::$app->mailer->compose('addUser' , ['username' => $data['User']['username'] , 'userpass' => $data['User']['userpass']])
                ->setFrom('wanghongda9577@163.com')->setTo($data['User']['useremail'])->setSubject('邀请注册');
            if($mailer->send() && $this->reg($data)){
                return true;
            }
            return false;
        }
        return false;
    }

    //注册用户
    public function reg($data){
        $this->scenarios = 'reg';
        if($this->load($data) && $this->validate()){
            $this->createtime = time();
            $this->userpass = md5($this->userpass);
            //如果你确定你的数据不需要验证（比如说数据来自可信的场景）， 你可以调用 save(false) 来跳过验证过程。
            if($this->save(false)){
               return true;
            }
            return false;
        }
        return false;
    }
}