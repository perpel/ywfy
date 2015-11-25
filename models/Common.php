<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Common extends Model{

    public static function years( $start_date, $end_date ){

        $startDate =  intval( $start_date );
        $endDate = intval( $end_date );
        $dateArr = [];
        while( $startDate >=  $endDate ){
            $dateArr[ $startDate ] = $startDate;
            $startDate--;
        }
        return $dateArr;
    }

     public static function PrincipalDepartment(){
        return [
            ""=>"选择委托部门 ",
            "东阳法院"=>"东阳法院",
            "佛堂"=>"佛堂",
            "佛堂庭"=>"佛堂庭",
            "黄欢"=>"黄欢",
            "季东勤"=>"季东勤",
            "季文超"=>"季文超",
            "简二庭"=>"简二庭",
            "简一庭"=>"简一庭",
            "骆巧梅"=>"骆巧梅",
            "民二庭"=>"民二庭",
            "民三"=>"民三",
            "民三庭"=>"民三庭",
            "民一庭"=>"民一庭",
            "上溪庭"=>"上溪庭",
            "绍兴法院"=>"绍兴法院",
            "苏溪庭"=>"苏溪庭",
            "吴新辉"=>"吴新辉",
            "项孟进"=>"项孟进",
            "行政庭"=>"行政庭",
            "巡回庭"=>"巡回庭",
            "知识产权庭"=>"知识产权庭",
            "执和行庭"=>"执和行庭",
            "执行局"=>"执行局",
            "执行庭"=>"执行庭",
            "诸暨法院"=>"诸暨法院",
            "廿二里庭"=>"廿二里庭",
            "廿三法庭"=>"廿三法庭",
            "廿三里"=>"廿三里",
            "廿三里庭"=>"廿三里庭",

        ];
    }

     public static function selectedMode(){
        return [
            ""=>"选择方式",
            "随机"=>"随机",
            "指定"=>"指定",
            "招标"=>"招标",
        ];
    }

    

}