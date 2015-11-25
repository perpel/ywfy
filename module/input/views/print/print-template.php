<object id="TANGER_OCX" classid="clsid:C9BC4DFF-4248-4a3c-8A49-63A7D317F404" codebase="OfficeControl.ocx#Version=5.0.2.2" width="100%" height="100%">
<param name="BorderStyle" value="1" />
<param name="TitlebarColor" value="42768" />
<param name="TitlebarTextColor" value="0" />
<param name="TitleBar" value="0" />
<b style='color:red;'>插件未加载，<a href='./index.php?r=input/report/down-office'>点击下载插件</a>，注意：请在IE内核浏览器下使用！</b>
</object>

<script>
var TANGER_OCX_OBJ = document.getElementById("TANGER_OCX");
TANGER_OCX_OBJ.OpenFromURL ("<?=\Yii::$app->request->getHostInfo() . $url?>");
</script>

<script>

var doc = TANGER_OCX_OBJ.ActiveDocument;
var marks = new Array('流水号', '原审案号', '案由', '当事人1', '当事人2', '承办人', '承办人电话', '督办人', '督办人电话', '机构', '委托部门', '当前日期');
var marksContent = new Array('<?=$model_info->FlowNumber?>', '<?=$model_info->CaseNumber?>', '<?=$model_info->Case?>', '<?=$model_info->LitigantOne?>', '<?=$model_info->LitigantTwo?>', '<?=$model_info->Undertaker?>', '<?=$model_info->UndertakerTel?>', '<?=$model_info->Supervise?>', '<?=$model_info->SuperviseTel?>', '<?=$model_info->Agency?>', '<?=$model_info->EntrustDeparment?>', '<?=date("Y年m月d日")?>');
for(var i=0; i<marks.length; i++){
    var BookMarkName = marks[i];
    if(TANGER_OCX_OBJ.ActiveDocument.BookMarks.Exists(BookMarkName))
    {
        doc.BookMarks(marks[i]).Range.Text = marksContent[i];
    }
}





</script>