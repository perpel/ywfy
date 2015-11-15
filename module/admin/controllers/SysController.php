<?php

namespace app\module\admin\controllers;

use Yii;
use yii\web\Controller;
use app\module\input\models\Logs;
use yii\data\Pagination;
use app\module\register\models\Department;

class SysController extends Controller
{
    //public $layouts = "admin";

    public function actions(){

        if( !Yii::$app->session->get("admin") ){
            return $this->redirect("index.php?r=admin/default/login");
        }
    }

    public function actionLogs(){

        $request = Yii::$app->request;
        
        if( $request->get("Department") ){

                $dept = $request->get("Department");

        }else{

               $dept = key(Department::courtList()); 

        }

        $model_info = Logs::find()->where(["Department"=>$dept]);
        $pages = new Pagination(['totalCount' =>$model_info->count(), 'pageSize' => '200']);
        $logs = $model_info->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        $this->layout = "admin";
        return $this->render("index", ["logs"=>$logs, 'pages' => $pages, "dept"=>$dept]);
    }

    public function actionDepartment(){

        $model_info = Department::find()->asArray()->all();
        $this->layout = "admin";
        return $this->render("department", ["model_info"=>$model_info]);  
    }

}