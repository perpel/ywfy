<?php
namespace app\models;

use PhpOffice\PhpWord\Autoloader;  
use PhpOffice\PhpWord\Settings;  
use PhpOffice\PhpWord\IOFactory;  

Autoloader::register();  
Settings::loadConfig(); 


class PHPWord{

    public function replace($url){

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($url);  
        $templateProcessor->setValue('[456]', '姓名');  
        $templateProcessor->setValue('zw1', '公务员');  
        $templateProcessor->setValue('sfz1', '360281199909090009');  
        $templateProcessor->setValue('gz1', '统发');  
        //$templateProcessor->setValue('Street', 'Coming-Undone-Street 32');  
        $templateProcessor->saveAs($url); 
    }

}
 