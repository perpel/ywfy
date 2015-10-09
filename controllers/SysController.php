<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Detail;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SysController extends Controller{

    public $layout = "sys";
    public $enableCsrfValidation = false;

    public function actionUser(){


        return $this->render("user");
    }
}