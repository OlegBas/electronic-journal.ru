<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin()?>
<?= $form->field($model, 'fio')->textInput(['value' => $objPeople->user['fio'],'disabled' => true])?>
<?= $form->field($model, 'prop1')->dropDownList(['-' => 'Нет', '+' => 'Да'], [
     'options' => [
             $objPeople->prop1 => ['selected' => true] 
     ]
]);?>
<?= $form->field($model, 'prop2')->dropDownList(['-' => 'Нет', '+' => 'Да'], [
     'options' => [
             $objPeople->prop2 => ['selected' => true] 
     ]
]);?>
<?= $form->field($model, 'prop3')->dropDownList(['-' => 'Нет', '+' => 'Да'], [
     'options' => [
             $objPeople->prop3 => ['selected' => true] 
     ]
]);?>
<?= $form->field($model, 'prop4')->dropDownList(['-' => 'Нет', '+' => 'Да'], [
     'options' => [
             $objPeople->prop4 => ['selected' => true] 
     ]
]);;?>
<?= $form->field($model, 'prop5')->dropDownList(['-' => 'Нет', '+' => 'Да'], [
     'options' => [
             $objPeople->prop5 => ['selected' => true] 
     ]
]);?>
<?= $form->field($model, 'prop6')->dropDownList(['-' => 'Нет', '+' => 'Да'], [
     'options' => [
             $objPeople->prop6 => ['selected' => true] 
     ]
]);;?>
<?= $form->field($model, 'prop7')->dropDownList(['-' => 'Нет', '+' => 'Да'], [
     'options' => [
             $objPeople->prop7 => ['selected' => true] 
     ]
]);?>
 <? echo $form->field($model, 'id')->hiddenInput(['value' => $model->id])->label(''); ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary','id' => 'saveForm']) ?>
<?php ActiveForm::end() ?>
