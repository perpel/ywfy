<?php
use app\models\Detail;
?>

<table id="myTable" cellspacing="0">
    <tr>
    <?php
        foreach( Detail::tableTh(Yii::$app->controller->action->id) as $v ){
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
