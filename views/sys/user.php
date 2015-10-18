<?php
use app\models\Personnel;
?>

<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php $actionId=Yii::$app->controller->action->id;  ?>

<div id="section-bar">
    <ul class="fnt-ul">

         <li>人民法院:
                <select name="" id="">
                    <option value="">义乌市人民法院</option>
                    <option value="">test市人民法院</option>
                </select>
            </li>

        <li class="fnt ico-refesh"><a href="index.php?r=sys/<?= $actionId  ?>">刷新</a></li>
        <li class="fnt ico-add"><span data-action="add-<?= $actionId  ?>">增加</a></li>
        <li class="fnt ico-del"><span data-action="del">删除</span></li>
        <li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print"><span data-action="print">打印</span></li>

       <li class="fnt ico-exit"><span data-action="exit">exit</span></li>

    </ul>
    
</div>

        
        <table id="myTable" style="width:100%;">
            
           
            <tr>
                <th>序号</th>
                <th data-tpl="Number">登录名</th>
                <th data-tpl="Password">登录密码</th>
                <th data-tpl="Name">姓名</th>
                <th data-tpl="Sex">性别</th>
                <th data-tpl="Education">学历</th>
                <th data-tpl="IDNumber">身份证号码</th>
                <th data-tpl="DepartmentNumber">部门</th>
                <th data-tpl="Position">职务</th>
                <th data-tpl="TelNumber">联系电话</th>
                <th data-tpl="CellNumber">手机</th>
                <th data-tpl="Remarks">备注</th>
            </tr>
            
                
            <?php
                $users = Personnel::find()->asArray()->all();
                foreach($users as $k => $v){

                        echo "<tr>";
                        echo "<td>" . $v["ID"] . "</td>";
                        echo "<td>" . $v["Number"] . "</td>";
                        echo "<td>" . $v["Password"] . "</td>";
                        echo "<td>" . $v["Name"] . "</td>";
                        echo "<td>" . $v["Sex"] . "</td>";
                        echo "<td>" . $v["Education"] . "</td>";
                        echo "<td>" . $v["IDNumber"] . "</td>";
                        echo "<td>" . $v["DepartmentNumber"] . "</td>";
                        echo "<td></td>";
                        echo "<td>" . $v["TelNumber"] . "</td>";
                        echo "<td>" . $v["CellNumber"] . "</td>";
                        echo "<td>" . $v["Remarks"] . "</td>";
                        echo "</tr>";

                }
            ?>


        </table>