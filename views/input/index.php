<?php
use app\models\Conclusion;
?>

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
        echo "<tr>";
        foreach ($value as $k => $v) {
            echo "<td>";
            echo $v;
            echo "</td>";
        }
        echo "</tr>";
    }

?>

</table>