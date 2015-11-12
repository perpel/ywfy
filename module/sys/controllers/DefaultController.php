<?php

namespace app\module\sys\controllers;

use Yii;
use yii\web\Controller;
use app\models\Personnel;
use app\module\input\models\Logs;

class DefaultController extends Controller
{
    
    public function actionPassword(){


        $script = <<<S

var data = '<input type="text" id="__pw"><input type="button" id="__subpw" value="修改">';
    var pop = $("#__pop").pop({_size:"customer", _width:"250px", _height:"55px", _top:"200px", _left:"400px"});
    $(".pop-content", pop).html(data);

    pop.on("click", "#__subpw", function(){

        var pw = pop.find("#__pw").val();
        $.get("./index.php?r=sys/default/edit-pw",{"pw":pw}, function(data){

            if(data == "success"){
                
                alert("成功");
                pop.remove();
            }
            if(data == "defail"){
                alert("修改密码失败");
            }
        });


    });


S;

        return $this->render("password", ["script"=>$script]);

    }

public function actionEditPw(){

$request = Yii::$app->request;
        if( $request->get("pw") ){
                $pw = $request->get("pw");

                $number = Yii::$app->user->identity->Number;

                $model = Personnel::find()->where(["Number"=>$number])->one();

                $model->Password = $pw;
                if( $model->save() ){
                    echo "success";
                }else{
                    echo "defail";
                }
        }

}


public function actionLogs(){

    $logs = Logs::find()->asArray()->all();
    return $this->render("logs", ["logs"=>$logs]);

}


}
