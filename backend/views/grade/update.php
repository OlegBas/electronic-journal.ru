<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Grade */

$this->title = 'Обновить оценку: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Оценки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="grade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
