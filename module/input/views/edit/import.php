<?php
    use app\assets\ImportAsset;
    ImportAsset::register($this);
?>
<?php
    $this->registerJs($script);
?>

<div id="import">
    <input type="hidden" name="" id="action" value="<?=$action?>">
    <form action="index.php?r=input/edit/import&action=<?=$action?>" method="post" enctype="multipart/form-data">
        <input name="file" type="file">
        <!--<select name="template" id="import-template">
            <option value="1">默认模板</option>
        </select>
        <input type="button" value=" 模板设置 " id="set-template">-->
        <input type="button" value="导入" name="import">
    </form>

    <table class="drag-table" cellspacing="0">
        <thead>
        <tr>
        <th class="table-zero">&empty;</th>
        <?php
           
            $ths = $model::tableTh();
            $i = 1;
            foreach ( $ths as $key => $value) {
                if($key == "No"){
                    echo '<th data-tpl="Year">' . "(" . $i . ")" .  '年度</th>';
                    $i++;
                    continue;
                }
                echo '<th data-tpl="' . $key . '">' . "(" . $i . ")" . $value . '</th>';
                $i++;
            }
        ?>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach($excel as $k=>$v){

                echo "<tr>";
                echo '<td><input name="rowSelect" type="checkbox" /></td>';

                foreach ($v as $_k => $_v) {
                    echo "<td>$_v</td>";
                }

                echo "</tr>";

            }
        ?>
    </tbody>

</table>

<div style="position:fixed; bottom:-0;background-color:#CCC;" id="footer"></div>
</div>