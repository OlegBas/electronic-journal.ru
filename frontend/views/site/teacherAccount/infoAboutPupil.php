<?php
   use yii\helpers\Url;
   use yii\helpers\Html;
   use yii\widgets\Pjax;
?>
<table class="table table-condensed table-hover" id = "infoAboutPeople">
                  <thead>
                     <tr>
                        <th></th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>ФИО</td>
                        <td id = "fioPeople"><?=$people->user['fio']?></td>
                     </tr>
                     <tr>
                        <td>Дата рождения</td>
                        <td id = "dateOfBirth"><?=$people->user['dateOfBirth']?></td>
                     </tr>
                     <tr>
                        <td>Место жительства</td>
                        <td><?=$people->user['address']?></td>
                     </tr>
                  </tbody>
               </table>
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>Родители:</th>
                        <th>Отец</th>
                        <th>Мать</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>ФИО</td>
                        <td><?=$people->parents[0]["fio"]?></td>
                        <td><?=$people->parents[1]["fio"]?></td>
                     </tr>
                     <tr>
                        <td>место работы</td>
                        <td><?=$people->parents[0]["placeWork"]?></td>
                        <td><?=$people->parents[1]["placeWork"]?></td>
                     </tr>
                     <tr>
                        <td>адрес</td>
                        <td><?=$people->parents[0]["address"]?></td>
                        <td><?=$people->parents[1]["address"]?></td>
                     </tr>
                     <tr>
                        <td>телефон</td>
                        <td><?=$people->parents[0]["phone"]?></td>
                        <td><?=$people->parents[1]["phone"]?></td>
                     </tr>
                  </tbody>
               </table>
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th></th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>Состав семьи</td>
                        <td><?=$people->prop8?></td>
                     </tr>
                     <tr>
                        <td>Социальная активность, увлечения, интересы</td>
                        <td><?=$people->prop9?></td>
                     </tr>
                  </tbody>
               </table>
               <h3>Характеристика студента</h3>
               <p>
               <?=$people->prop10?>
               </p>
               <a href="<?=Url::to(['site/edit','id' => $people->id])?>" class="btn btn-primary " role="button" >Изменить</a>