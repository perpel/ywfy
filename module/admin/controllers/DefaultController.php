<?php

namespace app\module\admin\controllers;

use Yii;
use yii\web\Controller;
use app\module\admin\models\Admin;

class DefaultController extends Controller
{

    
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        if( !Yii::$app->session->get("admin") ){
            return $this->redirect("index.php?r=admin/default/login");
        }
        $this->layout = "admin";
        return $this->render('index');
    }

    public function actionLogin(){

        $request = Yii::$app->request;
        if( $request->isPost ){
            $model = Admin::find()->where(["Name"=>$request->post("LoginForm")["username"], "Password"=>$request->post("LoginForm")["password"]])->one();
            if( $model ){
                Yii::$app->session->set("admin", $model->Name);
                Yii::$app->session->set("admintype", $model->DepartNum);
                return $this->redirect("index.php?r=admin/default/index");
            }
        }
        return $this->renderPartial("login");
    }


    public function actionLogout()
    {
        Yii::$app->session->set("admin", "");
        return $this->redirect("index.php?r=admin/default/login");
    }

}
