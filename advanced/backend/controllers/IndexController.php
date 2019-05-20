<?php

namespace backend\controllers;

use yii\web\Controller;

class IndexController extends Controller
{

    public $layout = 'index';

    public function actionIndex()
    {
//        $this->layout = false;
        return $this->render('index');
    }
}