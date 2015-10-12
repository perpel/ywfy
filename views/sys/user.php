<?php
use app\models\Personnel;
?>

<?php $actionId=Yii::$app->controller->action->id;  ?>

<div id="section-bar">
    <ul>

         <li>人民法院:
                <select name="" id="">
                    <option value="">义乌市人民法院</option>
                    <option value="">test市人民法院</option>
                </select>
            </li>

        <li class="fnt ico-refesh"><a href="index.php?r=sys/<?= $actionId  ?>">刷新</a></li>
        <li class="fnt ico-add" data-pop="pop"><span data-action="add-<?= $actionId  ?>">增加</a></li>
        <li class="fnt ico-del"><span data-action="del">删除</span></li>
        <li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print"><span data-action="print">打印</span></li>

       

    </ul>
    <li class="fnt ico-exit"><span data-action="exit">exit</span></li>
</div>

        
<div style="padding-top:35px;"></div>

        
        <table id="user-info">
            <caption>义乌市人民法院</caption>
            <thead>
            <tr>
                <th>序号</th>
                <th>登录名</th>
                <th>登录密码</th>
                <th>姓名</th>
                <th>性别</th>
                <th>学历</th>
                <th>身份证号码</th>
                <th>部门</th>
                <th>职务</th>
                <th>联系电话</th>
                <th>手机</th>
                <th>备注</th>
            </tr>
            <thead>
                <tbody>
                
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
            
            </tbody>

        </table>
