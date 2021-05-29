<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Здравствуйте, <?= $user->username ?>,

Для восстановления папроля, необходимо перейти по ссылке ниже:
<?= $resetLink ?>
