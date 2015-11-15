<?php

use yii\helpers\Html;
use app\assets\EditAsset;

EditAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<style>
ul,li{ list-style:none;}
.printbox{ width:100%;  background:url(../../web/images/payment_bg.jpg) repeat-x; padding: 2px;}
.tablebook{ width:100%; height:80%; overflow-y:auto; overflow-x:auto; margin-top:10px;}
.tablebook table{ width:100%; border:1px solid #cacaca; border-top:none;}
.tablebook table th{ line-height:30px;  border:1px solid #cacaca; border-bottom:none; border-right:none; background:#f5f7fa; font-size:14px;}
.tablebook table td{ line-height:25px;  border:1px solid #cacaca; border-bottom:none; border-right:none; text-align:center; font-size:12px;}
.selected{color: red;}

</style>


<div class="printbox">
    <ul class="fnt-ul">
        <form action="index.php?r=sybase/default/search" method="post">
      <li class="fnt ico-search">
        <span>查询</span>
        
        <select name="flow_number_src">
                    <option value="原审案号">原审案号</option>
                    <option value="案由">案由</option>
                    <option value="当事人">当事人</option>
                    <option value="督办人">督办人</option>
                    <option value="承办人">承办人</option>
              </select>
              <input type="text" name="flow_search_val" class="print-search">
              <label>审判 <input type="radio" name="flow_number_type" value="审判" checked></label>
                <label>执行 <input type="radio" name="flow_number_type" value="执行" ></label>
                <input type="submit" value="查询">
            
        </li>
        <input type="hidden" id="tid" value="<?=$tid?>">
 </form>
    </ul>
</div>
<div class="tablebook case-number">
<table cellspacing="0">
      <tr>
        <th>案号</th>
        <th>案由</th>
        <th>当事人1</th>
        <th>当事人2</th>
        <th>督办人</th>
        <th>督办人电话</th>
        <th>承办人</th>
        <th>承办人电话</th>
      </tr>
      
       <tr>
        <td>案号</td>
        <td>案由</td>
        <td>当事人1</td>
        <td>当事人2</td>
        <td>督办人</td>
        <td>督办人电话</td>
        <td>承办人</td>
        <td>承办人电话</td>
      </tr>
       <tr>
        <td>案号</td>
        <td>案由</td>
        <td>当事人1</td>
        <td>当事人2</td>
        <td>督办人</td>
        <td>督办人电话</td>
        <td>承办人</td>
        <td>承办人电话</td>
      </tr>

     
      
    </table>
</div>




<div id="pop"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>