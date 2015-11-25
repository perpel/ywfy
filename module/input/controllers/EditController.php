<?php

namespace app\module\input\controllers;

use Yii;
use yii\web\Controller;
use app\module\input\models\Logs;
use app\models\OutputExcel;
use app\models\UploadForm;
use yii\web\UploadedFile;

class EditController extends Controller{

    public $enableCsrfValidation = false;
    public $_model;
    public $operator;
    public $depart_id;

    public function actions(){

        $request = Yii::$app->request;
        $className = "\\app\\module\\input\\models\\" . ucfirst( $request->get("action") );
        $class = new \ReflectionClass( $className ); 
        $this->_model  = $class->newInstanceArgs();
        $this->operator = Yii::$app->user->identity->Name;
        $this->depart_id = Yii::$app->user->identity->DepartmentNumber;

    }

    public function actionAdd(){

        $request = Yii::$app->request;
        $date = date("Y-m-d");
        $script = <<<JS
        $("#pop .pop-title", parent.document).html("{$this->_model->type}录入-操作:$this->operator");
        $("#pop .pop-footer", parent.document).html('<b>录入人：</b>{$this->operator} |<b> 录入时间：</b>{$date} | <input type="submit" value="提交" id="edit_submit">');   
        $("#edit_submit", parent.document).click(function(){
                $("#edit_pop_iframe", parent.document).contents().find("form").submit();
        });  
JS;
        $model = $this->_model;
        if($request->isPost){
            $model->Type = $model->type;
            $model->DepartID = $this->depart_id;
            if( $model->load( $request->post() ) && $model->save() ){
                    //insert logs
                    $logs = new Logs();
                    $logs->FlowNumber = $model->FlowNumber;
                    $logs->InputMan = $this->operator;
                    $logs->InputDate = date("Y-m-d G:i:s");
                    $logs->CtrlType = "添加";
                    $logs->Department = $this->depart_id;
                    $logs->save();
                    $script = 'parent.location.reload()';
            }
        }
        $this->layout = "edit";
        return $this->render($request->get("action"), ["model"=>$model, "script"=>$script, "utype"=>$model->type]);
    }

    //edit
    public function actionEdit(){

        $request = Yii::$app->request;
        $model = $this->_model->find()->where("id=:id", [":id"=>$request->get("id")])->one();
        //get insert man
        $logObj = Logs::find()->where([ "FlowNumber" => $model->FlowNumber, "CtrlType"=>"添加" ])->orderBy('ID DESC')->one();
        $inputMan = $logObj->InputMan;
        $inputDate = $logObj->InputDate;
        $date = date("Y-m-d");
        $script = <<<JS
        $("#pop .pop-title", window.parent.document).html("{$model->type}修改：$model->FlowNumber");
        $("#pop .pop-footer", parent.document).html('<b>录入人</b>：{$this->operator} |<b> 录入时间：</b>{$inputDate} |<b>修改人</b>：{$this->operator} |<b> 修改时间：</b>{$date} | <input type="submit" value="提交" id="edit_submit">');   
        $("#edit_submit", parent.document).click(function(){
                $("#edit_pop_iframe", parent.document).contents().find("form").submit();
        });
JS;
        if($request->isPost){
            $model->Type = $model->type;
            $model->DepartID = $this->depart_id;
            if( $model->load( $request->post() )  && $model->save()  ){

                    $logs = new Logs();
                    $logs->FlowNumber = $model->FlowNumber;
                    $logs->InputMan = $this->operator;
                    $logs->InputDate = date("Y-m-d G:i:s");
                    $logs->CtrlType = "修改";
                    $logs->Department = $this->depart_id;
                    $logs->save();

                    $script = 'window.parent.location.reload()';
            }
        }
        $this->layout = "edit";
        return $this->render( $request->get("action"), ["model"=>$model, "script"=>$script, "utype"=>$model->type ] );

    }

    //delete from id : assess, auction, bust, identify, project-cost
    public function actionDel(){
        $request = Yii::$app->request;
        if($request->isGet){
            $model = $this->_model->find()->where("ID=:id", [":id"=>$request->get("id")])->one();
            if( $model && $model->delete()){
                $logs = new Logs();
                $logs->FlowNumber = $model->FlowNumber;
                $logs->InputMan = $this->operator;
                $logs->InputDate = date("Y-m-d G:i:s");
                $logs->Department = $this->depart_id;
                $logs->CtrlType = "删除";
                $logs->save();
                echo "success";
            }else{
                echo "defail";
            }
        }
    }


