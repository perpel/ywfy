<?php
use app\models\Agency;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<input type="hidden" id="cu_type" value="<?=$departmentType?>">

<?php $this->beginBlock('refesh'); ?>
<a href="#">刷新</a>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('del'); ?>
<span data-action="del" data-model="definition">删除</span>
<?php $this->endBlock(); ?>

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
    foreach(  Agency::find()->where(["Type"=>$departmentType])->asArray()->all() as $k=>$v ){
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