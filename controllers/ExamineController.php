<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ExamineController extends Controller{

    public function actionComplex(){

        return $this->render("complex");
    }

    public function actionAssess(){

        return $this->render("index");
    }



}