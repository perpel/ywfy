<?php

namespace app\module\input\controllers;

use Yii;
use yii\web\Controller;
use app\module\input\models\Report;
use app\models\UploadForm;
use yii\web\UploadedFile;

class ReportController extends Controller{

    public $enableCsrfValidation = false;

     public function actionShow(){
        $uid = Yii::$app->request->get("uid");
        $type = Yii::$app->request->get("type");
        $model_info = Report::find()->where(["UID"=>$uid, "Type"=>$type])->asArray()->all();
        return $this->renderPartial("show", [
            "model_info"=>$model_info, 
            "type"=>$type, 
            "uid"=>$uid
        ]);
    }

    public function actionTemplate(){

        $request = Yii::$app->request;
        $id = $request->get("id");
        $uid = $request->get("uid");
        $type = $request->get("type");
        $name = urlencode($request->get("name"));
        if( $id == 0 ){
            $action = "add";
            return $this->renderPartial( $action, ["uid"=>$uid, "type"=>$type, "name"=>$name ]);
        }else{
            $action = "report";
            $model = Report::find()->where(["ID"=>$request->get("id")])->one();
            $path = $model->URL . "/" . $model->ID . '.doc';
            return $this->renderPartial( $action, ["uid"=>$uid, "type"=>$type, "name"=>$name, "id"=>$id, "path"=>$path ]);
        }
        
    }

    public function actionAdd(){

        $request = Yii::$app->request;
        if( Yii::$app->request->isPost ){
            $model_upload = new UploadForm();
            //var_dump($_FILES);
            $model_upload->file = UploadedFile::getInstanceByName('DocContent');   
           if( $model_upload->validate() ){
                $model = new Report();
                $model->UID = $request->get("uid");
                $name = urldecode($request->get("name"));
                $name = iconv( "gb2312", "utf-8", $name);
                $model->Name = $name . "." . $model_upload->file->extension;
                $model->Type = $request->get("type");
                if( $model->save() ){

                    $path = "/uploads/report/" . $model->Type . "/" . $model->UID;
                    $model_info = Report::find()->where(["ID"=>$model->ID])->one();
                    $model_info->URL = $path;
                    $model_info->save();
                    
                    if( !file_exists( dirname(Yii::getAlias('@app')). $path) ){
                        //echo dirname(Yii::getAlias('@app')). $path;exit;
                        mkdir( dirname(Yii::getAlias('@app')) . $path );
                    }

                    $filename = dirname(Yii::getAlias('@app')). $path . "/" . $model->ID . '.'  . $model_upload->file->extension;
                    if( $model_upload->file->saveAs( $filename ) ){
                            echo "success";
                            exit;
                    }
                }
            }
       }
        echo "failed";
    }

    public function actionEdit(){

        $request = Yii::$app->request;
        if( Yii::$app->request->isPost ){
            $model_upload = new UploadForm();
            //var_dump($_FILES);
            $model_upload->file = UploadedFile::getInstanceByName('DocContent');   
           if( $model_upload->validate() ){

                    $model = Report::find()->where(["ID"=>$request->get("id")])->one();
                    $path = "/uploads/report/" . $model->Type . "/" . $model->UID;
                    $filename = dirname(Yii::getAlias('@app')). $path . "/" . $model->ID . '.'  . $model_upload->file->extension;
                    if( $model_upload->file->saveAs( $filename ) ){
                            echo "success";
                            exit;
                    }
                }
            }
        echo "failed";
    }

    public function actionDownOffice(){

        return Yii::$app->response->sendFile( Yii::$app->basePath . '/web/software/OfficeControl.rar');
    }




/*public function actionReportTemplate(){

        $request = Yii::$app->request;
        $id = $request->get('id');
        $uid = $request->get("uid");
        $name = $request->get("name");
        $url = "";
        $ext = "doc";
        if($id != 0){
            $reportObj = Report::find()->where("ID = $id")->asArray()->one();
            $url =  dirname($request->getHostInfo() . $request->getBaseUrl())  . "/uploads/" . $request->get('uid') . "/" . $reportObj["URL"];
            $ext = end(explode(".", $reportObj["URL"]));
        }
        $this->layout = "weboffice";
        return $this->render("report-template", ["id"=>$id, "name"=>$name, "uid"=>$uid, "url"=>$url, "ext"=>$ext]);
    }

    public function actionSaveReport(){

        $request = Yii::$app->request;
        if( Yii::$app->request->isPost ){
            $model = new UploadForm();
            $model->file = UploadedFile::getInstanceByName('DocContent');   
            if( $model->validate() ){
                    $id = $request->get('id');
                    if( $id == 0 ){
                        $m = new Report();
                        $m->UID = $request->post("DocID");
                        $m->Name = $request->post("DocTitle");
                        $m->save();
                        $id = $m->ID;
                    }
                    $m = null;
                    $obj = Report::find()->where("ID = $id")->one();
                    $name = "report" . $id . '.'  . $model->file->extension;
                    $obj->URL = $name;
                    $path = Yii::getAlias('@app')  . "/uploads/" . $request->post('DocID');
                    if( !file_exists($path) ){
                        mkdir( $path, 0777, true);
                        chmod( $path, 0777);
                    }
                    $path = $path . "/" . $name;
                    if($model->file->saveAs($path)){
                        $obj->save();
                        echo "succeed";
                    }else{
                        echo "failed";
                    }
            }
        }
    }
*/




}