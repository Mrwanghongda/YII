<?php

namespace backend\controllers;


use yii\web\Controller;

class GalleryController extends Controller{
    
    public $layout = 'index';

    public function actionIndex(){
        return $this->render('index');
    }
}