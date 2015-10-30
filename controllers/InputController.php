<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\Conclusion;
use app\models\Import;
use app\models\OutputExcel;
use app\module\data\models\BasicCase;
use app\module\data\models\Document;
use app\models\DocumentTemplate;
use app\models\PHPWord;

class InputController extends Controller{

    public $enableCsrfValidation = false;
     
    //导入功能
    public function actionImport(){
        $request = Yii::$app->request;
        $className = "\\app\\module\\" .  $request->get("module") . "\\models\\" . ucfirst( $request->get("action") );
        $class = new \ReflectionClass( $className ); 
        $model  = $class->newInstanceArgs();
        $script = "";
        if( $request->isPost ){
            $model->Type = $model->type;
            $model->ModuleType = $model->module_type;
            $model->DepartID = Yii::$app->user->identity->DepartmentNumber;
            $model->Year = date("Y");
            foreach( $request->post("data_obj") as $_k=>$_v ){
                $model->$_k = $_v;
            }
           //var_dump( $model );exit;
            if( $model->save() ){
                    echo "success";
                    exit();
            }else{
                    echo "defail";
                    exit();
            }
        }
        $this->layout = "import";
        echo $this->render("import", ["model"=>$model, "script"=>$script, "module"=>$request->get("module") ]);
    }

    public function actionImportList(){
        $model = new UploadForm();
        if( Yii::$app->request->isPost ){
           
                $model->file = UploadedFile::getInstanceByName('file');
                if( $model->validate() ){ 
                        $name = Yii::$app->user->identity->Number;
                        $path = Yii::$app->basePath . '/uploads/' . $name . '.' . $model->file->extension;
                        if( $model->file->saveAs($path) ){
                            $import = new Import();
                            $import->path = $path;
                            echo $import->jsonExcel();
                            exit();
                        }
                }
                echo "error";
                exit();
            }
        $this->layout = false;
    }

    //另存为
    public function actionSaveAs(){

        $request = Yii::$app->request;
        $className = "\\app\\module\\" .  $request->get("module") . "\\models\\" . ucfirst( $request->get("action") );
        $class = new \ReflectionClass( $className ); 
        $model  = $class->newInstanceArgs();
        if( $request->isPost ){
            $cache = Yii::$app->cache;
            $cache_name = Yii::$app->user->identity->Number . "data";
            $excelObj = new OutputExcel();
            $excelObj->filename = $request->post("_filename");
            $excelObj->title = $request->post("_title");
            $excelObj->type = $request->post("_type");
            $excelObj->header = $model->attributeLabels();
            $excelObj->content = $cache->get( $cache_name );
            $excelObj->output();
            exit;
        }
        echo $this->renderPartial("save-as", ["type"=>$model->type, "action"=>$request->get("action"), "module"=>$request->get("module") ]);
    }

    //search
    public function actionSearch(){
        $request = Yii::$app->request;
        echo $this->renderPartial("search", ["module"=>$request->get("module"), "action"=>$request->get("action")]);
    }

    public function actionPrint(){
        $request = Yii::$app->request;
        $action = ucfirst($request->get("action"));
        $model_info = Document::find()->where("$action = 1")->asArray()->all();
        echo $this->renderPartial("print", ["model_info"=>$model_info]);
    }


    public function actionPrintTemplate(){

        $request = Yii::$app->request;
        $id = $request->get('id');
        $printObj = DocumentTemplate::find()->where("DocumentID = $id")->asArray()->one();
        $url = "";
        $ext = "doc";
        if($printObj){
            $url =  $request->getHostInfo() . $request->getBaseUrl() . "/template/" . $printObj["URL"];
            $ext = end(explode(".", $url));
            
            $phpword = new PHPWord();
            $phpword->replace( Yii::$app->basePath . '/web/template/' . $printObj["URL"] );

        }
        echo $this->renderPartial("print-template", ["doc_id"=>$id, "url"=>$url, "ext"=>$ext]);
    }

    public function actionSavePrint(){

        $request = Yii::$app->request;
        
        if( Yii::$app->request->isPost ){
           $model = new UploadForm();
            $model->file = UploadedFile::getInstanceByName('AipFile');
            
                if( $model->validate() ){ 
                        $name = "document" . $request->post("template");
                        $path = Yii::$app->basePath . '/web/template/' . $name . '.' . $model->file->extension;
                        if( $model->file->saveAs($path) ){
                            $docid = $request->post("template");
                            $obj = DocumentTemplate::find()->where("DocumentID = $docid")->one();
                            if($obj){
                                $obj->URL = $name . '.' . $model->file->extension;
                                $obj->save();

                            }else{
                                $m = new DocumentTemplate();
                                $m->DocumentID = $request->post("template");
                                $m->URL = $name . '.' . $model->file->extension;
                                $m->save();
                            }
                            echo "success";
                            exit();
                        }
                }else{
                    echo "defail";
                }
            }
    }


    public function actionFlowNumber(){

        $model_info = Conclusion::find()->select( "CaseNumber, Case")->asArray()->all();
        return $this->renderPartial("flow-number", [ "model_info"=>$model_info, "tid"=>Yii::$app->request->get("tid")] );
    }

    public function actionCase(){

        $model_info = BasicCase::find()->select( "Name")->asArray()->all();
        return $this->renderPartial("case", [ "model_info"=>$model_info, "tid"=>Yii::$app->request->get("tid")] );

    }

    public function actionPrintDownload(){

        return Yii::$app->response->sendFile( Yii::$app->basePath . '/web/soft/WebOffice.rar');
    }

}