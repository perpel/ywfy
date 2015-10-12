<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Detail;
use app\models\UploadForm;
use yii\web\UploadedFile;

class InputController extends Controller{

    public $layout = "input";
    public $enableCsrfValidation = false;

    public function actionIndex(){
        
        return $this->render("index");
    }


    //Assess add | edit | del |show
 
    public function actionAssess(){

        $assess_model = new Detail;
        echo "<pre>";
        var_dump($assess_model->attributeLabels());
        echo "<pre>";
        exit;
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

        if (Yii::$app->request->isPost) {

            
        }
        
       echo $this->renderPartial("import");

    }

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