<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для авторизации :</p>
    
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

            
                <div style="color:#999;margin:1em 0">
                    <!-- Если вы забыли пароль, то можете восставить его <?= Html::a('reset it', ['site/request-password-reset']) ?>. -->
                    <br>
                    <!-- Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?> -->
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Авторизация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
