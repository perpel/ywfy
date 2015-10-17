<?php
use app\models\Conclusion;
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
    
    foreach ($assess_info as $key => $value) {
        echo "<tr data-id=" . $value["ID"] . ">";
        foreach ($value as $k => $v) {
            echo "<td>";
            echo $v;
            echo "</td>";
        }
        echo "</tr>";
    }

?>

</table>