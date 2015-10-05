<?php
    $actionId = Yii::$app->controller->action->id;
?>
<ul id="input-bar">
    <li>
        <span>年度</span>
        <select name="" id="">
            <option value="">2001</option>
            <option value="">2002</option>
            <option value="">2003</option>
            <option value="">2004</option>
        </select>
    </li>
    
    <li><a href="index.php?r=input/<?= $actionId  ?>">刷新</a></li>
    <li><span class="fnt" data-action="import">导入</span></li>
    <li><span class="fnt" data-action="add-<?= $actionId  ?>">增加</a></li>
    <li><span class="fnt" data-action="edit-<?= $actionId  ?>">编辑</a></li>
    <li><span class="fnt" data-action="del">删除</span></li>
    <li><span class="fnt" data-action="save-as">另存为</span></li>
    <li><span class="fnt" data-action="print">打印</span></li>
    <li><span class="fnt" data-action="search">条件查询</span></li>
</ul>

<table width="100%" class="listext">

  <tr>
    <th>www</th>
    <th>daixiaorui</th>
    <th>com</th>
  </tr>

  <tr>
    <td>欢迎</td>
    <td>您的</td>
    <td>访问</td>
  </tr>

  <tr>
    <td>欢迎</td>
    <td>您的</td>
    <td>访问</td>
  </tr>

</table>

<div id="pop-input">
            <div id="close-pop" style="width:100px; height:30px; background-color:red;">
                <span>Close</span>
            </div>
            <div class="title drag"></div>
            <div class="content"></div>
</div>