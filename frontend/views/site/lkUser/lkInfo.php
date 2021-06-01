<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
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
                      <td><?=$user->age?></td>
                    </tr>
                    <tr>
                      <td><b>Адрес</b></td>
                      <td><?=$user->address?></td>
                    </tr>
                    <tr>
                      <td><b>Класс</b></td>
                      <td><?=$user->people->classes->title?></td>
                    </tr>
                    <tr>
                      <td><b>ФИО классного руководителя</b></td>
                      <td><?=$user->people->classes->fioClRuk?></td>
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
                        <b>мать:</b>  <?=$user->people->parents[1]->phone?><br>
                        <b>отец:</b><?=$user->people->parents[0]->phone?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>ФИО родителей </b></td>
                      <td>
                        <b>мать:</b> <?=$user->people->parents[1]->fio?><br>
                        <b>отец:</b> <?=$user->people->parents[0]->fio?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Средний балл обучения</b></td>
                      <td><?=$user->avgGrade?></td>
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
                            <?= $form->field($model, 'address')->input('text') ?>
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