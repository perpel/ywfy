
<div id="section-bar">
    <ul class="fnt-ul">

        <li class="fnt ico-refesh"><a href="index.php?r=admin/sys/department">刷新</a></li>
        <!--<li class="fnt ico-add"><span data-action="add-<= $actionId  >">增加</a></li>
        <li class="fnt ico-del"><span data-action="del">删除</span></li>
        <li class="fnt ico-save-as"><span data-action="save-as">另存为</span></li>
        <li class="fnt ico-print"><span data-action="print">打印</span></li>-->

    </ul>
    
</div>

<div id="artical">        
<table id="myTable" style="width:100%;">
            
           
    <tr>  
        <th>序号</th> 
        <th>法院名称</th>
        <th>法院编号</th>
        <th>注册时间</th>
        <th>有效期</th>
        <th>注册码</th>
    </tr>

    <?php
    $i = 1;
        foreach($model_info as $v){
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                if($v["EndDate"] < date("Y-m-d")){
                        echo "<td style='background-color:#FFAEB9;'>" . $v["Name"]. "</td>";
                }else{
                        echo "<td>" . $v["Name"] . "</td>";
                }
                
                echo "<td>" . $v["Number"]. "</td>";
                echo "<td>" . $v["StartDate"]. "</td>";
                
                echo "<td>" . $v["EndDate"]. "</td>";
                echo "<td>" . $v["RegistrationCode"]. "</td>";
                echo "</tr>";
                $i++;
        }
    ?>
</table>
</div>