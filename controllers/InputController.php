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


    public function actionFlowNumber(){

        $model_info = Conclusion::find()->select( "CaseNumber, Case")->asArray()->all();
        return $this->renderPartial("flow-number", [ "model_info"=>$model_info] );
    }

    public function actionCase(){

        $model_info = BasicCase::find()->select( "Name,Remark")->asArray()->all();
        return $this->renderPartial("case", [ "model_info"=>$model_info] );

    }

}