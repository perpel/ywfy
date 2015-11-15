<?php

namespace app\module\sys\controllers;

use Yii;
use yii\web\Controller;
use app\models\Personnel;
use app\module\input\models\Logs;

class DefaultController extends Controller
{
    
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
