<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class InputController extends Controller{

    public $layout = "input";

    public function actionIndex(){
        
        return $this->render("index");
    }


    //Assess add | edit | del |show
 
    public function actionAssess(){

        $assess_info = array();
        return $this->render("index", ["assess_info"=>$assess_info]);
    }

    public function actionAddAssess(){

        echo $this->renderPartial("edit/assess");
    }

    public function actionEditAssess(){

        echo $this->renderPartial("edit/assess");
    }

    //identify
    public function actionIdentify(){

        $identify_info = array();
        return $this->render("index", ["identify_info"=>$identify_info]);
    }

    public function actionAddIdentify(){

        echo $this->renderPartial("edit/identify");
    }

    public function actionEditIdentify(){

        echo $this->renderPartial("edit/identify");
    }


    //auction
    public function actionAuction(){

        $auction_info = array();
        return $this->render("index", ["auction_info"=>$auction_info]);
    }

    public function actionAddAuction(){

        echo $this->renderPartial("edit/auction");
    }

    public function actionEditAuction(){

        echo $this->renderPartial("edit/auction");
    }


    //project_cost
    public function actionProjectCost(){

        $project_cost_info = array();
        return $this->render("index", ["project_cost_info"=>$project_cost_info]);
    }

    public function actionAddProjectCost(){

        echo $this->renderPartial("edit/project-cost");
    }

    public function actionEditProjectCost(){

        echo $this->renderPartial("edit/project-cost");
    }

        //bust
    public function actionBust(){

        $bust_info = array();
        return $this->render("index", ["bust_info"=>$bust_info]);
    }

    public function actionAddBust(){

        echo $this->renderPartial("edit/bust");
    }

    public function actionEditBust(){

        echo $this->renderPartial("edit/bust");
    }

    //delete from id : assess, auction, bust, identify, project-cost
    public function actionDel($id){

    }


    //Import Excle
    public function actionImport(){

        echo $this->renderPartial("import");
        

    }

    //Print PDF Document to Windows
    public function actionPrint(){

        echo $this->renderPartial("print");
        
    }

    //Defining Advanced Search
    public function actionSearch(){

        echo $this->renderPartial("search");
        

    }

    public function actionSaveAs(){

        echo $this->renderPartial("save-as");
    }
        

}