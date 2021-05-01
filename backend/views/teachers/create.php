<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Teachers */

$this->title = 'Добавить нового учителя';
$this->params['breadcrumbs'][] = ['label' => 'Учителя', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
