<?php
   /* @var $this yii\web\View */
   use yii\helpers\Url;
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;
   $this->title = 'Электронный журнал - ученик';

?>
<div class="container page">
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
                  'people' => $people
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