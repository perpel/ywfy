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

    public function behaviors(){

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'logout'],
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function () {
                        return $this->redirect("index.php?r=index/login");
                }
            ],
        ];
    }

    public function actionIndex(){

        return $this->render("index");
    }

    public function actionLogin(){

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //var_dump(Yii::$app->user);
            return $this->goBack();
        }
        return $this->renderPartial('login');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect("index.php?r=index/login");
    }

}