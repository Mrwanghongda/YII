<?php

namespace backend\controllers;


use yii\web\Controller;

class CalendarController extends Controller{

    public $layout = 'index';

    public function actionIndex(){
        return $this->render('index');
    }
}