<?php $this->beginPage() ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <title>weboffice演示页面</title>
<meta http-equiv=Content-Type content="text/html; charset=gb2312">
<?php
      $this->registerJsFile("@web/etc/webOffice/main.js", ['position' => \yii\web\View::POS_HEAD]);
?>
<SCRIPT src="./main.js" type=text/javascript></SCRIPT>
<!-- --------------------=== 调用Weboffice初始化方法 ===--------------------- -->
<SCRIPT language=javascript event=NotifyCtrlReady for=WebOffice1>
/****************************************************
*
*   在装载完Weboffice(执行<object>...</object>)
*   控件后执行 "WebOffice1_NotifyCtrlReady"方法
*
****************************************************/
    WebOffice_Event_Flash("NotifyCtrlReady");
    WebOffice1_NotifyCtrlReady()
</SCRIPT>

<SCRIPT language=javascript event=NotifyWordEvent(eventname) for=WebOffice1>
<!--
WebOffice_Event_Flash("NotifyWordEvent");
 WebOffice1_NotifyWordEvent(eventname);
 
//-->
</SCRIPT>

<SCRIPT language=javascript>
/****************************************************
*
*       控件初始化WebOffice方法
*
****************************************************/
function WebOffice1_NotifyCtrlReady() {
    document.all.WebOffice1.SetWindowText("授权XX(可通过接口自定义)", 0);
    document.all.WebOffice1.OptionFlag |= 128;
    // 新建文档
    //document.all.WebOffice1.LoadOriginalFile("", "doc");
    spnWebOfficeInfo.innerText="----   您电脑上安装的WebOffice版本为:V" + document.all.WebOffice1.GetOcxVersion() +"\t\t\t本实例是根据版本V6044编写";
}
var flag=false;
function menuOnClick(id){
    var id=document.getElementById(id);
    var dis=id.style.display;
    if(dis!="none"){
        id.style.display="none";
        
    }else{
        id.style.display="block";
    }
}
/****************************************************
*
*       接收office事件处理方法
*
****************************************************/
var vNoCopy = 0;
var vNoPrint = 0;
var vNoSave = 0;
var vClose=0;
function no_copy(){
    vNoCopy = 1;
}
function yes_copy(){
    vNoCopy = 0;
}


function no_print(){
    vNoPrint = 1;
}
function yes_print(){
    vNoPrint = 0;
}


function no_save(){
    vNoSave = 1;
}
function yes_save(){
    vNoSave = 0;
}
function EnableClose(flag){
 vClose=flag;
}
function CloseWord(){
    
  document.all.WebOffice1.CloseDoc(0); 
}

function WebOffice1_NotifyWordEvent(eventname) {
    if(eventname=="DocumentBeforeSave"){
        if(vNoSave){
            document.all.WebOffice1.lContinue = 0;
            alert("此文档已经禁止保存");
        }else{
            document.all.WebOffice1.lContinue = 1;
        }
    }else if(eventname=="DocumentBeforePrint"){
        if(vNoPrint){
            document.all.WebOffice1.lContinue = 0;
            alert("此文档已经禁止打印");
        }else{
            document.all.WebOffice1.lContinue = 1;
        }
    }else if(eventname=="WindowSelectionChange"){
        if(vNoCopy){
            document.all.WebOffice1.lContinue = 0;
            //alert("此文档已经禁止复制");
        }else{
            document.all.WebOffice1.lContinue = 1;
        }
    }else   if(eventname =="DocumentBeforeClose"){
        if(vClose==0){
            document.all.WebOffice1.lContinue=0;
        } else{
            //alert("word");
            document.all.WebOffice1.lContinue = 1;
          }
 }
    //alert(eventname); 
}
function dd(){

    document.all.WebOffice1.FullScreen=0;

}

</SCRIPT>
<meta content="MSHTML 6.00.2900.5921" name=GENERATOR>
<?php $this->head() ?>
</head>
<body style="BACKGROUND: #ccc" onload="return SetCustomToolBtn(2,'上传模板')" onunload="return window_onunload()">
    <?php $this->beginBody() ?> 
<?=$content?>
<object id=WebOffice1 height=768 width='100%' style='LEFT: 0px; TOP: 0px;'  classid='clsid:E77E049B-23FC-4DB8-B756-60529A35FAD5' codebase='WebOffice.ocx#Version=7,0,1,0'>
    <param name='_ExtentX' value='6350'>
    <param name='_ExtentY' value='6350'>
    <b style='color:red;'>插件未加载，<a href='<?=Yii::getAlias('@web') . "/soft/WebOffice.rar"?>'>点击下载插件</a>，注意：请在IE内核浏览器下使用！</b>
</object>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>