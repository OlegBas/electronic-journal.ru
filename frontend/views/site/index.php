<?php
   /* @var $this yii\web\View */
   use yii\helpers\Url;
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;
   $this->title = 'Электронный журнал - ученик';

?>
<div class="container page">

<div id="carousel-id" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
        <li data-target="#carousel-id" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img data-src="https://www.fonstola.ru/download.php?file=201710/2560x1600/fonstola.ru-275272.jpg" alt="First slide" src="https://www.fonstola.ru/download.php?file=201710/2560x1600/fonstola.ru-275272.jpg">
        </div>
        <div class="item">
            <img data-src="https://w-dog.ru/wallpapers/11/2/377444531908614/priroda-les-leto-derevya.jpg" alt="First slide" src="https://w-dog.ru/wallpapers/11/2/377444531908614/priroda-les-leto-derevya.jpg">
        </div>
        <div class="item">
            <img data-src="https://w-dog.ru/wallpapers/11/2/377444531908614/priroda-les-leto-derevya.jpg" alt="First slide" src="https://w-dog.ru/wallpapers/11/2/377444531908614/priroda-les-leto-derevya.jpg">
        </div>


    </div>
    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>

   <div class="row">
      <div class="col-md-12">
         <ul class="nav nav-tabs">
         <?php for ($i=0; $i < count($actions); $i++) { ?>
            <li  ><a  data-toggle="tab" href="#<?=$actions[$i]["href"]?>" ><?=$actions[$i]["title"]?></a></li>
         <?php }?>
         </ul>
         <div class="tab-content">
            <div class = "tab-pane active" id="lkInfo">
               <?=$this->render($nameTemplateLkInfoOnRole,[
                  "user" => $user,
                  "model" => $model
                ])?>
            </div>
            <div class="tab-pane" id = "aboutGroup">
            <?=$this->render("teacherAccount/aboutGroup.php",[
                  "user" => $user,
                  "allClRuks" => $allClRuks,
               ])?>
            </div>
            <div class="tab-pane" id = "socialMapGroup">
            <?=$this->render("teacherAccount/socialMapGroup.php",[
               'peoples' => $peoples
              ])?>
            </div>
            <div class="tab-pane" id = "busyGroup">
            <?=$this->render("teacherAccount/busyGroup.php",[
                  'peoples' => $peoples
              ])?>
            </div>
            <div class="tab-pane" id = "infoAboutPupil">
            <?=$this->render("teacherAccount/infoAboutPupil.php",[
                  'people' => $people,
                  'subjects' => $subjects 

              ])?>
            </div>
            <div class = "tab-pane" id="grades">
            <?=$this->render("lkUser/grades.php",[
                  
                ])?>
            <div class = "tab-pane" id="timetable">
            <?=$this->render("lkUser/timetable.php",[
       
                ])?>
            </div>
            <div class = "tab-pane" id="diary">
            <?=$this->render("teacherAccount/diary.php",[
                  'user' => $user
                ])?>
            </div>
            <div class = "tab-pane" id="peoples">
            <?=$this->render("teacherAccount/peoples.php",[
                  'peoples' => $peoples
                ])?>
            </div>
            <div class = "tab-pane" id="plans">
            <?=$this->render("lkUser/plans.php",[
                  "user" => $user,
                  "model" => $model
                ])?>
            </div>
         </div>
      </div>
   </div>
</div>