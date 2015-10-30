<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>义乌市人民法院委托案件电子管理系统</title>
<!-- --------------------=== 调用Weboffice初始化方法 ===--------------------- -->

<SCRIPT LANGUAGE=javascript FOR=WebOffice1 EVENT=NotifyCtrlReady>
<!--
 WebOffice1_NotifyCtrlReady();           
//-->
</SCRIPT>

<script>
function WebOffice1_NotifyCtrlReady() {
     document.all.WebOffice1.LoadOriginalFile("<?=$url?>", "<?=$ext?>");
}   
</script>
<SCRIPT LANGUAGE=javascript>
<!--



function SaveDoc() {
    var returnValue;                    // 保存页面的返回值
    document.all.WebOffice1.HttpInit(); // 初始化Http引擎
    // 添加相应的Post元素 
    var tem = document.getElementById("print_template").value;
    document.all.WebOffice1.HttpAddPostString("template", tem);
    // 添加上传文件
    document.all.WebOffice1.HttpAddPostCurrFile("AipFile", ""); 
    // 提交上传文件
    returnValue = document.all.WebOffice1.HttpPost("./index.php?r=input/save-print");
    alert(returnValue);
    if("success" == returnValue){
        alert("文件上传成功");    
    } else  {
        alert("文件上传失败")
    }
}

//-->
</SCRIPT>
</head>

<body>
<table width="100%">
    <tr>
        <td>
            <input type="hidden" name="print_template" id="print_template" value="<?=$doc_id?>" />
            <input name="username" type="button" id="showPrint" value="上传模板" onclick="SaveDoc()">
        </td>
    </tr>
    <tr>
        <td>
            <script src="/ywfy/web/js/LoadWebOffice.js"></script>  
        </td>
    </tr>
</table>
</body>
</html>
