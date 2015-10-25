<?php
use app\models\Conclusion;
use app\assets\InputAsset;
InputAsset::register($this);
?>
<div id="section-bar">
    <ul class="fnt-ul">
        <li>
            <span>审判:</span>
        </li>
        <li>
            <span>年度</span>
            <select name="year" id="year" data-action="<?= Yii::$app->controller->action->id;?>">
                <option value="all">-全部-</option>
                <?php
                    foreach ( Conclusion::years() as $year) {
                        if( $year == $y ){
                            echo "<option selected name='" . $year . "'>" . $year . "</option>";
                            continue;
                        }
                        echo "<option name='" . $year . "'>" . $year . "</option>";
                    }
                ?>
            </select>
        </li>
        <input type="hidden" name="module" id="module" value="execution">
        <li class="fnt ico-refesh"><a href="index.php?r=trial/input/<?= Yii::$app->controller->action->id;?>&year=<?=$y?>">刷新</a></li>
        <li class="fnt ico-import" data-pop="pop"><span data-action="<?= Yii::$app->controller->action->id;?>">导入</span></li>
        <li class="fnt ico-add" data-pop="pop"><span data-action="<?= Yii::$app->controller->action->id;?>">增加</span></li>
        <li class="fnt ico-edit" data-pop="pop"><span data-action="<?= Yii::$app->controller->action->id;?>">编辑</a></li>
        <li class="fnt ico-del"><span data-action="del">删除</span></li>
        <li class="fnt ico-save-as"><span data-action="<?= Yii::$app->controller->action->id;?>">另存为</span></li>
        <li class="fnt ico-print" data-pop="pop"><span data-action="print">打印</span></li>
        <li class="fnt ico-search" data-pop="pop"><span data-action="<?= Yii::$app->controller->action->id;?>">条件查询</span></li>
        <li class="fnt ico-exit"><span data-action="exit">exit</span></li>
    </ul>    
</div>

<div id="artical">
   
    <table id="myTable">
    <tr>
    <?php
            foreach( $model->attributeLabels() as $v ){
                echo '<th>' . $v . '</th>';
            }
    ?>
    </tr>

    <?php 
        $i = 1;
        $arr = [];
        foreach ( $model_info as $_key=>$_value ) {
             echo "<tr data-id=" . $_value["ID"] . ">";
             foreach( $model->attributeLabels() as $_k=>$_v ){
                    echo "<td>";
                    if( $_k == "ID" ){
                        echo $i;
                        $arr[$i][] = $i;
                    }elseif( $_k == "UCycle" ){
                        echo "0";
                        $arr[$i][] = 0;
                    }else{
                        echo $_value[$_k];
                        $arr[$i][] = $_value[$_k];
                    }  
                    echo "</td>";
            }
            echo "</tr>";
            $i++;
        }

        $cache = Yii::$app->cache;
        $cache_name = Yii::$app->user->identity->Number . "data";
        $cache->set( $cache_name, $arr );

    ?>
    </table>
</div>