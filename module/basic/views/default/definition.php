<?php
use app\module\basic\models\Agency;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\assets\BasicDataAsset;
BasicDataAsset::register($this);
?>
<div id="section-bar">
    <ul class="fnt-ul">
        <input name="ctrl" type="hidden" value="<?=Yii::$app->controller->id; ?>">
        <li class="fnt ico-refesh"><a href="#" onclick="javascript:window.location.reload()">刷新</a></li>
        <li class="fnt ico-add" data-pop="pop"><span data-action="add-<?= Yii::$app->controller->action->id;  ?>" data-update="update-<?= Yii::$app->controller->action->id;  ?>">增加</a></li>
        <li class="fnt ico-del"><span data-action="del" data-model="definition">删除</span></li>
        <!--<li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print" data-pop="pop"><span data-action="print">打印</span></li>
        <li class="fnt ico-search" data-pop="pop"><span data-action="search">查询</span><input type="text"></li>
        <li class="fnt ico-exit"><span data-action="exit">exit</span></li>-->
    </ul>
</div>

<input type="hidden" id="cu_type" value="<?=$departmentType?>">
<div id="artical">     
<table id="myTable" style="width:100%;">
<tr>

<?php

    foreach(  Agency::tableTh() as $k=>$v ){
        if($k == "ID"){
            echo '<th>' . $v . '</th>';
        }elseif($k == "Type"){
            echo '<th data-type="' . $k . '">' . $v . '</th>';
        }else{
            echo '<th data-tpl="' . $k . '">' . $v . '</th>';
        }
            
    }
?>
</tr>

<?php
    $i = 1;
    foreach(  Agency::find()->where(["Type"=>$departmentType, "DepartID"=>Yii::$app->user->identity->DepartmentNumber])->asArray()->all() as $k=>$v ){
            echo "<tr data-id='" . $v["ID"] . "'>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $v["Type"] . "机构</td>";
            echo "<td data-key='Name'>" . $v["Name"] . "</td>";
            echo "<td data-key='LicenseNumber'>" . $v["LicenseNumber"] . "</td>";
            echo "<td data-key='Contacts'>" . $v["Contacts"] . "</td>";
            echo "<td data-key='ContactsPhone'>" . $v["ContactsPhone"] . "</td>";
            echo "<td data-key='LegalRepresentative'>" . $v["LegalRepresentative"] . "</td>";
            echo "<td data-key='LegalRepresentativePhone'>" . $v["LegalRepresentativePhone"] . "</td>";
            echo "<td data-key='Tel'>" . $v["Tel"] . "</td>";
            echo "<td data-key='Fax'>" . $v["Fax"] . "</td>";
            echo "<td data-key='Qualification'>" . $v["Qualification"] . "</td>";
            echo "<td data-key='ServiceArea'>" . $v["ServiceArea"] . "</td>";
            echo "<td data-key='Remark'>" . $v["Remark"] . "</td>";
            echo "</tr>";
            $i++;
    }
?>

</table>
</div>