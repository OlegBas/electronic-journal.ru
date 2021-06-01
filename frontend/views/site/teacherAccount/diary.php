
<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p><?=$user->classes->prop9?></p>

<a href="<?=Url::to(['site/editdiary','id' => $people->id])?>" class="btn btn-primary " role="button" >Изменить</a>