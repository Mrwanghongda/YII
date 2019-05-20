<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;

class Admin extends ActiveRecord{

    public $primaryKey = 'adminid';

    //由于视图中$model 中input是按照表字段，但对于表中没有字段的 可以在对应的model中声明一个字段到视图。例：记住我 这里默认记住我
    public $remember = true;
    public $pass;

    //返回当前表名
    public static function tableName()
    {
        return "{{%admin}}";
    }

    //如果你不想用自动生成的标签，可以覆盖 yii\base\Model::attributeLabels() 方法明确指定属性标签
    public function attributeLabels()
    {
        return [
            'adminuser' => '管理员账号',
            'adminemail' => '管理员邮箱',
            'adminpass' => '管理员密码',
            'pass' => '确认密码',
        ];
    }

    //规则
    public function rules()
    {
        return [
            [['adminuser'],'required','message'=>'管理员账号不能为空','on' => ['login' , 'seekPass' , 'add', 'changeEmail']],
            [['adminuser'],'unique','message'=>'管理员账号已被注册','on' => ['add']],
            [['adminpass'],'required','message'=>'管理员密码不能为空', 'on' => ['login' , 'up' , 'add' , 'changeEmail']],
            [['remember'],'boolean' , 'on' => 'login'],
            ['adminpass','verifyPassword' ,'on' => ['login' , 'changeEmail']],
            ['adminemail','verifyEmail' , 'on' => 'seekPass'],
            ['adminemail', 'unique' , 'message' => '电子邮箱已被注册' ,'on' => ['add' , 'changeEmail']],
            [['adminemail'],'required','message'=>'管理员电子邮箱不能为空' , 'on' => ['seekPass' , 'add', 'changeEmail']],
            ['adminemail','email','message'=>'电子邮箱格式不正确' , 'on' => ['seekPass' , 'add', 'changeEmail']],
            ['pass' , 'required' , 'message'=>'密码不能为空', 'on' => ['up' , 'add']],
            ['pass' , 'compare', 'compareAttribute' => 'adminpass' , 'message' => '两次密码输入不一致' , 'on' => ['up' , 'add']],
        ];


    }

    //验证邮箱
    public function verifyEmail(){
        if(!$this->hasErrors()){
            $data = self::find()->where('adminuser = :user and adminemail = :email' , [':user' => $this->adminuser , ':email' => $this->adminemail])->one();
            if(is_null($data)){
                $this->addError('adminemail','电子邮箱或账号不正确');
            }
        }
    }

    //验证密码
    public function verifyPassword(){
        if(!$this->hasErrors()){
            $data = self::find()->where('adminuser = :user and adminpass = :password',[':user'=>$this->adminuser,':password'=>md5($this->adminpass)])->one();
            if(is_null($data)){
                $this->addError('adminpass','用户名或者密码错误');
            }
        }
    }

    /*
     * 登录模块
     * login
     * */
    public function login($data){
        $this->scenario  = 'login';
        if($this->load($data) && $this->validate()){
            //将用户id存入session
            $lifeTime = $this->remember ? 24*3600 : 0;
            $session = Yii::$app->session;

            //将session会话id存入cookie
            session_set_cookie_params($lifeTime);

            $session['admin'] = [
                'adminuser' => $this->adminuser,
                'isLogin' => 1,
            ];
            $this->updateAll(['logintime' => time() , 'loginip' => ip2long(Yii::$app->request->userIP)]);
            return (bool)$session['admin']['isLogin'];
        }
        return false;
    }

    /*
     * 忘记密码模块
     * seekPass createToken checkPass
     * */
    public function seekPass($data){
        $this->scenario  = 'seekPass';
        if($this->load($data) && $this->validate()){
            //生成token
            $time = time();
            $token = $this->createToken($data['Admin']['adminuser'],$time);
            //发送邮件
            $mailer = Yii::$app->mailer->compose('seekpass',['adminuser' => $data['Admin']['adminuser'] , 'time' => $time , 'token' => $token]);
            $mailer->setFrom('wanghongda9577@163.com')->setTo($data['Admin']['adminemail'])->setSubject('找回密码');
            if($mailer->send()){
                return true;
            }

        }
        return false;
    }

    //生成token
    public function createToken($adminuser,$time){
        return md5(md5($adminuser).base64_encode(Yii::$app->request->userIP).md5($time));
    }


    public function checkPass($data){
        $this->scenario = 'up';
        if($this->load($data) && $this->validate()){
//             return (bool)$this->updateAll(['adminpass' => md5($this->adminpass)] , 'adminuser = :user' , [':user' => $this->adminuser]);
            return (bool)$this->updateAll(['adminpass' => md5($this->adminpass)], 'adminuser = :user', [':user' => $this->adminuser]);
        }
        return false;
    }

    /*
     * 管理员模块
     * Addadmin changeEmail  checkPass
     * */

    public function Addadmin($data){
        $this->scenario = 'add';
        $data['Admin']['adminpass'] = md5($data['Admin']['adminpass']);
        $data['Admin']['pass'] = md5($data['Admin']['pass']);
        if($this->load($data) && $this->save()){
            return true;
        }
        return false;
    }

    public function changeEmail($data){
        $this->scenario = 'changeEmail';
        if($this->load($data) && $this->validate()){
            return (bool)$this->updateAll(['adminemail' => $this->adminemail ], 'adminuser = :user' ,[':user' => $this->adminuser]);
        }
        return false;
    }
}







