<?php
use yii\helpers\Html;

$this->title = 'Ученики';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = "Иванов Иван Иванович";
$this->params['breadcrumbs'][] = "Математика";
?>

<h3><?=$user->fio?>/ <?=$subject?></h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <td scope="col">Оценки</td>
      <td scope="col"></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="col">Cредний балл</td>
      <td scope="col"><?=array_sum($gradesArr) / count($gradesArr)?></td>
    </tr>
    <tr>
      <td scope="col">Оценки</td>
      <td scope="col"><?=implode(",",$gradesArr)?></td>
    </tr>
    <tr>
      <td scope="col">Cредний балл</td>
      <td scope="col">4.6</td>
    </tr>
    <tr>
      <td scope="col">Cредний балл</td>
      <td scope="col">4.6</td>
    </tr>

  </tbody>
</table>
