<?php

namespace app\module\sys\controllers;
use Yii;
use yii\web\Controller;
use app\models\Personnel;

class DefaultController extends Controller{

    public $enableCsrfValidation = false;

    public function actionUser(){

        $model = new Personnel();

        return $this->render("user", ["model"=>$model]);
    }

   public function actionAddUser(){

        $model = new Personnel();
        $request = Yii::$app->request;
        if($request->isGet){
            $key = $request->get("key");
            $model->$key = $request->get("v");
            $model->DepartmentNumber = $request->get("depart_num");
            if($model->save() ){
                echo $model->ID;
            }else{
                echo "defail";
            }
        }
    }

    public function actionUpdateUser(){

        $request = Yii::$app->request;
        if( $request->isGet ){
            $model = Personnel::find()->where(["id"=>$request->get("id")])->one();
            $key = $request->get("key");
            $model->$key = $request->get("v");
            if( $model->save() ){
                echo "success";
            }else{
                echo "defail";
            }
        }
    }

    public function actionDelUser(){

       $request = Yii::$app->request;
       if($request->isGet){
            $model = Personnel::find()->where("ID=:id", [":id"=>$request->get("id")])->one();
            if($model->delete()){
                echo "success";
            }else{
                echo "defail";
            }
       }

    }
    
}
