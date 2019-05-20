<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord{

    public $primaryKey = 'userid';
    public $repass;
    public $loginname;

    //返回当前表名
    public static function tableName()
    {
        return "{{%user}}";
    }

    //如果你不想用自动生成的标签，可以覆盖 yii\base\Model::attributeLabels() 方法明确指定属性标签
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'repass' => '确认密码',
            'userpass' => '密码',
            'useremail' => '邮箱',
            'loginname' => '电子邮箱/用户名'
        ];
    }

    //规则
    public function rules()
    {
        return [
            ['loginname' , 'required' , 'message' => '电子邮箱/用户名不能为空' , 'on' => ['login']],
            ['openid' , 'unique' , 'message' => 'openid已被注册' , 'on' => ['qqreg']],
            ['username' , 'unique' , 'message' => '用户名已被注册' , 'on' => ['addUser' , 'reg' , 'email']],
            ['userpass' , 'required' , 'message' => '密码不能为空' , 'on' => ['addUser' , 'reg' , 'email' , 'login' , 'qqreg']],
            ['useremail' , 'required' , 'message' => '邮箱不能为空' , 'on' => ['addUser' , 'reg' , 'email']],
            ['useremail' , 'unique' , 'message' => '邮箱已被注册' , 'on' => ['addUser' , 'reg' , 'email']],
            ['useremail' , 'email' , 'message' => '邮箱格式不正确' , 'on' => ['addUser' , 'reg' , 'email']],
            ['repass' , 'required' , 'message' => '确认密码不能为空' , 'on' => ['addUser']],
            ['repass' , 'compare' , 'compareAttribute' => 'userpass' , 'message' => '两次密码输入不一致' , 'on' => ['addUser' , 'qqreg']],
            ['userpass' , 'validatePass' , 'on' => ['login']],
        ];
    }

    public function validatePass(){
        if(!$this->hasErrors()){
            $loginname = 'username';
            if(preg_match('/@/' , $this->loginname)){
                $loginname = 'useremail';
            }
            $res = self::find()->where($loginname.'= :loginname and userpass = :userpass',[':loginname' => $this->loginname , ':userpass' => md5($this->userpass)])->one();
            if(is_null($res)){
                $this->addError('userpass' , '账号或者密码不正确');
            }
        }
    }

    /*
     * 用户管理模块
     *
     * */

    //添加用户
    public function addUser($data){
        $this->scenario = 'addUser';
        if($this->load($data) && $this->validate()){
            $this->createtime = time();
            $this->userpass = md5($data['User']['userpass']);
            //如果你确定你的数据不需要验证（比如说数据来自可信的场景）， 你可以调用 save(false) 来跳过验证过程。
            if($this->save(false)){
                return true;
            }
            return false;
        }
        return false;
    }

    //注册用户
    public function reg($data){
        $this->scenario = 'reg';
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

    //完善用户
    public function qqreg($data){
        $this->scenario = 'reg';
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
    public function getProfile(){
        // Profile::className() 关联查询
        return $this->hasOne(Profile::className() , ['userid' => 'userid']);
    }

    //发送邮件
    public function sendEmail($data){
        $this->scenario = 'email';
        $data['User']['username'] = 'shop_'.uniqid();
        $data['User']['userpass'] = uniqid();
        if($this->load($data) && $this->validate()){
            // 渲染一个视图作为邮件内容
            $mailer = Yii::$app->mailer->compose('addUser' , ['username' => $data['User']['username'] , 'userpass' => $data['User']['userpass']]);
            $mailer->setFrom('wanghongda9577@163.com')->setTo($data['User']['useremail'])->setSubject('邀请注册');
            if($mailer->send() && $this->reg($data)){
                return true;
            }
        }
        return false;
    }

    public function login($data){
        $this->scenario = 'login';
        if($this->load($data) && $this->validate()){
            $session = Yii::$app->session;
            // 设置一个session变量，以下用法是相同的：
            $session->set('loginname', $this->loginname);
            $session->set('isLogin', 1);
            return (bool)$session->get('isLogin');
        }
        return false;
    }
}




