<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'dateOfBirth')->textInput(['type' => 'date']) ?>
    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'phone')->textInput() ?>
    <?php if(!$create) {?>
        <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true]) ?>
    <?php } else {?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?php }?>

    <?= $form->field($model, 'photo')->fileInput()?>

    <div class="form-group">
        <?= Html::submitButton('Cохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
