<?php
    use app\assets\InputAsset;
    InputAsset::register($this);
    $this->registerJs($script);
?>
<input type="hidden" id="__pop">