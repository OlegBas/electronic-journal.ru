
<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>№</th>
                  <th>ФИО</th>
                  <th>Семья полная</th>
                  <th>Семья неполная</th>
                  <th>Многодетные</th>
                  <th>Беженцы переселенцы</th>
                  <th>Родители инвалиды</th>
                  <th>Дети инвалиды</th>
                  <th>Опекаемые</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($peoples as $onePeople) {?> 
                <tr>
                  <td><?=$onePeople->id?></td>
                  <td><?=$onePeople->user["fio"]?></td>
                  <td><?=$onePeople->prop1?></td>
                  <td><?=$onePeople->prop2?></td>
                  <td><?=$onePeople->prop3?></td>
                  <td><?=$onePeople->prop4?></td>
                  <td><?=$onePeople->prop5?></td>
                  <td><?=$onePeople->prop6?></td>
                  <td><?=$onePeople->prop7?></td>
                  <td>
                    <a href="<?=Url::to(['site/editsocialmap','id' => $onePeople->id])?>" class="btn btn-primary " role="button" >Изменить</a>
                  </td>
                </tr>
                <?php }?>
              </tbody>
            </table>