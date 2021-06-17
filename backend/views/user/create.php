<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Новый классный руководитель';
$this->params['breadcrumbs'][] = ['label' => 'Классные руководители', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'create' => 'true',
        'classes' => $classes,
    ]) ?>

</div>
