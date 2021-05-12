<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Электронный журнал - ученик';
?>

<div class="container page">
      <div class="row">
        <div class="col-md-8">
          <ul class="nav nav-tabs">
            <li  class="active"><a  data-toggle="tab" href="#lkInfo" aria-expanded="true">Личная информация</a></li>
            <li><a data-toggle="tab" href="#grades" >Успеваемость</a></li>
            <li><a data-toggle="tab" href="#timetable" >Рассписание уроков</a></li>
            <li><a data-toggle="tab" href="#plans" >Домашние задания</a></li>
          </ul>

          <div class="tab-content">
            <div class = "tab-pane active" id="lkInfo">
              <div class="row">
                <div class="col-md-6">
                  <table class = "table">
                    <tr>
                      <td><b>ФИО</b></td>
                      <td><?=$user->fio?></td>
                      
                    </tr>
                    <tr>
                      <td><b>Дата рождения</b></td>
                      <td><?=$user->dateOfBirth?></td>
                    </tr>
                    <tr>
                      <td><b>Возвраст</b></td>
                      <td><?=$peopleAge?> лет</td>
                    </tr>
                    <tr>
                      <td><b>Адрес</b></td>
                      <td><?=$user->address?></td>
                    </tr>
                    <tr>
                      <td><b>Класс</b></td>
                      <td><?=$classPeople->title?></td>
                    </tr>
                    <tr>
                      <td><b>ФИО классного руководителя</b></td>
                      <td><?=$fioClRuk?></td>
                    </tr>
                    <tr>
                      <td><b>Номер телефона:</b></td>
                      <td>
                      <?=$user->phone?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Номер телефона родителей</b></td>
                      <td>
                        <b>мать:</b>  <?=$parentsPeople[1]->phone?><br>
                        <b>отец:</b><?=$parentsPeople[0]->phone?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>ФИО родителей </b></td>
                      <td>
                        <b>мать:</b> <?=$parentsPeople[1]->fio?><br>
                        <b>отец:</b> <?=$parentsPeople[0]->fio?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Средний балл обучения</b></td>
                      <td><?=$avgGrade?></td>
                    </tr>
                    <tr>
                      <td><b>E-mail</b></td>
                      <td><?=$user->email?></td>
  
                    </tr>
                  </table>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPrivateInfo">
                    Изменить 
                  </button>
                  <div class="modal fade" id = "editPrivateInfo">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Личный данные/Изменить</h4>
                        </div>
                        <div class="modal-body">
                          <?php $form = ActiveForm::begin([
                            'id' => 'lkdata-form',
                          ]) ?>
                            <?= $form->field($model, 'fio')->textInput(['placeholder' => 'Введите ФИО'])?>
                            <?= $form->field($model, 'dateOfBirth')->input('date') ?>
                            <?= $form->field($model, 'email')->input('email') ?>
                            <?= $form->field($model, 'phone')->input('tel') ?>
                            <?= $form->field($model, 'password')->input('password') ?>
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                          <?php ActiveForm::end() ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class = "tab-pane" id="grades">
              <div class="row">
                <div class="col-md-6">
                  <table class = "table">
                    <tr>
                      <td><b>ID</b></td>
                      <td><b>Наименование</b></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td><a href="#" data-toggle="modal" data-target="#infoGrade">Математика</a></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><a href="#" data-toggle="modal" data-target="#infoGrade">Физика</a></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="modal fade" id="infoGrade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title"><b>Предмет:</b> Математика</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12" >
                          <form class="form-inline" role="form">
                            <div class="form-group">
                              <label for="exampleInputPart">Выберите четверть:</label>
                              <select class="form-control input-sm" id = "exampleInputPart">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Применить</button>
                          </form>
                          <br>
                          <br>
                          <table class = "table">
                            <tr>
                              <td>КР1</td>
                              <td>КР2</td>
                              <td>КР3</td>
                              <td>КР4</td>
                              <td>КР5</td>
                              <td>СР балл по предмету</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>4</td>
                              <td>5</td>
                              <td>5</td>
                              <td>5</td>
                              <td>4,5</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
            
                  </div>
                </div>
              </div>
            </div>
            <div class = "tab-pane" id="timetable">
              <table class="table">
                <tr>
                  <th>Уроки</th>
                  <th>1-й</th>
                  <th>2-й</th>
                  <th>3-й</th>
                  <th>4-й</th>
                  <th>5-й</th>
                  <th>6-й</th>
                  <th>7-й</th>
               </tr>
               <tr>
                 <td>
                  Время
                 </td>
                 <td>08:40-10:15</td>
                 <td>08:40-10:15</td>
                 <td>08:40-10:15</td>
                 <td>08:40-10:15</td>
                 <td>08:40-10:15</td>
                 <td>08:40-10:15</td>
                 <td>08:40-10:15</td>
               </tr>
               <tr>
                 <td>Пнд,03 мая</td>
                 <td>Математика <br><b class = "cab">203 каб</b></td>
                 <td>Физика <br><b class = "cab">203 каб</b></td>
                 <td>Литература <br><b class = "cab">203 каб</b></td>
                 <td>Английский язык <br><b class = "cab">203 каб</b></td>
                 <td>История <br><b class = "cab">203 каб</b></td>
                 <td>ИЗО <br><b class = "cab">203 каб</b></td>
                <td>-</td>
                </tr>
               <tr>
                <td>Вт,04 мая</td>
                <td>Математика <br><b class = "cab">203 каб</b></td>
                <td>Физика <br><b class = "cab">203 каб</b></td>
                <td>Литература <br><b class = "cab">203 каб</b></td>
                <td>Английский язык <br><b class = "cab">203 каб</b></td>
                <td>История <br><b class = "cab">203 каб</b></td>
                <td>ИЗО <br><b class = "cab">203 каб</b></td>
                <td>-</td>
              </tr>
              <tr>
                <td>Ср,05 мая</td>
                <td>Математика <br><b class = "cab">203 каб</b></td>
                <td>Физика <br><b class = "cab">203 каб</b></td>
                <td>Литература <br><b class = "cab">203 каб</b></td>
                <td>Английский язык <br><b class = "cab">203 каб</b></td>
                <td>История <br><b class = "cab">203 каб</b></td>
                <td>ИЗО <br><b class = "cab">203 каб</b></td>
                <td>-</td>
              </tr>
              <tr>
                <td>Чт,06 мая</td>
                <td>Математика <br><b class = "cab">203 каб</b></td>
                <td>Физика <br><b class = "cab">203 каб</b></td>
                <td>Литература <br><b class = "cab">203 каб</b></td>
                <td>Английский язык <br><b class = "cab">203 каб</b></td>
                <td>История <br><b class = "cab">203 каб</b></td>
                <td>ИЗО <br><b class = "cab">203 каб</b></td>
                <td>-</td>
              </tr>
              </table>
            </div>

            <div class = "tab-pane" id="plans">
              <br>
              <form class="form-inline" role="form">
                <div class="form-group">
                  <label for="exampleSelectSubject">Выберите предмет:</label>
                  <select class="form-control input-sm" id = "exampleSelectSubject">
                    <option value="1">Математика</option>
                    <option value="2">Физика</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Применить</button>
              </form>
              <br>
              <table class="table">
                <tr>
                  <th>ID</th>
                  <th>Задание</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Решение линейных уравнений</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Основы кинематики</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        
      </div>
    </div>

