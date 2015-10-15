<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Conclusion;
use app\models\UploadForm;
use yii\web\UploadedFile;

class InputController extends Controller{

    public $layout = "input";
    public $enableCsrfValidation = false;

    public function behaviors(){

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'assess', 'identify', 'auction', 'project-cost', 'bust'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'assess', 'identify', 'auction', 'project-cost', 'bust'],
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function () {
                        
                        echo "<script>window.parent.location.assign('index.php?r=index/login');</script>";

                }
            ],
        ];
    }

    public function actionIndex(){
        
        return $this->render("index");
    }


    //Assess add | edit | del |show
 
    public function actionAssess(){

        $assess_info = Conclusion::find()->asArray()->all();
        return $this->render("index", ["assess_info"=>$assess_info]);
    }

    public function actionAddAssess(){

        $model = new Conclusion();
        $request = Yii::$app->request;
        if($request->isPost){

            if( $model->load($request->post()) && $model->save() ){

                return $this->redirect("index.php?r=input/assess");
                exit;
            }

        }
        $this->layout=false;
        return $this->render("edit/assess", ["model"=>$model, "type"=>"评估", "title"=>"新增"]);
    }

    public function actionEditAssess(){

        $request = Yii::$app->request;
         $model = Conclusion::find()->where("id=:id", [":id"=>$request->get("id")])->one();
       
        if($request->isPost){
            if( $model->load($request->post()) && $model->save() ){
                return $this->redirect("index.php?r=input/assess");
                exit;
            } 
        }

        echo $this->renderPartial("edit/assess", ["model"=>$model, "type"=>"评估",  "title"=>$request->get("id") . "修改"]);

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
    public function actionDel(){
        $request = Yii::$app->request;
       if($request->isGet){

            $model = Conclusion::find()->where("id=:id", [":id"=>$request->get("id")])->one();
            if($model->delete()){
                echo "success";
            }else{
                echo "defail";
            }

       }
    }


    //Import Excle
    public function actionImport(){

        if (Yii::$app->request->isPost) {

            $model = new Conclusion();
            $post_data = Yii::$app->request->post();
            
            foreach ( $post_data as $key => $value) {

                $model->$key = $value;
            }

            if( $model->validate() && $model->save() ){
                    echo "success";
            }else{
                    echo "defail";
            }
            exit;
        }
        
       echo $this->renderPartial("import");

    }

    //importList**********
    public function actionImportList(){

        $model = new UploadForm();

        if(Yii::$app->request->isPost){
            
            $model->file = UploadedFile::getInstanceByName('file');
            if ($model->validate()) { 

                $path = '../uploads/' . $model->file->baseName . '.' . $model->file->extension;
                $model->file->saveAs($path);
                
                error_reporting(E_ALL);
                date_default_timezone_set('Asia/shanghai');
                $objPHPExcel = new \PHPExcel();
                $objReader = \PHPExcel_IOFactory::createReaderForFile("../uploads/pg.xls");
                $objPHPExcel = $objReader->load("../uploads/pg.xls");
                $objPHPExcel->setActiveSheetIndex(0);
                $objWorksheet = $objPHPExcel->getActiveSheet();
                $arr = array();
                $i = 0;
                foreach($objWorksheet->getRowIterator() as $row){

                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);
                    foreach($cellIterator as $cell)
                    {

                        $value = $cell->getValue();
                        
                        if( $cell->getDataType() == \PHPExcel_Cell_DataType::TYPE_NUMERIC )
                        {  
                            /*
                            $cellstyleformat=$cell->getParent()->getStyle( $cell->getCoordinate() )->getNumberFormat();  
                            $formatcode=$cellstyleformat->getFormatCode();  

                            if (preg_match('/^(\[\$[A-Z]*-[0-9A-F]*\])*[hmsdy]/i', $formatcode)) {  

                                $value=gmdate("Y-m-d", \PHPExcel_Shared_Date::ExcelToPHP($value));  
                            }else{  

                                $value = \PHPExcel_Style_NumberFormat::toFormattedString($value,$formatcode);  
                            }  
*/
                            $value = date( "Y-m-d", \PHPExcel_Shared_Date::ExcelToPHP($value) );
                        }  
              
                        $arr[$i][] = $value;
                    }
                    $i++;
                }
                
                echo json_encode($arr);
                //echo $model->file->baseName . '.' . $model->file->extension;
                exit;
            }else{
                echo "error";
                exit;
            }

                
            
            
        }
        

    }

    //Print PDF Document to Windows
    public function actionPrint(){

        $model = new Conclusion();
        //return $this->render("index");

        return $this->renderPartial("print", ["model"=>$model]);
        
    }

    //Defining Advanced Search
    public function actionSearch(){

        echo $this->renderPartial("search");
        

    }

    public function actionSaveAs(){

        echo $this->renderPartial("save-as");
    }
        

}