<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'CaseNumber')->textInput() ?>  


<?php ActiveForm::end(); ?>