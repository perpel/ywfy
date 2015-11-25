<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Output Excel
 */
class OutputExcel extends Model{

    public $type = 'Excel5'; // 'Excel2007'
    public $title = 'sheet1';
    public $filename = "人民法院委托案件电子管理系统";
    public $header;
    public $content;

    public function output(){

            // Create new PHPExcel object
            $objPHPExcel = new \PHPExcel();
            $objSheet = $objPHPExcel->setActiveSheetIndex(0);
            $col = 0;
            $row = 1;
            if ( isset($this->header) ){
                foreach( $this->header as $v ){
                    $cell = \PHPExcel_Cell::stringFromColumnIndex( $col ) . $row;
                    $objSheet->setCellValue( $cell, $v);
                    $col++;
                }
                $row++;
                $col = 0;
            }

            foreach ($this->content as $rowValue) {
                foreach ( $rowValue as $_v ) {
                    $cell = \PHPExcel_Cell::stringFromColumnIndex( $col ) . $row;
                    $objSheet->setCellValue( $cell, $_v);
                    $col++;
                }
                $row++;
                $col = 0;
            }

            // Rename worksheet
            $objPHPExcel->getActiveSheet()->setTitle( $this->title );
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $objPHPExcel->setActiveSheetIndex(0);
            $this->browserExport($this->type, $this->filename);
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, $this->type);
            $objWriter->save('php://output');
    }

    public function browserExport($type, $filename){

        if( $type == "Excel5" ){
            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        }else{
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        }
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');
            // If you're serving to IE over SSL, then the following may be needed
            header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0
    }

}