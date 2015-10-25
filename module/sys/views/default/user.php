<?php
use app\models\Personnel;
use app\assets\UserAsset;
UserAsset::register($this);
?>

<?php $actionId=Yii::$app->controller->action->id; ?>

<div id="section-bar">
    <ul class="fnt-ul">

        <li>人民法院:
            <select id="departmentNumber">
                <option value="20032">义乌市人民法院</option>
                <option value="40512">test市人民法院</option>
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
                $i = 1;
                $users = Personnel::find()->asArray()->all();
                foreach($users as $k => $v){

                        echo "<tr data-id=" . $v["ID"] . ">";
                        echo "<td>" . $i . "</td>";
                        echo "<td data-key='Number'>" . $v["Number"] . "</td>";
                        echo "<td data-key='Password'>" . $v["Password"] . "</td>";
                        echo "<td data-key='Name'>" . $v["Name"] . "</td>";
                        echo "<td data-key='Sex'>" . $v["Sex"] . "</td>";
                        echo "<td data-key='Education'>" . $v["Education"] . "</td>";
                        echo "<td data-key='IDNumber'>" . $v["IDNumber"] . "</td>";
                        echo "<td>" . $v["DepartmentNumber"] . "</td>";
                        echo "<td></td>";
                        echo "<td data-key='TelNumber'>" . $v["TelNumber"] . "</td>";
                        echo "<td data-key='CellNumber'>" . $v["CellNumber"] . "</td>";
                        echo "<td data-key='Remarks'>" . $v["Remarks"] . "</td>";
                        echo "</tr>";
                        $i++;
                }
            ?>


        </table>