<?php
use app\module\data\models\Document;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

use app\assets\BasicDataAsset;
BasicDataAsset::register($this);
?>

<div id="section-bar">
    <ul class="fnt-ul">
        <input name="ctrl" type="hidden" value="<?=Yii::$app->controller->id; ?>">
        <li class="fnt ico-refesh"><a href="#" onclick="javascript:window.location.reload();">刷新</a></li>
        <li class="fnt ico-add" data-pop="pop"><span data-action="add-<?= Yii::$app->controller->action->id;  ?>" data-update="update-<?= Yii::$app->controller->action->id;  ?>">增加</a></li>
        <li class="fnt ico-del"><span data-action="del" data-model="document">删除</span></li>
        <li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print" data-pop="pop"><span data-action="print">打印</span></li>
        <li class="fnt ico-search" data-pop="pop"><span data-action="search">查询</span><input type="text"></li>
        <li class="fnt ico-exit"><span data-action="exit">exit</span></li>
    </ul>
</div>
<input type="hidden" id="cu_type" value="document">


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