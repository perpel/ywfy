<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class IndexController extends Controller{

    public $enableCsrfValidation = false;

    public function actionIndex(){

        return $this->render("index");
    }

    public function actionLogin(){

       //
    
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //var_dump(Yii::$app->user);
            return $this->goBack();
        }
        return $this->renderPartial('login');
    }

}