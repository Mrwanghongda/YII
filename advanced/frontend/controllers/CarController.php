<?php

namespace frontend\controllers;

use yii\web\Controller;

class CarController extends Controller{

    public $layout = 'index';
    
    public function actionIndex(){

        return $this->render('index');
    }

}