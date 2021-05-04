<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'Главная';
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ученики</li>
  </ol>
</nav>
<h3>Список предметов</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Наименование</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($subjects as $subject) {?>

    <tr>
      <th scope="row"><?=$subject->id?></th>
      <td>   <a href="<?=Url::to(['site/subject', 'id' => $subject->id]);?>"><?=$subject->title?></a></td>
    </tr>
  <?php }?>
  </tbody>
</table>
<!-- <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav> -->