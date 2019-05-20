<?php

namespace frontend\controllers;

use yii\web\Controller;

class OrderController extends Controller{

    public $layout = 'index';

    public function actionIndex(){

        return $this->render('index');
    }

}