<?php

namespace app\module\sybase\controllers;

use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $sel;
    public $content;
    public $type;

    public function actions(){

        $request = Yii::$app->request;
        if($request->isPost){
            $this->sel = $request->post("flow_number_src");
            $this->content = str_replace(" ", "%", $request->post("flow_search_val") );
            $this->type = $request->post("flow_number_type");
        }

    }


    public function actionIndex()
    {
        $request = Yii::$app->request;
        $tid = $request->get("tid");
        return $this->renderPartial('index', ["tid"=>$tid]);
    }


/*

    public function actionFlowNumber(){
        
        $request = Yii::$app->request;
        $tid = $request->get("tid", "");
        if($request->isPost){
            
            $condition = $this->getCondition($request->post("type"), $request->post("sed"));
            $val = preg_replace("/\s(?=\s)/","\\1",$request->post("val"));
            $val = str_replace(" ","%",$val);
            $where = [];
            foreach($condition as $con){
                $where[] = "$con LIKE '%$val%'";
            }
            $where = implode(" OR ", $where);
            switch($request->post("type")){
                case "执行":
                    $this->searchExcute($where);
                    break;
                    
                case "审判":
                    $this->searchTrial($where);
                    break;
            }
        }
        return $this->renderPartial("flow-number", ["tid"=>$tid]);
    }

    public function actionTest(){
        $where = "1=1";
        $sybase = new Sybase();
        $sybase->open("ZJZXGL", "sa", "ywpassed0579", "JHYW_ZXGL", "cp936");
        $sql = "SET RowCount 500 SELECT * FROM TEST";
        $sybase->query($sql);
        $sybase->echoJsonStr();
        $sybase->close();
        exit;
    }

    protected function searchExcute($where){
        $sybase = new Sybase();
        $sybase->open("ZJZXGL", "sa", "ywpassed0579", "JHYW_ZXGL", "cp936");
        $sql = "SET RowCount 500 SELECT AH,SJAY FROM AJJB WHERE $where";
        $sybase->query($sql);
        $sybase->echoJsonStr();
        $sybase->close();
        exit;
    }

    protected function searchTrial($where){
        $sybase = new Sybase();
        $sybase->open("msrv", "sa", "", "ecourt_2009", "cp936");
        $sql = "SET RowCount 500 SELECT AH,AYMS FROM EAJ WHERE $where";
        $sybase->query($sql);
        $sybase->echoJsonStr();
        $sybase->close();
        exit;
    }
    
    protected function getCondition($type, $sed){
        
        $where = [
        
            "审判"=>[
                
                "原审案号"=>["AH"],
                "案由"=>["AYMS"],
                //"当事人"=>["DSR"],
                //"督办人"=>["LARQ"],
                //"承办人"=>["AYMS"],

            ],
            "执行"=>[
                
                "原审案号"=>["AH"],
                "案由"=>["SJAY"],
                //"当事人"=>[],
                //"督办人"=>[],
                //"承办人"=>[],
            
            ],
            
        ];
        
        return $where[$type][$sed];
            
            
    }

*/
}
