<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();

echo $form->field($model, "Number")->textInput();
echo $form->field($model, "Password")->textInput();
echo $form->field($model, "Name")->textInput();
echo $form->field($model, "Sex")->dropDownList([1=>'man', 0=>'woman']);
echo $form->field($model, "Position")->textInput();
echo $form->field($model, "Address")->textarea();
echo $form->field($model, "CellNumber")->textInput();
echo $form->field($model, "DepartmentNumber")->textInput();


echo Html::submitButton('提交');

ActiveForm::end();



?>

