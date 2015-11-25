<?php
use app\module\basic\models\Agency;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\assets\BasicDataAsset;
BasicDataAsset::register($this);
?>

<table id="myTable" style="width:100%;">

<tr>   
        <th>流水号</th>
        <th>操作员</th>
        <th>操作日期</th>
        <th>操作类型</th>
    </tr>

    <?php
        foreach($logs as $v){
                echo "<tr>";
                echo "<td>" . $v["FlowNumber"] . "</td>";
                echo "<td>" . $v["InputMan"]. "</td>";
                echo "<td>" . $v["InputDate"]. "</td>";
                echo "<td>" . $v["CtrlType"]. "</td>";
                echo "</tr>";
        }

    ?>

</table>