<?php
use yii\widgets\LinkPager;
use app\assets\InputAsset;
InputAsset::register($this);
?>
<div id="section-bar">
    <ul class="fnt-ul">
        <li>
            <span>年度</span>
            <select name="year" id="year" data-action="<?=$action; ?>">
                <option value="all">-全部-</option>
                <?php
                    foreach ( $years as $year) {
                        if( $y == $year){
                            echo "<option selected name='" . $year . "'>" . $year . "</option>";
                            continue;
                        }
                        echo "<option name='" . $year . "'>" . $year . "</option>";
                    }
                ?>
            </select>
        </li>
        <li class="fnt ico-refesh"><a href="index.php?r=input/input/index&action=<?=$action; ?>">刷新</a></li>
        <?php
            foreach( $tool_bar as $k=>$v ){
        ?>
         <li class="fnt ico-<?=$k?>"><span data-action="<?=$action;?>"><?=$v?></span></li>
        <?php
            }
        ?>
    </ul>    
</div>

<div id="artical">
   
    <table id="myTable">
    <tr>
    <?php
            foreach( $model::tableTh() as $v ){
                echo '<th>' . $v . '</th>';
            }
    ?>
    </tr>

    <?php
        $excelMain = [];
        $i = 1;
        foreach ( $model_info as $_key => $_value ) {

                echo "<tr data-id=" . $_value["ID"] . ">";

                foreach ( $model::tableTh() as $key => $value) {

                        if( $key == "No" ){
                                echo "<td>" . $i . "</td>";
                                $excelMain[$i][] = $i;
                                continue;
                        }

                        echo "<td>" . $_value[$key] . "</td>";
                        $excelMain[$i][] = $_value[$key];
                }

            echo "</tr>";
            $i++;
        }

        $cache = Yii::$app->cache;
        $cache->set( "excel_main", $excelMain );
    ?>
    </table>
     
</div>
<?= LinkPager::widget(['pagination' => $pages]); ?>