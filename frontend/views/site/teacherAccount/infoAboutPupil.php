<?php
   use yii\helpers\Url;
   use yii\helpers\Html;
   use yii\widgets\Pjax;
?>

<button type="button" class="btn btn-primary buttonBack">Назад</button>
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
                        <td>Телефон</td>
                        <td id = "dateOfBirth"><?=$people->user['phone']?></td>
                     </tr>
                     <tr>
                        <td>Место жительство</td>
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
                        <td>Место жительство</td>
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
               <h4>Ведомость</h4>
               <div class="table-responsive ">
               <div class="table-responsive ">
                  <table class="table table-hover table-bordered">
                     <thead>
                     <tr>
                        <th>Предметы</th>
                        <th colspan = "4">Оценки</th>
                     </tr>
                        <tr>
                           <th>Предметы</th>
                           <th>1 четв.</th>
                           <th>2 четв.</th>
                           <th>3 четв.</th>
                           <th>4 четв.</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php 
                     // print_r($subjects);
                     if(!$addPeople) {
                     foreach($subjects as $subject) {?>
                        <tr>

                           <td><?=$subject->title?></td>
                           <?php for($i = 1;$i <= count($subject->grades);$i++) {?>
                              <td>
                              <?=$subject->grades[$i]?>
                              </td>
                           <?php }?>
                        </tr>
                        <?php }?>
                        <?php } else {?>
                          <?php foreach($subjects as $subject) {?>
                           <tr> 
                           
                           <td><?=$subject->title?></td>
                           
                              <td>
                                 <input type="number" name="mark1" id="inputmark1" class="form-control" value="0" >
                              </td>
                        </tr>


                        <?php }}?>
                        <tr>
                           <td colspan = "5">Средний балл за год: <?=$subject->avg?></td>
                        </tr>

                     </tbody>

                  </table>
               </div>
               </div>
               
               <a href="<?=Url::to(['site/edit','id' => $people->id])?>" class="btn btn-primary " role="button" >Изменить</a>