<form action="index.php?r=input/save-as&module=<?=$module?>&action=<?= $action?>" method="post">

<label for="_filename">文件名：</label><input type="text" id="_filename" name="_filename" value="数据录入<?=$type?>">
<br>
<label for="_title">标题：</label><input type="text" id="_title" name="_title" value="数据录入<?=$type?>">
<br>
<select name="_type">
    <option value="Excel5">Excel2003</option>
    <option value="Excel2007">Excel2007</option>
</select>
<br>
    <input type="submit" value="导出">
</form>