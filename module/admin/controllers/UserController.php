<?php

namespace app\module\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Personnel;
use app\module\register\models\Department;

class UserController extends Controller
{
    //public $layouts = "admin";

    public function actions(){

        if( !Yii::$app->session->get("admin") ){
            return $this->redirect("index.php?r=admin/default/login");
        }
    }

    public function actionUser(){

        $request = Yii::$app->request;
        
        if( $request->get("DepartmentNumber") ){

                $dept = $request->get("DepartmentNumber");

        }else{

               $dept = key(Department::courtList()); 

        }
        $users = Personnel::find()->where(["DepartmentNumber"=>$dept])->asArray()->all();
        $this->layout = "admin";
        return $this->render("index", ["model_info"=>$users, "dept"=>$dept]);
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