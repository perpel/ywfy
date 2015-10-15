<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<style>
ul,li{ list-style:none;}
.pop{ width:500px;}
.printbox{ width:100%; height:30px; line-height:30px; background:url(../../web/images/payment_bg.jpg) repeat-x;}
.printbox li{ font-size:12px; float:left; width:70px; background: 14px 7px no-repeat; text-indent:2.8em;}
.printbox li a{ color:#000; text-decoration:none;}
.tablebook{ width:100%; max-height:350px; overflow-y:auto; overflow-x:hidden; margin-top:10px;}
.tablebook table{ width:100%; border:1px solid #cacaca; border-top:none;}
.tablebook table th{ line-height:30px;  border:1px solid #cacaca; border-bottom:none; border-right:none; background:#f5f7fa; font-size:14px;}
.tablebook table td{ line-height:25px;  border:1px solid #cacaca; border-bottom:none; border-right:none; text-align:center; font-size:12px;}
</style>

<div class="printbox">
	<ul>
    	<li class="fnt ico-refesh"><a href="#">刷新</a></li>
        <li class="fnt ico-search" data-pop="pop"><a href="#">查询</a></li>
        <li class="fnt ico-import"><a href="#">排序</a></li>
        <li class="fnt ico-save-as"><a href="#">保存</a></li>
         <li class="fnt ico-save-as"><a href="#">另存为</a></li>
        <li class="fnt ico-print" data-pop="pop"><a href="#">打印</a></li>
        <li class="fnt ico-exit"><a href="#">退出</a></li>
    </ul>
</div>
<div class="tablebook">
	<table cellspacing="0">
    	<tr><th>序号</th><th>文书名称</th></tr>
        <tr><td>1</td><td>移交单</td></tr>
        <tr><td>2</td><td>撤回委托评估函</td></tr>
        <tr><td>3</td><td>评估委托书</td></tr>
    </table>
</div>

<?php

$html = ' 
<table width=600 cellpadding="6" cellspacing="1" bgcolor="#336699"> 
<tr bgcolor="White"> 
  <td>PHP10086</td> 
  <td><a href="http://www.php10086.com" target="_blank" >http://www.php10086.com</a></td> 
</tr> 
<tr bgcolor="red"> 
  <td>PHP10086</td> 
  <td><a href="http://www.php10086.com" target="_blank" >http://www.php10086.com</a></td> 
</tr> 
<tr bgcolor="White"> 
  <td colspan=2 > 
  PHP10086<br> 
  最靠谱的PHP技术博客分享网站 
  <img src="http://www.php10086.com/wp-content/themes/WPortal-Blue/images/logo.gif"> 
  </td> 
</tr> 
</table> 
'; 

//批量生成 
    $word = new \word(); 
    $word->start(); 
    //$html = "aaa".$i; 
    $wordname = "1PHP淮北的个人网站--PHP10086.com.doc"; 
    echo $html; 
    $word->save($wordname); 
    ob_flush();//每次执行前刷新缓存 
    flush(); 
?>