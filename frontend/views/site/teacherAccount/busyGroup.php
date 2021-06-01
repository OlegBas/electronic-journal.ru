
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
                  <th>Название секции</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($peoples as $people) {?>
                <tr>
                  <td><?= $people->id?></td>
                  <td><?=$people->user["fio"]?></td>
                  <td><?=$people->prop11?></td>
                  <td>
                  <a href="<?=Url::to(['site/editbusypeople','id' => $people->id])?>" class="btn btn-primary " role="button" >Изменить</a>
                  </td>
                </tr>
                <?php }?>
              </tbody>
          </table>
                  