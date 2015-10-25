<?php

namespace app\module\data\controllers;

use Yii;
use yii\web\Controller;
use app\module\data\models\BasicCase;
use app\module\data\models\Agency;
use app\module\data\models\Document;


class DefaultController extends Controller{

    public $enableCsrfValidation = false;
    public function actionCase(){

        return $this->render('case');
    }

    public function actionAddCase(){

        $model = new BasicCase();
        $request = Yii::$app->request;
        if($request->isGet){
            $key = $request->get("key");
            $model->$key = $request->get("v");
            if($model->save() ){
                echo $model->ID;
            }else{
                echo "defail";
            }
        }
    }

    public function actionUpdateCase(){

        $request = Yii::$app->request;
        if( $request->isGet ){
            $model = BasicCase::find()->where(["id"=>$request->get("id")])->one();
            $key = $request->get("key");
            $model->$key = $request->get("v");
            if( $model->save() ){
                echo "success";
            }else{
                echo "defail";
            }
        }
    }

    public function actionDel(){

        $request = Yii::$app->request;
       if($request->isGet){

            if($request->get("action") == "basic-case"){

                $model = BasicCase::find()->where("ID=:id", [":id"=>$request->get("id")])->one();

            }

            if($request->get("action") == "definition"){

                $model = Agency::find()->where("ID=:id", [":id"=>$request->get("id")])->one();

            }

            if($request->get("action") == "document"){

                $model = Document::find()->where("ID=:id", [":id"=>$request->get("id")])->one();

            }
            
            if($model->delete()){
                echo "success";
            }else{
                echo "defail";
            }

       }
    }


    public function actionDefinition(){

        $request = Yii::$app->request;
        switch( $request->get("department") ){
            case "assess":
                $type = "评估";
            break;

            case "identify":
                $type = "鉴定";
            break;

            case "auction":
                $type = "拍卖";
            break;

            case "project-cost":
                $type = "工程造价";
            break;

            case "bust":
                $type = "破产";
            break;

        }

        return $this->render("definition", ["departmentType"=>$type]);

    }

    public function actionAddDefinition(){

        $model = new Agency();
        $request = Yii::$app->request;
        if($request->isGet){
            $key = $request->get("key");
            $model->Type = $request->get("type");
            $model->$key = $request->get("v");
            if($model->save() ){
                echo $model->ID;
            }else{
                echo "defail";
            }
        }
    }

    public function actionUpdateDefinition(){

        $request = Yii::$app->request;
        if($request->isGet){
            $model = Agency::find()->where(["id"=>$request->get("id")])->one();
            $model->Type = $request->get("type");
            $key = $request->get("key");
            $model->$key = $request->get("v");
            if($model->save() ){
                echo "success";
            }else{
                echo "defail";
            }
        }
    }


    public function actionDocument(){

        return $this->render("document");
    }


    public function actionAddDocument(){

        $model = new Document();
        $request = Yii::$app->request;
        if($request->isGet){
            $key = $request->get("key");
            $model->DepartmentNumber = Yii::$app->user->identity->DepartmentNumber;
            $model->$key = $request->get("v");
            if($model->save() ){
                echo $model->ID;
            }else{
                echo "defail";
            }
        }
    }

    public function actionUpdateDocument(){

        $request = Yii::$app->request;
        if($request->isGet){
            $model = Document::find()->where(["id"=>$request->get("id")])->one();
            $model->DepartmentNumber = Yii::$app->user->identity->DepartmentNumber;
            $key = $request->get("key");
            $model->$key = $request->get("v");
            if($model->save() ){
                echo "success";
            }else{
                echo "defail";
            }
        }
    }

}
