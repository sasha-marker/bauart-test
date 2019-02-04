<?php

use yii\helpers\Html;

$user = Yii::$app->user->identity;
?>

<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false"><?= $user ? 'Пользователь: ' . $user->username : null ?></div>
             <div class="name" data-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false"><?= $user ? 'E-mail: ' . $user->email : null ?></div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">ГЛАВНОЕ МЕНЮ</li>
            <li>
                <?= Html::a("<i class=\"material-icons\">help_outline</i>
                    <span>Главная</span>", \yii\helpers\Url::to(['/'])) ?>
            </li>
            <li>
                <?= Html::a("<i class=\"material-icons\">train</i>
                    <span>Вагоны</span>", \yii\helpers\Url::to(['/railway-carriage']))?>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
