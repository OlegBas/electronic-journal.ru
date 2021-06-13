<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ClassesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'idClRuk') ?>

    <?= $form->field($model, 'prop1') ?>

    <?= $form->field($model, 'prop2') ?>

    <?php // echo $form->field($model, 'prop3') ?>

    <?php // echo $form->field($model, 'prop4') ?>

    <?php // echo $form->field($model, 'prop5') ?>

    <?php // echo $form->field($model, 'prop6') ?>

    <?php // echo $form->field($model, 'prop7') ?>

    <?php // echo $form->field($model, 'prop8') ?>

    <?php // echo $form->field($model, 'prop9') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
