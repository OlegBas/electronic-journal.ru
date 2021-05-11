<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
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
                      <td>Иванов Петр Иванович</td>
                      
                    </tr>
                    <tr>
                      <td><b>Дата рождения</b></td>
                      <td>19.01.2004 г</td>
                    </tr>
                    <tr>
                      <td><b>Возвраст</b></td>
                      <td>10 лет</td>
                    </tr>
                    <tr>
                      <td><b>Адрес</b></td>
                      <td>Строителей д. 18 кв.3</td>
                    </tr>
                    <tr>
                      <td><b>Класс</b></td>
                      <td>5В</td>
                    </tr>
                    <tr>
                      <td><b>ФИО классного руководителя</b></td>
                      <td>Арсеньтева Ирина Сергеевна</td>
                    </tr>
                    <tr>
                      <td><b>Номер телефона:</b></td>
                      <td>
                         +7 (928) 144 589 20
                      </td>
                    </tr>
                    <tr>
                      <td><b>Номер телефона родителей</b></td>
                      <td>
                        <b>мать:</b>  +7 (928) 144 589 96<br>
                        <b>отец:</b>+7 (928) 144 589 97
                      </td>
                    </tr>
                    <tr>
                      <td><b>ФИО родителей </b></td>
                      <td>
                        <b>мать:</b> Иванова Клавдия Петровна<br>
                        <b>отец:</b> Иванов Сергей Викторович
                      </td>
                    </tr>
                    <tr>
                      <td><b>Средний балл обучения</b></td>
                      <td>4,5</td>
                    </tr>
                    <tr>
                      <td><b>E-mail</b></td>
                      <td>ivanov@mail.ru</td>
  
                    </tr>
                    <tr>
                      <td><b>Пароль</b></td>
                      <td>******</td>
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
                          <form role="form">
                            <div class="form-group">
                              <label for="exampleInputFio">ФИО</label>
                              <input type="email" class="form-control" id="exampleInputFio" placeholder="Введите ФИО ">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputAge">Дата рождения:</label>
                              <input type="date" class="form-control" id="exampleInputAge" placeholder="Введите дату рождения">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputAge">Номер телефона:</label>
                              <input type="phone" class="form-control" id="exampleInputPhone" placeholder="Введите номер телефона">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Email:</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите email">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Пароль:</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
                            </div>
                            <button type="button" class="btn btn-primary">Сохранить</button>
                          </form>
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

