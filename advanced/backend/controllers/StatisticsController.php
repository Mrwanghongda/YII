<?php

namespace backend\controllers;


use yii\web\Controller;

class StatisticsController extends Controller{

    public $layout = 'index';

    public function actionShowcase(){
        return $this->render('showcase');
    }
}


