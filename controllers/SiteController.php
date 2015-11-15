<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\module\register\models\Department;

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

        $request = Yii::$app->request;
        if( $request->isPost ){
                if(!$this->sysValidate($request->post("LoginForm")["court"]) ){
                    $model = new LoginForm();
                    
                    return $this->renderPartial('login',['model' => $model]);
                }
        }

        $model = new LoginForm();
        //var_dump(Yii::$app->request->post());exit;
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $session = Yii::$app->session;
            $session->set('COURTNAME', Department::courtName($model->court));
            $session->set('FLOWNUMBER', Department::flowNumber($model->court));
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

    protected function sysValidate($number){

            $depart = Department::find()->where(["Number"=>$number])->one();
            $start = $depart->StartDate;
            $end = $depart->EndDate;
            $d1=strtotime($start);   
            $d2=strtotime($end);   
            $Days=round(($d2-$d1)/3600/24);
            $code = md5(md5($end . $Days . "shangxiangwangluokeji"));
            if($code == $depart->RegistrationCode){
                if( $end <= date("Y-m-d") ){
                    echo "<script>alert('法院注册到期！')</script>";
                    return false;
                }
                return true;
            }else{
                echo "<script>alert('法院注册失败！')</script>";
                return false;
            }
       
    }
}
