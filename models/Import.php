<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Import is the model behind the login form.
 */
class Import extends Model{

    public $path;
    public $JsonData;
    public $arrData;

    public function jsonExcel(){

        error_reporting(E_ALL);
        date_default_timezone_set('Asia/shanghai');
        $objPHPExcel = new \PHPExcel();
        $objReader = \PHPExcel_IOFactory::createReaderForFile( $this->path );
        $objPHPExcel = $objReader->load( $this->path );
        $objPHPExcel->setActiveSheetIndex(0);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $i = 0;
        foreach($objWorksheet->getRowIterator() as $row){

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            foreach($cellIterator as $cell){
                $value = $cell->getFormattedValue(); 
                $this->arrData[$i][] = $value;
            }
            $i++;
        }
        return  json_encode( $this->arrData );
    }

}