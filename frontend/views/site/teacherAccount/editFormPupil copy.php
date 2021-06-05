
<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin() ;
?>
<h3>Редактирование карточки ученика</h3>
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
                        <td id = "fioPeople">
                        <?= $form->field($model, 'fio')->textInput(['value' => $model->fio])->label('')?>
                        </td>
                     </tr>
                     <tr>
                        <td>Дата рождения</td>
                        <td id = "dateOfBirth">
                        <?= $form->field($model, 'dateOfBirth')->input('date',['value' => $model->dateOfBirth])->label('')?>
                        </td>
                     </tr>
                     <tr>
                        <td>Место жительства</td>
                        <td>

                        <?= $form->field($model, 'address')->textarea()->label('')?>
                        </td>
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
                        <td><?= $form->field($model, 'fioFather')->textInput(['value' => $model->fioFather])->label('')?></td>
                        <td><?= $form->field($model, 'fioMother')->textInput(['value' => $model->fioMother])->label('')?></td>
                     </tr>
                     <tr>
                        <td>место работы</td>
                        <td><?= $form->field($model, 'placeWorkFather')->textInput(['value' => $model->placeWorkFather])->label('')?></td>
                        <td><?= $form->field($model, 'placeWorkMother')->textInput(['value' => $model->placeWorkMother])->label('')?></td>
                     </tr>
                     <tr>
                        <td>адрес</td>
                        <td><?= $form->field($model, 'addressFather')->textInput(['value' => $model->addressFather])->label('')?></td>
                        <td><?= $form->field($model, 'addressMother')->textInput(['value' => $model->addressMother])->label('')?></td>
                     </tr>
                     <tr>
                        <td>телефон</td>
                        <td><?= $form->field($model, 'phoneFather')->textInput(['value' => $model->phoneFather])->label('')?></td>
                        <td><?= $form->field($model, 'phoneMother')->textInput(['value' => $model->phoneMother])->label('')?></td>
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
                        <td><?= $form->field($model, 'family')->textarea()->label('')?></td>
                     </tr>
                     <tr>
                        <td>Социальная активность, увлечения, интересы</td>
                        <td><?= $form->field($model, 'activity')->textarea()->label('')?></td>
                     </tr>
                  </tbody>
               </table>
               <h3>Характеристика студента</h3>
               <p>
               <?= $form->field($model, 'characteric')->textarea()->label('')?>
               </p>
               <h4>Ведомость</h4>
               <div class="table-responsive ">
                  <table class="table table-hover table-bordered">
                     <thead>
                     <tr>
                        <th>Предметы</th>
                        <th colspan = "4">Оценки</th>
                     </tr>
                        <tr>
                           <th>Предметы</th>
                           <th>1 сем.</th>
                           <th>2 сем.</th>
                           <th>3 сем.</th>
                           <th>4 сем.</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Математика</td>
                           <td>3</td>
                           <td>4</td>
                           <td>3</td>
                           <td>5</td>
                        </tr>
                        <tr>
                           <td>Русский</td>
                           <td>5</td>
                           <td>4</td>
                           <td>5</td>
                           <td>5</td>
                        </tr>
                        <tr>
                           <td>Англ.</td>
                           <td>4</td>
                           <td>4</td>
                           <td>5</td>
                           <td>4</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <? echo $form->field($model, 'idPeople')->hiddenInput(['value' => $model->idPeople])->label(''); ?>
               <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary','id' => 'saveForm']) ?>
 <?php ActiveForm::end() ?>
      