
<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Учебный год</td>
                  <td>2021</td>
                </tr>
                <tr>
                  <td>ФИО классного руководителя</td>
                  <td><?=$user->classes->fioClRuk?></td>
                </tr>

                <tr>
                  <td>Количество человек</td>
                  <td><?=$user->classes->countPupils?></td>
                </tr>
                <tr>
                  <td>Из них:</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Юношей:</td>
                  <td><?=$user->classes->countMalePupils?></td>
                </tr>
                <tr>
                  <td>Девушек:</td>
                  <td><?=$user->classes->countFemalePupils?></td>
                </tr>
                <tr>
                  <td>Староста класса:</td>
                  <td><?=$user->classes->prop1?></td>
                </tr>
                <tr>
                  <td>Заместитель старосты</td>
                  <td><?=$user->classes->prop2?></td>
                </tr>
                <tr>
                  <td>Председатель учебно-производственного сектора</td>
                  <td><?=$user->classes->prop3?></td>
                </tr>
                <tr>
                  <td>Председатель сектора дисциплины и порядка</td>
                  <td><?=$user->classes->prop4?></td>
                </tr>
                <tr>
                  <td>Председатель научно технического сектора</td>
                  <td><?=$user->classes->prop5?></td>
                </tr>
                <tr>
                  <td>Председатель спортивного сектора</td>
                  <td><?=$user->classes->prop6?></td>
                </tr>
                <tr>
                  <td>Председатель культурно-массового сектора</td>
                  <td><?=$user->classes->prop7?></td>
                </tr>
                <tr>
                  <td>Председатель информационно-издательского сектора</td>
                  <td><?=$user->classes->prop8?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
          </table>
          <a href="<?=Url::to(['site/editaboutgroup','id' => $user->classes->id,'idClRuk' => $user->id])?>" class="btn btn-primary " role="button" >Изменить</a>