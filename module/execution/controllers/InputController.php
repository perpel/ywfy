<?php

namespace app\module\execution\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\module\execution\models\Assess;
use app\module\execution\models\Identify;
use app\module\execution\models\Auction;
use app\module\execution\models\Projectcost;
use app\module\execution\models\Bust;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\Conclusion;
use app\models\Import;
use app\models\OutputExcel;

class InputController extends Controller{
    public $enableCsrfValidation = false;
    //Assess add | edit | del |show
    public function actionAssess(){

        $request = Yii::$app->request;
        $assess_model = new Assess();
        $where = ["ModuleType"=>"执行", "Type"=>"评估"];
        $y = $request->get("year", "all");
        if( null !== $request->get("year") && "all" != $request->get("year")){
          $where["Year"] = $request->get("year");
        }

        if( $request->isPost ){
            $y = $request->post("Year");
            foreach( $request->post() as $k=>$v ){
                if( $v == ""){
                    continue;
                }
                if( $k == "Year" && $v == "all"){
                    continue;
                }
                $arr = ["like", $k, $v];
                $andwhere[] = $arr;
            }
        }
        
        $assess_info = Assess::find()->where($where);

        if( !empty($andwhere) ){
            foreach ($andwhere as $value) {
                $assess_info = $assess_info->andWhere($value);
            }
        }

        $assess_info = $assess_info->asArray()->all();
        return $this->render("index", ["model"=>$assess_model, "model_info"=>$assess_info, "y"=>$y]);
    }

    //identify
    public function actionIdentify(){

        $request = Yii::$app->request;
        $assess_model = new Identify();
        $where = ["ModuleType"=>"执行", "Type"=>"鉴定"];
        $y = $request->get("year", "all");
        if( null !== $request->get("year") && "all" != $request->get("year")){
          $where["Year"] = $request->get("year");
        }

        if( $request->isPost ){
            $y = $request->post("Year");
            foreach( $request->post() as $k=>$v ){
                if( $v == ""){
                    continue;
                }
                if( $k == "Year" && $v == "all"){
                    continue;
                }
                $arr = ["like", $k, $v];
                $andwhere[] = $arr;
            }
        }
        
        $assess_info = Identify::find()->where($where);

        if( !empty($andwhere) ){
            foreach ($andwhere as $value) {
                $assess_info = $assess_info->andWhere($value);
            }
        }

        $assess_info = $assess_info->asArray()->all();
        return $this->render("index", ["model"=>$assess_model, "model_info"=>$assess_info, "y"=>$y]);
    }


    //auction
    public function actionAuction(){

        $request = Yii::$app->request;
        $assess_model = new Auction();
        $where = ["ModuleType"=>"执行", "Type"=>"拍卖"];
        $y = $request->get("year", "all");
        if( null !== $request->get("year") && "all" != $request->get("year")){
          $where["Year"] = $request->get("year");
        }

        if( $request->isPost ){
            $y = $request->post("Year");
            foreach( $request->post() as $k=>$v ){
                if( $v == ""){
                    continue;
                }
                if( $k == "Year" && $v == "all"){
                    continue;
                }
                $arr = ["like", $k, $v];
                $andwhere[] = $arr;
            }
        }
        
        $assess_info = Auction::find()->where($where);

        if( !empty($andwhere) ){
            foreach ($andwhere as $value) {
                $assess_info = $assess_info->andWhere($value);
            }
        }

        $assess_info = $assess_info->asArray()->all();
        return $this->render("index", ["model"=>$assess_model, "model_info"=>$assess_info, "y"=>$y]);
    }


