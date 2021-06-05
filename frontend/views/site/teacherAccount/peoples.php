<?php
   use yii\helpers\Url;
   use yii\helpers\Html;
   use yii\widgets\Pjax;
?>

<div class="row">
<a href="<?=Url::to(['site/addpeople','mode' => 'add'])?>" class="btn btn-primary " role="button" >Добавить</a>

</div>
<div class="row">
<?php foreach($peoples as $people) {?>
    <div class="col-md-3 card">
        <div class="thumbnail">
        <img
            src="https://www.mikrox.com.tr/wp-content/uploads/2020/07/canlidestek.jpeg"
            alt="..."
            class="img-circle"
        />
        <div class="caption">
            <h3><?=$people->user['fio']?></h3>
            <p>
            <a href="<?=Url::to(['site/people','id' => $people->id])?>" class="btn btn-primary linkAboutPeople" role="button"  >Подробнее</a>
            </p>
        </div>
        </div>
    </div>
    <?php }?>
</div>

