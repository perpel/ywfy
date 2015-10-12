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

    	$models = new LoginForm();

    	if( $models->load( Yii::$app->request->post()) && $models->login() ){

    		var_dump($models);

    	}

    	return $this->renderPartial("login");
    }

}