    //project_cost
    public function actionProjectcost(){

        $request = Yii::$app->request;
        $assess_model = new Projectcost();
        $where = ["ModuleType"=>"执行", "Type"=>"工程造价"];
        $y = $request->get("year", "all");
        if( null !== $request->get("year") && "all" != $request->get("year")){
          $where["Year"] = $request->get("year");
        }

        if( $request->isPost ){
            $y = $request->post("Year");
            foreach( $request->post() as $k=>$v ){
                if( $v == ""){
                    continue;
                }
                if( $k == "Year" && $v == "all"){
                    continue;
                }
                $arr = ["like", $k, $v];
                $andwhere[] = $arr;
            }
        }
        
        $assess_info = Projectcost::find()->where($where);

        if( !empty($andwhere) ){
            foreach ($andwhere as $value) {
                $assess_info = $assess_info->andWhere($value);
            }
        }

        $assess_info = $assess_info->asArray()->all();
        return $this->render("index", ["model"=>$assess_model, "model_info"=>$assess_info, "y"=>$y]);
    }

        //bust
    public function actionBust(){

        $request = Yii::$app->request;
        $assess_model = new Bust();
        $where = ["ModuleType"=>"执行", "Type"=>"破产"];
        $y = $request->get("year", "all");
        if( null !== $request->get("year") && "all" != $request->get("year")){
          $where["Year"] = $request->get("year");
        }

        if( $request->isPost ){
            $y = $request->post("Year");
            foreach( $request->post() as $k=>$v ){
                if( $v == ""){
                    continue;
                }
                if( $k == "Year" && $v == "all"){
                    continue;
                }
                $arr = ["like", $k, $v];
                $andwhere[] = $arr;
            }
        }
        
        $assess_info = Bust::find()->where($where);

        if( !empty($andwhere) ){
            foreach ($andwhere as $value) {
                $assess_info = $assess_info->andWhere($value);
            }
        }

        $assess_info = $assess_info->asArray()->all();
        return $this->render("index", ["model"=>$assess_model, "model_info"=>$assess_info, "y"=>$y]);
    }


    public function actionAdd(){

        $request = Yii::$app->request;
        $className = "\\app\\module\\execution\\models\\" . ucfirst( $request->get("action") );
        $class = new \ReflectionClass( $className ); 
        $model  = $class->newInstanceArgs();
        $operator = Yii::$app->user->identity->Name;
        $script = <<<JS
        $("#pop .pop-title", window.parent.document).html("<h3>【执行】{$model->type}录入-操作:$operator</h3>");
JS;
        if($request->isPost){

            $model->Type = $model->type;
            $model->ModuleType = $model->module_type;
            $model->DepartID = Yii::$app->user->identity->DepartmentNumber;
            if( $model->load( $request->post() ) && $model->save() ){
                    $script = 'window.parent.location.reload()';
            }
        }
        $this->layout = "edit";
        return $this->render("edit/" .  $request->get("action"), ["model"=>$model, "script"=>$script]);
    }

    //edit
    public function actionEdit(){

        $request = Yii::$app->request;
        $className = "\\app\\module\\execution\\models\\" . ucfirst( $request->get("action") );
        $class = new \ReflectionClass( $className ); 
        $m= $class->newInstanceArgs();
        $model = $m->find()->where("id=:id", [":id"=>$request->get("id")])->one();
        $operator = Yii::$app->user->identity->Name;
        $script = <<<JS
        $("#pop .pop-title", window.parent.document).html("<h3>【执行】{$model->type}修改-操作:$operator</h3>");
JS;
        if($request->isPost){
            $model->Type = $model->type;
            $model->DepartID = Yii::$app->user->identity->DepartmentNumber;
            if( $model->load( $request->post() )  && $model->save()  ){
                    $script = 'window.parent.location.reload()';
            }
        }
        $this->layout = "edit";
        return $this->render( "edit/" . $request->get("action"), ["model"=>$model, "script"=>$script] );

    }

    //delete from id : assess, auction, bust, identify, project-cost
    public function actionDel(){
        $request = Yii::$app->request;
       if($request->isGet){
            $model = Conclusion::find()->where("ID=:id", [":id"=>$request->get("id")])->one();
            if( $model && $model->delete() ){
                echo "success";
            }else{
                echo "defail";
            }
        }
    }
}
