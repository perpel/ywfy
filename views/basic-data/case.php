<?php
use app\models\BasicCase;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<input type="hidden" id="cu_type" value="case">
<?php $actionId=Yii::$app->controller->action->id;  ?>
<?php $this->beginBlock('refesh'); ?>
<a href="index.php?r=<?=Yii::$app->controller->id; ?>/<?= $actionId  ?>">刷新</a>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('del'); ?>
<span data-action="del" data-model="basic-case">删除</span>
<?php $this->endBlock(); ?>

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