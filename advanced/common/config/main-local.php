<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii1',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',     //这里不用管
                'host' => 'smtp.163.com',             //邮箱服务器地址
                'username' => 'wanghongda9577@163.com',  //用户名
                'password' => 'abstract123',         //授权码
                'port' => '465',                      //端口465就可以
                'encryption' => 'ssl',                //因为选择的是465所以这里填ssl因为这个会更安全 ，如果端口是25那这里要填 tls
            ],
        ],
    ],
];
