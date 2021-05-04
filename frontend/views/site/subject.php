<?php
use yii\helpers\Html;

$this->title =  $user->fio;
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $user->fio;
$this->params['breadcrumbs'][] = $subject->title;
?>

<h3><?=$user->fio?>/ <?=$subject->title?></h3>
<table class="table">
  <tbody>
  <tr>
      <td scope="col">Оценки</td>
      <td scope="col"><?=join(",",$gradesArr)?></td>
    </tr>
    <tr>
      <td scope="col">Cредний балл</td>
      <td scope="col"><?=array_sum($gradesArr) / count($gradesArr)?></td>
    </tr>

  </tbody>
</table>
