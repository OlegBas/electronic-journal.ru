<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin()?>
<?= $form->field($model, 'fio')->textInput(['value' => $objPeople->user['fio'],'disabled' => true])?>
<?= $form->field($model, 'prop9')->textInput(['value' => $objPeople->prop9])?>
<? echo $form->field($model, 'id')->hiddenInput(['value' => $model->id])->label(''); ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary','id' => 'saveForm']) ?>
<?php ActiveForm::end() ?>
