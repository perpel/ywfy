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
use app\module\data\models\Agency;
use app\models\Report;


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
            foreach( json_decode($request->post("data_obj")) as $_k=>$_v ){
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
            
            //$phpword = new PHPWord();
            //$phpword->replace( Yii::$app->basePath . '/web/template/' . $printObj["URL"] );

        }
        $this->layout = "weboffice";
        return $this->render("print-template", ["doc_id"=>$id, "url"=>$url, "ext"=>$ext]);
    }

    public function actionSavePrint(){

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


    public function actionFlowNumber(){

        $model_info = Conclusion::find()->select( "CaseNumber, Case")->asArray()->all();
        return $this->renderPartial("flow-number", [ "model_info"=>$model_info, "tid"=>Yii::$app->request->get("tid")] );
    }

    public function actionCase(){

        $model_info = BasicCase::find()->select( "Name")->asArray()->all();
        return $this->renderPartial("case", [ "model_info"=>$model_info, "tid"=>Yii::$app->request->get("tid")] );

    }

    public function actionAgency(){
        $model_info = Agency::find()->where(["Type"=>Yii::$app->request->get("type")])->asArray()->all();
        return $this->renderPartial("agency", [ "model_info"=>$model_info, "tid"=>Yii::$app->request->get("tid")] );
    }

    public function actionPrintDownload(){

        return Yii::$app->response->sendFile( Yii::$app->basePath . '/web/soft/WebOffice.rar');
    }

    public function actionGetCaseNumber(){

        $caseNumberPrefix = '浙义法委';
        $request = Yii::$app->request;
        if( $request->isGet ){
                $year = date("Y");
                $type = $request->get("type");
                $count = Conclusion::find()->where(["Year"=>$year, "Type"=>$type])->count() + 1;
                echo "(" . $year . ")" . $caseNumberPrefix . mb_substr($type, 0, 1, 'utf-8') . $count . "号";
        }

    }

    public function actionReport(){

        $model_info = Report::find()->where(["UID"=>Yii::$app->request->get("uid")])->asArray()->all();
        return $this->renderPartial("report", ["model_info"=>$model_info, "tid"=>Yii::$app->request->get("tid"), "uid"=>Yii::$app->request->get("uid")] );
    }

    public function actionReportTemplate(){

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

}