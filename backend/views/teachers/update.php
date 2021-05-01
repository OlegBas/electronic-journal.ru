<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Teachers */

$this->title = 'Обновить информацию об учителе: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Учителя', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="teachers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
