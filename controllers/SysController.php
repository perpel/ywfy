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
use app\models\Personnel;

class SysController extends Controller{

    public $layout = "sys";
    public $enableCsrfValidation = false;

    public function actionUser(){


        return $this->render("user");
    }

    public function actionAddUser(){

        $model = new Personnel();

        $request = Yii::$app->request;

        if($request->isPost){

            if( $model->load($request->post()) && $model->save() ){

                return $this->redirect("index.php?r=sys/user");
                exit;
            }
        }

        echo $this->renderPartial("add-user", ["model"=>$model]);
    }

    public function actionUserDel(){

        $request = Yii::$app->request;
        if($request->isGet){

            $res = Personnel::deleteAll("Number=:num", array(":num"=>$request->get("num")));
            if($res){
                echo "success";
            }else{
                echo "defail";
            }

        }

        

    }

    public function actionExportExcel(){

        $objPHPExcel = new \PHPExcel();

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        // 从浏览器直接输出$filename
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header("Content-Disposition:attachment;filename=123.xls");
        header("Content-Transfer-Encoding:binary");
        $objWriter->save("php://output"); 

    }

    public function actionPrint(){

    
            $users = Personnel::find()->all();

            // create new PDF document
            //$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf = new \TCPDF('P', 'mm', 'A4', true, 'UTF-8', false); 



            // 设置页眉和页脚字体 
            $pdf->setHeaderFont(Array('stsongstdlight', '', '10')); 
            $pdf->setFooterFont(Array('helvetica', '', '8')); 


            // set default header data
            $pdf->SetHeaderData("", "", "身份证号码".' 061', "hahaha");

            // set header and footer fonts
            //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            //$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            

            // set margins
            //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // set font
            $pdf->SetFont('stsongstdlight', '', 10);

            // add a page
            $pdf->AddPage('L', 'A4');

$html=<<<EOF

<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<style>
*{

    margin:0;
    padding:0;
}

            div{
                width: 100%;
                background-color:lightgreen;
            }
    
            </style>
</head>

<body>


  <div>
     <h1>义乌市人民法院</h1>
            <table>
             
                <thead>
                <tr>
                <th>序号</th>
                <th>登录名</th>
                <th>登录密码</th>
                <th>姓名</th>
                <th>性别</th>
                <th>学历</th>
                <th>身份证号码</th>
                <th>部门</th>
                <th>职务</th>
                <th>联系电话</th>
                <th>手机</th>
                <th>备注</th>
                </tr>
                <thead>

      
EOF;


                  
                    foreach($users as $k => $v){

                            $html .=  "<tr>";
                            $html .= "<td>" . $v->ID . "</td>";
                            $html .= "<td>" . $v->Number . "</td>";
                            $html .= "<td>" . $v->Password . "</td>";
                            $html .= "<td>" . $v->Name . "</td>";
                            $html .= "<td>" . $v->Sex . "</td>";
                            $html .= "<td>" . $v->Education . "</td>";
                            $html .= "<td>" . $v->IDNumber . "</td>";
                            $html .= "<td>" . $v->DepartmentNumber . "</td>";
                            $html .= "<td></td>";
                            $html .= "<td>" . $v->TelNumber . "</td>";
                            $html .= "<td>" . $v->CellNumber . "</td>";
                            $html .= "<td>" . $v->Remarks . "</td>";
                            $html .= "</tr>";

                    }
 
 $html .= "</table></div>身份证号码</body></html>";              

            


            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            // reset pointer to the last page
            $pdf->lastPage();

            // ---------------------------------------------------------

            //Close and output PDF document
            $pdf->Output('example_061.pdf', 'I');


       
    }


    
}