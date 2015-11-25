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
body{overflow: hidden;}
ul,li{ list-style:none;}
.printbox{ width:100%;  background:url(../../web/images/payment_bg.jpg) repeat-x; padding: 2px;}
.tablebook{ width:100%; height:80%; margin-top:25px;}
.tablebook table{ width:100%; border:1px solid #cacaca; border-top:none;}
.tablebook table tbody{display: block; width: 100%; height:30px; overflow: scroll;}
.tablebook table th{ line-height:30px; white-space: nowrap; border:1px solid #cacaca; border-bottom:none; border-right:none; background:#f5f7fa; font-size:14px;}
.tablebook table td{ width: 16%; overflow: hidden; line-height:25px;  border:1px solid #cacaca; border-bottom:none; border-right:none; text-align:left; font-size:12px; }
.selected{color: red;}

.thead{
  width: 100%;
  height: 30px;
  background-color: lightblue;
}
.thead div{
  float: left;
  line-height: 30px;
  font-size: 14px;
  text-align: center;
}
.thead .th0{ width: 245px; border: 1px solid lightyellow; }
.thead .th1{ width: 245px; border: 1px solid lightyellow; }
.thead .th2{ width: 95px; border: 1px solid lightyellow; }
.thead .th3{ width: 95px; border: 1px solid lightyellow; }
.thead .th4{ width: 95px; border: 1px solid lightyellow; }
.thead .th5{ width: 195px; border: 1px solid lightyellow; }

.tbody{
  width: 100%;
  height: 200px;
  clear: both;
  overflow: scroll;
}
.tbody div{
  line-height: 22px;
  font-size: 12px;
  float: left;
  background-color: #D9D9D9;
  white-space: nowrap;
  overflow: hidden;

}

.tbody .td0{ width: 245px; border: 1px solid white; }
.tbody .td1{ width: 245px; border: 1px solid white; }
.tbody .td2{ width: 95px; border: 1px solid white; }
.tbody .td3{ width: 95px; border: 1px solid white; }
.tbody .td4{ width: 95px; border: 1px solid white; }
.tbody .td5{ width: 195px; border: 1px solid white; }

</style>


<div class="printbox">
    <ul class="fnt-ul">
        <form action="index.php?r=sybase/default/index&tid=<?=$tid?>" method="post">
        <li class="fnt ico-search">
        <span>查询</span>
        
        <select name="flow_number_src">
            <?php
                $options = ["原审案号", "案由", "当事人1", "当事人2", "承办人"];
                foreach($options as $opt){
                    if($sel == $opt){
                            echo "<option selected value='$opt'>$opt</option>";
                            continue;
                    }
                    echo "<option value='$opt'>$opt</option>";
                }
            ?>
              </select>
              <input type="text" name="flow_search_val" class="print-search">
               <?php
                    $radioes = ["审判", "执行"];
                    foreach ($radioes as $v) {
                            if($type == $v){
                                echo '<label>&nbsp;&nbsp;<input type="radio" name="flow_number_type" value="' . $v . '" checked> ' . $v . '</label>';
                                continue;
                            }
                            echo '<label>&nbsp;&nbsp;<input type="radio" name="flow_number_type" value="' . $v . '"> ' . $v . '</label>';
                    }
                ?>		 
              <label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="查询"></label>
            
        </li>
        <input type="hidden" id="tid" value="<?=$tid?>">
       </form>
</ul>
</div>
<div class="tablebook case-number">

<div class="thead">
    <div class="th0">案号</div>
    <div class="th1">案由</div>
    <div class="th2">当事人1</div>
    <div class="th3">当事人2</div>
    <div class="th4">承办人</div>
    <div class="th5">委托部门</div>
</div>

    <div class="tbody">

        <?php
          foreach($model_info as $v){
        ?>

        <div class="tr">
            <?php
              $i = 0;
              foreach($v as $_v){
                    echo "<div class='td" . $i . "' title='" . $_v . "'>" . $_v ."</div>";
                    $i++;
              }
            ?>
         </div>

            <?php
              }
            ?>
    </div>
</div>
<div id="pop"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>