<script>
    
    $(":button[name='strt-print']").click(function(){

            var param = $("#print-str").serialize();
            window.open("index.php?r=input/print&" + param);
    });


</script>
<form id="print-str" action="index.php?r=input/start-print" method="post">
    <table>
        <tr>
            <td>tpl</td>
            <td>
                <input type="hidden" name="id" value="<?=$id ?>">
                <input type="hidden" name="tpl-path" value="tpl/test">
                tpl7899
            </td>
        </tr>
    <tr>
        <td>标题</td>
        <td>
            <input type="text" name="title" value="<?=$title ?>">
        </td>
    </tr>
    <tr>
        <td>副标题</td>
        <td>
            <input type="text" name="subtitle">
        </td>
    </tr>
    <tr>
        <td>版面</td>
        <td>
            <select name="page">
                <option value="A4">A4-竖版</option>
                <option value="A4-L">A4-横版</option>
                <option value="A5">A5-竖版</option>
                <option value="A5-L">A5-横版</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><input name="strt-print" type="button" value="print"></td>
        <td><input type="reset" value="reset"></td>
    </tr>
</table>
</form>