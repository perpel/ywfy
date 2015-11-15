<?php
use app\module\register\models\Department;
use yii\widgets\LinkPager;
use app\assets\UserAsset;
UserAsset::register($this);
?>

<?php $actionId=Yii::$app->controller->action->id; ?>

<div id="section-bar">
    <ul class="fnt-ul">

        <li>人民法院:
            <select id="department-log">
                <?php
                    foreach( Department::courtList() as $k=>$v ){
                        if($dept == $k){
                            echo "<option value='$k' selected>$v</option>";
                            continue;
                        }
                        echo "<option value='$k'>$v</option>";
                    }
                ?>
            </select>
        </li>

        <li class="fnt ico-refesh"><a href="index.php?r=admin/sys/logs&Department=<?=$dept?>">刷新</a></li>
        <!--<li class="fnt ico-add"><span data-action="add-<?= $actionId  ?>">增加</a></li>
        <li class="fnt ico-del"><span data-action="del">删除</span></li>
        <li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print"><span data-action="print">打印</span></li>-->

    </ul>
    
</div>

<div id="artical">        
<table id="myTable" style="width:100%;">
            
           
    <tr>   
        <th>流水号</th>
        <th>操作员</th>
        <th>操作日期</th>
        <th>操作类型</th>
    </tr>

    <?php
        foreach($logs as $v){
                echo "<tr>";
                echo "<td>" . $v["FlowNumber"] . "</td>";
                echo "<td>" . $v["InputMan"]. "</td>";
                echo "<td>" . $v["InputDate"]. "</td>";
                echo "<td>" . $v["CtrlType"]. "</td>";
                echo "</tr>";
        }
    ?>
</table>
</div>
<?= LinkPager::widget(['pagination' => $pages]); ?>