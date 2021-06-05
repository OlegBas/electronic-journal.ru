
<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
?>
<?php if(isset($addPeople)) {?>
<h3>Создание карточки ученика</h3>
<?php } else {?>
<h3>Редактирование карточки ученика</h3>
<?php }?>
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
                        <?= $form->field($model, 'fio')->textInput(['value' => ($model->fio) ? $model->fio : 'Иванов Сергей Петрович'])->label('')?>
                        </td>
                     </tr>
                     <?php if(isset($addPeople)) {?>
                     <tr>
                        <td>Пол</td>
                        <td id = "genderPeople">
                        <?= $form->field($model, 'gender')->dropDownList([
                           0 => 'муж',
                           1 => 'жен.',
                        ])->label('')?>
                        </td>
                     </tr>
                     <?php }?>
                     <tr>
                        <td>Фото</td>
                        <td>
                           <?=$form->field($model, 'photo')->fileInput()->label('');?>
                        </td>
                     </tr>

                     <tr>
                        <td>Дата рождения</td>
                        <td id = "dateOfBirth">
                        <?= $form->field($model, 'dateOfBirth')->input('date',['value' => ($model->dateOfBirth) ? $model->dateOfBirth : '1980-12-31' ])->label('')?>
                        </td>
                     </tr>
                     <tr>
                        <td>Место жительства</td>
                        <td>

                        <?= $form->field($model, 'address')->textarea(['value' => ($model->address) ? $model->address : 'ул. Строителей д.6 кв. 10'])->label('')?>
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
                        <td><?= $form->field($model, 'fioFather')->textInput(['value' => ($model->fioFather) ? $model->fioFather : 'Иванов Александр Васильевич'])->label('')?></td>
                        <td><?= $form->field($model, 'fioMother')->textInput(['value' => ($model->fioMother) ? $model->fioMother : 'Иванова Марина Васильевна'])->label('')?></td>
                     </tr>
                     <tr>
                        <td>место работы</td>
                        <td><?= $form->field($model, 'placeWorkFather')->textInput(['value' => ($model->placeWorkFather) ? $model->placeWorkFather : 'ул. Кривая д.6'])->label('')?></td>
                        <td><?= $form->field($model, 'placeWorkMother')->textInput(['value' => ($model->placeWorkMother) ? $model->placeWorkMother : 'ул. Кривая д.7'])->label('')?></td>
                     </tr>
                     <tr>
                        <td>адрес</td>
                        <td><?= $form->field($model, 'addressFather')->textInput(['value' => ($model->addressFather) ? $model->addressFather : 'ул. Береговая д.6 кв. 15'])->label('')?></td>
                        <td><?= $form->field($model, 'addressMother')->textInput(['value' => ($model->addressMother) ? $model->addressFather : 'ул. Береговая д.6 кв. 15'])->label('')?></td>
                     </tr>
                     <tr>
                        <td>телефон</td>
                        <td><?= $form->field($model, 'phoneFather')->textInput(['value' => ($model->phoneFather) ? $model->phoneFather : '345678'])->label('')?></td>
                        <td><?= $form->field($model, 'phoneMother')->textInput(['value' => ($model->phoneMother) ? $model->phoneMother : '24343' ])->label('')?></td>
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
                        <td><?= $form->field($model, 'family')->textarea(['value' => ($model->family) ? $model->family : 'браться'])->label('')?></td>
                     </tr>
                     <tr>
                        <td>Социальная активность, увлечения, интересы</td>
                        <td><?= $form->field($model, 'activity')->textarea(['value' => ($model->activity) ? $model->activity : 'нет'])->label('')?></td>
                     </tr>
                  </tbody>
               </table>
               <h3>Характеристика студента</h3>
               <p>
               <?= $form->field($model, 'characteric')->textarea(['value' => ($model->characteric) ? $model->characteric : 'отсутствует'])->label('')?>
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
                              <input type="number" name="Grades[<?=$subject->id?>_<?=$i?>_<?=$_GET['id']?>]" id="inputmark1" class="form-control" value="<?=$subject->grades[$i]?>" >
                              </td>
                           <?php }?>
                        </tr>
                        <?php }?>
                        <?php } else {?>
                          <?php foreach($subjects as $subject) { ?>
                           <tr> 
                           <td><?=$subject->title?></td>
                           <?php for($i = 1;$i <= 4;$i++) {?>
                           
                              <td>
                                 <input type="number" name="Grades[<?=$subject->id?>_<?=$i?>]" id="inputmark1" class="form-control" value="0" >
                              </td>
                           <?php }?>
                           
                        </tr>


                        <?php }}?>
                     </tbody>
                  </table>
               </div>
               <? echo $form->field($model, 'idPeople')->hiddenInput(['value' => $model->idPeople])->label(''); ?>
               <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary','id' => 'saveForm']) ?>
 <?php ActiveForm::end() ?>
      