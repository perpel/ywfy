<?php
use app\models\Document;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<input type="hidden" id="cu_type" value="document">
<?php $actionId=Yii::$app->controller->action->id;  ?>
<?php $this->beginBlock('refesh'); ?>
<a href="index.php?r=<?=Yii::$app->controller->id; ?>/<?= $actionId  ?>">刷新</a>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('del'); ?>
<span data-action="del" data-model="document">删除</span>
<?php $this->endBlock(); ?>

<table id="myTable" style="width:100%;">
<tr>

<?php

$ths = Document::tableTh();
echo "<th>" . $ths['ID'] . "</th>";
echo "<th>" . $ths['DepartmentNumber'] . "</th>";
echo "<th data-tpl='Name'>" . $ths['Name'] . "</th>";
echo "<th data-btn='Assess'>" . $ths['Assess'] . "</th>";
echo "<th data-btn='Identify'>" . $ths['Identify'] . "</th>";
echo "<th data-btn='Auction'>" . $ths['Auction'] . "</th>";
echo "<th data-btn='ProjectCost'>" . $ths['ProjectCost'] . "</th>";
echo "<th data-btn='Bust'>" . $ths['Bust'] . "</th>";

?>
</tr>

<?php
    $i = 1;
    foreach(  Document::find()->asArray()->all() as $k=>$v ){
            echo "<tr data-id='" . $v["ID"] . "'>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $v["DepartmentNumber"] . "</td>";
            echo "<td data-key='Name'>" . $v["Name"] . "</td>";

            if($v["Assess"]){
                echo "<td data-key='Assess' data-btn='Assess'><input type='checkbox' checked value=1></td>";
            }else{
                echo "<td data-key='Assess' data-btn='Assess'><input type='checkbox' value=0></td>";
            }

            if($v["Identify"]){
                echo "<td data-key='Identify' data-btn='Identify'><input type='checkbox' checked value=1></td>";
            }else{
                echo "<td data-key='Identify' data-btn='Identify'><input type='checkbox' value=0></td>";
            }

            if($v["Auction"]){
                echo "<td data-key='Auction' data-btn='Auction'><input type='checkbox' checked value=1></td>";
            }else{
                echo "<td data-key='Auction' data-btn='Auction'><input type='checkbox' value=0></td>";
            }

            if($v["ProjectCost"]){
                echo "<td data-key='ProjectCost' data-btn='ProjectCost'><input type='checkbox' checked value=1></td>";
            }else{
                echo "<td data-key='ProjectCost' data-btn='ProjectCost'><input type='checkbox' value=0></td>";
            }

            if($v["Bust"]){
                echo "<td data-key='Bust' data-btn='Bust'><input type='checkbox' checked value=1></td>";
            }else{
                echo "<td data-key='Bust' data-btn='Bust'><input type='checkbox' value=0></td>";
            }

            echo "</tr>";
            $i++;
    }
?>

</table>