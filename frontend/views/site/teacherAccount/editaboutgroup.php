<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin()?>
<?= $form->field($model, 'year')->textInput(['value' => 2021,'disabled' => true])?>
<?= $form->field($model, 'idClRuk')->dropDownList($allClRuks, [
     'options' => [
        $objClass->idClRuk => ['selected' => true] 
     ]
])?>
<?= $form->field($model, 'prop1')->textInput(['value' => $objClass->prop1])?>
<?= $form->field($model, 'prop2')->textInput(['value' => $objClass->prop2])?>
<?= $form->field($model, 'prop3')->textInput(['value' => $objClass->prop3])?>
<?= $form->field($model, 'prop4')->textInput(['value' => $objClass->prop4])?>
<?= $form->field($model, 'prop5')->textInput(['value' => $objClass->prop5])?>
<?= $form->field($model, 'prop6')->textInput(['value' => $objClass->prop6])?>
<?= $form->field($model, 'prop7')->textInput(['value' => $objClass->prop7])?>
<?= $form->field($model, 'prop8')->textInput(['value' => $objClass->prop8])?>
<? echo $form->field($model, 'id')->hiddenInput(['value' => $objClass->id])->label(''); ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary','id' => 'saveForm']) ?>
<?php ActiveForm::end() ?>
