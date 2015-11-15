<?php

namespace app\module\input\controllers;

use Yii;
use yii\web\Controller;
use app\module\input\models\Logs;
use app\models\OutputExcel;

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
        $footer = "<b>录入人：" . $this->operator . " | 录入时间：" . date("Y-m-d") . "</b>";
        $script = <<<JS
        $("#pop .pop-title", window.parent.document).html("<h3>{$this->_model->type}录入-操作:$this->operator</h3>");
        $("#pop .pop-footer", window.parent.document).html('$footer');
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
                    $script = 'window.parent.location.reload()';
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

        $footer = "<b>录入人：" . $inputMan . " | 录入时间：" . $inputDate . "</b><br>";
        $footer .= "<b>修改人：" . $this->operator . " | 修改时间：" . date("Y-m-d") . "</b>";
        $script = <<<JS
        $("#pop .pop-title", window.parent.document).html("<h3>{$model->type}修改[$model->FlowNumber]</h3>");
        $("#pop .pop-footer", window.parent.document).html('$footer');
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

}