<object id="TANGER_OCX" classid="clsid:C9BC4DFF-4248-4a3c-8A49-63A7D317F404" codebase="OfficeControl.ocx#Version=5.0.2.2" width="100%" height="100%">
<param name="BorderStyle" value="1" />
<param name="TitlebarColor" value="42768" />
<param name="TitlebarTextColor" value="0" />
<param name="TitleBar" value="0" />
<param name="CustomMenuCaption" value=" WEB功能 ">
<b style='color:red;'>插件未加载，<a href='<?=Yii::getAlias('@web') . "/software/OfficeControl.rar"?>'>点击下载插件</a>，注意：请在IE内核浏览器下使用！</b>
</object>

<script>
var TANGER_OCX_OBJ = document.getElementById("TANGER_OCX");
TANGER_OCX_OBJ.OpenFromURL ("<?=\Yii::$app->request->getHostInfo() . $path?>");
function AddMyMenuItems(){
    try{
        // 在自定义主菜单中增加菜单项目
        TANGER_OCX.AddCustomMenuItem('上传文档',false,false,1);
    }
    catch(err){
        alert(" 不能创建新对象: "+ err.number +":" + err.description);
    }finally{}
}

</script>

<body onload="AddMyMenuItems()">

<script language="JScript" for="TANGER_OCX" event="OnCustomMenuCmd(menuIndex,menuCaption,menuID)">

    if( menuID == 1 ){
        var a = TANGER_OCX_OBJ.SaveToURL ("./index.php?r=input/report/edit&uid=<?=$uid?>&type=<?=$type?>&name=<?=$name?>&id=<?=$id?>", "DocContent", "", "test.doc",0);
        alert(a);
    }
</script>
<form>
</form>
</body>