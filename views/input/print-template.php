<script language=javascript event=NotifyToolBarClick(iIndex) for=WebOffice1>
<!--
  //WebOffice_Event_Flash("NotifyToolBarClick");
  //WebOffice1_NotifyToolBarClick(iIndex);
  if( iIndex == 32778){
        SaveDoc("", ".doc", './index.php?r=input/save-print');
  }
//-->
</script>

<?php $this->beginBlock('LoadOriginalFile');  ?>
  document.all.WebOffice1.LoadOriginalFile("<?=$url?>", "<?=$ext?>");
<?php $this->endBlock();  ?>
  
</script>

<form id="myform">
    <input type="hidden" name="DocID" value="<?=$doc_id?>">
    <input type="hidden" name="DocTitle" value="default">
</form>