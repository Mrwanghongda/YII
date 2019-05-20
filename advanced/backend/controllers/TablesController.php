<?php

namespace backend\controllers;


use yii\web\Controller;

class TablesController extends Controller{

    public $layout = 'index';

    public function actionShowcase(){
        return $this->render('showcase');
    }

    public function actionWizard(){
        return $this->render('wizard');
    }

    public function actionIndex(){
        return $this->render('index');
    }
}