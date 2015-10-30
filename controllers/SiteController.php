<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    public function behaviors()
    {
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
                        return $this->redirect("index.php?r=site/login");
                }
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(){

        $cache = Yii::$app->cache;
        $cache_name = Yii::$app->user->identity->Number . "data";
        $cache->add( $cache_name, "");
        return $this->render("index");
    }

    public function actionLogin(){

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
           
            return $this->goBack();
        }
        return $this->renderPartial('login',[
                'model' => $model,
            ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect("index.php?r=site/login");

    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->renderPartial('about');
    }
}
