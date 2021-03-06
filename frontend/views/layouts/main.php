<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">

    <?php
    NavBar::begin([
        'brandLabel' => "<div id = 'logoBlock'><img id = 'logo' src = 'web/images/logo.png'> Электронный журнал классного руководителя</div>",   
        'options' => [
            'class' => 'navbar-inverse ',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Авторизация', 'url' => ['/site/login']];
        
    } else {

        $menuItems[] = '<li>'

        
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выход (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?> 

    <div class="container " id = "contentPage">
       
        <?= Alert::widget() ?>
        <button type="button" class="btn btn-primary" id = "toggleVersion">Версия для слабовидящих</button>
        <div id = "version" >
            <button type="button" class="btn btn-primary" id = "zoomIn">Увеличить</button>
            <button type="button" class="btn btn-primary" id = "zoomOut">Уменьшить</button>
            <!-- <button type="button" class="btn btn-primary" id = "bgWhite">Белый фон</button> -->
        </div>
        
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