    public function actionGetCaseNumber(){

        $caseNumberPrefix = Yii::$app->session->get("FLOWNUMBER");
        $request = Yii::$app->request;
        if( $request->isGet ){
                $year = date("Y");
                $type = $this->_model->type;
                $i = 1;
                while($i){
                    $flow_number = "(" . $year . ")" . $caseNumberPrefix . mb_substr($type, 0, 1, 'utf-8') . $i . "号";
                    if( !$this->_model->find()->where(["FlowNumber"=>$flow_number])->one() ){
                            break;
                    }
                    $i++;
                }
                echo $flow_number;
        }

    }

    //另存为
    public function actionSaveAs(){
        $request = Yii::$app->request;
        if( $request->isPost ){
            $cache = Yii::$app->cache;
            $excelObj = new OutputExcel();
            $excelObj->filename = $request->post("_filename");
            $excelObj->title = $request->post("_title");
            $excelObj->type = $request->post("_type");
            $excelObj->header = $this->_model->tableTh();
            $excelObj->content = $cache->get( "excel_main" );
            $excelObj->output();
            exit;
        }
        echo $this->renderPartial("save-as", ["type"=>$this->_model->type, "action"=>$request->get("action") ]);
    }


    public function actionImport(){

            $model = new UploadForm();
            $request = Yii::$app->request;
            $arr = [];
            if($request->isPost){
                    $model->file = UploadedFile::getInstanceByName('file');
                    if ($model->validate()) { 
                            $path = dirname(Yii::getAlias('@app')) . '/uploads/' . $this->depart_id . 'import.' . $model->file->extension;
                            $model->file->saveAs($path);
                            error_reporting(E_ALL);
                            date_default_timezone_set('Asia/shanghai');
                            $objPHPExcel = new \PHPExcel();
                            $objReader = \PHPExcel_IOFactory::createReaderForFile($path);
                            $objPHPExcel = $objReader->load($path);
                            $objPHPExcel->setActiveSheetIndex(0);
                            $objWorksheet = $objPHPExcel->getActiveSheet();
                            $i = 0;
                            foreach($objWorksheet->getRowIterator() as $row){
                                    $cellIterator = $row->getCellIterator();
                                    $cellIterator->setIterateOnlyExistingCells(false);
                                    foreach($cellIterator as $cell){
                                        $value = $cell->getFormattedValue(); 
                                        $arr[$i][] = $value;
                                    }
                                    $i++;
                            }
                    }
        }

        $script = <<<JS
        $("#pop .pop-title", window.parent.document).html("{$this->_model->type}导入");
        $("#footer").append('<input type="button" name="delColSelected" value="删除选定列">   | ');
        $("#footer").append('<input type="button" name="delRowSelected" value="删除选定行">  | ');
        $("#footer").append('<input type="button" name="cleanColSelected" value="清除选定列">  | ');
        $("#footer").append('<input type="text" name="ACol" size="3">O<input type="text" name="BCol" size="3"><input type="button" name="DH" value="倒换"> |');
        $("#footer").append('<input type="text" id="yy" size="4"><input type="button" name="setYear" value="设置年份"> |');
JS;
        $this->layout = "edit";
        return $this->render("import", ["model"=>$this->_model, "script"=>$script, "excel"=>$arr, "action"=>$request->get("action") ]);
    }


    public function actionImportAdd(){

        $request = Yii::$app->request;
        $model = $this->_model;
        if($request->isPost){
            $model->Type = $model->type;
            $model->DepartID = $this->depart_id;
            foreach( $request->post("data") as $k=>$v){
                    $model->$k = $v;
            }
            if( $model->save() ){
                    //insert logs
                    $logs = new Logs();
                    $logs->FlowNumber = $model->FlowNumber;
                    $logs->InputMan = $this->operator;
                    $logs->InputDate = date("Y-m-d G:i:s");
                    $logs->CtrlType = "添加";
                    $logs->Department = $this->depart_id;
                    $logs->save();
                    echo "success";
            }else{
                echo "defail";
            }
        }

    }

}