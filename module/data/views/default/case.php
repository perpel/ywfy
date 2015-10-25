<?php
use app\module\data\models\BasicCase;
use app\assets\BasicDataAsset;
BasicDataAsset::register($this);
?>

<div id="section-bar">
    <ul class="fnt-ul">
        <input name="ctrl" type="hidden" value="<?=Yii::$app->controller->id; ?>">
        <li class="fnt ico-refesh"><a href="index.php?r=data/<?=Yii::$app->controller->id; ?>/<?= Yii::$app->controller->action->id; ?>">刷新</a></li>
        <li class="fnt ico-add" data-pop="pop"><span data-action="add-<?= Yii::$app->controller->action->id;  ?>" data-update="update-<?= Yii::$app->controller->action->id;  ?>">增加</a></li>
        <li class="fnt ico-del"><span data-action="del" data-model="basic-case">删除</span></li>
        <li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print" data-pop="pop"><span data-action="print">打印</span></li>
        <li class="fnt ico-search" data-pop="pop"><span data-action="search">查询</span><input type="text"></li>
        <li class="fnt ico-exit"><span data-action="exit">exit</span></li>
    </ul>
</div>

<input type="hidden" id="cu_type" value="case">


<table id="myTable" style="width:100%;">
<tr>

<?php

    foreach(  BasicCase::tableTh() as $k=>$v ){
        if($k == "ID"){
            echo '<th>' . $v . '</th>';
        } else{
            echo '<th data-tpl="' . $k . '">' . $v . '</th>';
        } 
            
    }
?>
</tr>

<?php
    $i = 1;
    foreach(  BasicCase::find()->asArray()->all() as $k=>$v ){
            echo "<tr data-id='" . $v["ID"] . "'>";
            echo "<td>" . $i . "</td>";
            echo "<td data-key='Name'>" . $v["Name"] . "</td>";
            echo "<td data-key='Remark'>" . $v["Remark"] . "</td>";
            echo "</tr>";
            $i++;
    }
?>

</table>