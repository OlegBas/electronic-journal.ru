<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin()?>
<?= $form->field($model, 'prop9')->textarea(['value' => $objClass->prop9])?>
<? echo $form->field($model, 'id')->hiddenInput(['value' => $model->id])->label(''); ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary','id' => 'saveForm']) ?>
<?php ActiveForm::end() ?>


