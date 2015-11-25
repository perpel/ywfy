<?php

namespace app\module\input\controllers;

use Yii;
use yii\web\Controller;
use app\module\input\models\Document;
use app\module\input\models\DocumentTemplate;
use app\models\UploadForm;
use yii\web\UploadedFile;

class PrintController extends Controller{

    public $enableCsrfValidation = false;

    public function actionPrint(){
        $request = Yii::$app->request;
        $action = ucfirst($request->get("action"));
        $model_info = Document::find()->where("$action = 1")->asArray()->all();
        echo $this->renderPartial("print", ["model_info"=>$model_info]);
    }

    public function actionHasTemplate(){

        $request = Yii::$app->request;
        $id = $request->get('id');
        $printObj = DocumentTemplate::find()->where("DocumentID = $id")->one();
        if($printObj){
            echo "y";
            exit;
        }
        echo "n";

    }

    public function actionCreateTemplate(){

        $request = Yii::$app->request;
        $id = $request->get('id');
        $url = "/uploads/print/template/test.doc";
        $printObj = DocumentTemplate::find()->where("DocumentID = $id")->one();
        if($printObj){
            $url = $printObj->URL;
        }
        return $this->renderPartial("create-template", ["url"=>$url, "id"=>$id]);
    }

    public function actionSaveTemplate(){
        $request = Yii::$app->request;
        if( $request->isPost ){
            $model_upload = new UploadForm();
            $model_upload->file = UploadedFile::getInstanceByName('DocContent');
                if( $model_upload->validate() ){ 
                        $id = $request->get("id");
                        $model = DocumentTemplate::find()->where(["DocumentID" => $id])->one();
                        if(!$model){
                                $model = new DocumentTemplate();
                        }
                        
                        $model->DocumentID = $id;
                        $model->URL = "/uploads/print/template/test.doc";
                        $model->save();

                        $model->URL = "/uploads/print/template/" . $model->ID . ".doc";
                        $model->save();

                        $path = dirname(Yii::$app->basePath) . $model->URL;

                        if( $model_upload->file->saveAs($path) ){

                            echo "success";
                            exit;
                        }

                }else{
                    echo "failed";
                }
            }

    }


    public function actionPrintTemplate(){

        $request = Yii::$app->request;
        $id = $request->get('id');
        $data_id = $request->get('data_id');
        $printObj = DocumentTemplate::find()->where("DocumentID = $id")->one();
        $url = $printObj->URL;
        $action = $request->get("action");
        $className = "\\app\\module\\input\\models\\" . ucfirst( $action );
        $class = new \ReflectionClass( $className ); 
        $model  = $class->newInstanceArgs();
        $model_info = $model->find()->where(["ID"=>$data_id])->one();
        
        return $this->renderPartial("print-template", ["url"=>$url, "model_info"=>$model_info]);
    }

    /*public function actionSavePrint(){

        $request = Yii::$app->request;
        
        if( Yii::$app->request->isPost ){
           $model = new UploadForm();
            $model->file = UploadedFile::getInstanceByName('DocContent');
            
                if( $model->validate() ){ 
                        $name = "document" . $request->post("DocID");
                        $path = Yii::$app->basePath . '/web/template/' . $name . '.' . $model->file->extension;
                        if( $model->file->saveAs($path) ){
                            $docid = $request->post("DocID");
                            $obj = DocumentTemplate::find()->where("DocumentID = $docid")->one();
                            if($obj){
                                $obj->URL = $name . '.' . $model->file->extension;
                                $obj->save();

                            }else{
                                $m = new DocumentTemplate();
                                $m->DocumentID = $request->post("DocID");
                                $m->URL = $name . '.' . $model->file->extension;
                                $m->save();
                            }
                            echo "succeed";
                            exit();
                        }
                }else{
                    echo "failed";
                }
            }
    }
*/

}