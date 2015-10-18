<?php
use app\models\Conclusion;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $this->beginBlock('year'); ?>
<?php
foreach ($years as $year) {
    echo "<option name='" . $year . "'>" . $year . "</option>";
}
?>
<?php $this->endBlock(); ?>
<table id="myTable">
<tr>
<?php
        foreach( Conclusion::tableTh(Yii::$app->controller->action->id) as $v ){
            echo '<th>' . $v . '</th>';
        }
?>
</tr>

<?php 
    $i = 1;
    foreach ($cu_info as $key => $value) {
        echo "<tr data-id=" . $value["ID"] . ">";
         foreach( Conclusion::tableTh(Yii::$app->controller->action->id) as $k=>$v ){
            echo "<td>";
            if($k == "ID"){
                echo $i;
            }elseif($k == "UCycle"){
                echo "0";
            }else{
                echo $value[$k];
            }  
            echo "</td>";
        }
        echo "</tr>";
        $i++;
    }

?>

</table>