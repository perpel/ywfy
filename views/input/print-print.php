<OBJECT id=WebOffice1 height="100%" width="100%" style="LEFT: 0px; TOP: 0px" 
classid="clsid:E77E049B-23FC-4DB8-B756-60529A35FAD5"  codebase=WebOffice.ocx#Version=3,0,0,0>
    <PARAM NAME="_Version" VALUE="65536">
    <PARAM NAME="_ExtentX" VALUE="2646">
    <PARAM NAME="_ExtentY" VALUE="1323">
    <PARAM NAME="_StockProps" VALUE="0"></OBJECT>

<SCRIPT LANGUAGE=javascript FOR=WebOffice1 EVENT=NotifyCtrlReady>
<!--
 WebOffice1_NotifyCtrlReady();           
//-->
</SCRIPT>

<script>
function WebOffice1_NotifyCtrlReady() {
     document.all.WebOffice1.LoadOriginalFile("http://192.111.1.104/ywfy/web/template/<?=$url?>", "<?=$ext?>");
}   
</script>