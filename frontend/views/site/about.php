<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Ученики';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = "Иванов Иван Иванович";
?>

<h3>Список дисциплин</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Наименование</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($subjects as $subject) {?>
    <tr>
      <td>   <a href="/site/about"><?=$subject->title?></a></td>
    </tr>
  <?php }?>
  </tbody>
</table>



<h3>Личная информация</h3>
<form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <td scope="col">ФИО</td>
      <td scope="col">
      <div class="form-group">
        <input type="text" class="form-control" id="" value = "Иванов Иван Иванович">
      </div>
      
      </td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="col">Возраст</td>
      <td scope="col"><div class="form-group">
        <input type="number" class="form-control" id="age" value = "14">
      </div> лет</td>
    </tr>
    <tr>
      <td scope="col">Классный руководитель</td>
      <td scope="col">Иванова А.С</td>
    </tr>
    <tr>
      <td scope="col">Информация о родителях</td>
      <td scope="col">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi minima blanditiis praesentium illo qui ipsa modi cum, veritatis ab corrupti commodi, iure, assumenda eius dolore ipsum ut nemo officia sequi?</td>
    </tr>
    <tr>
      <td scope="col">Cредний балл</td>
      <td scope="col">4.6</td>
    </tr>

  </tbody>
</table>
</form>