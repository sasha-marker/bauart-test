<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;

AppAsset::register($this);

$this->registerCss("
    .login-page {
        background-color: #3f51b5;
    }
");

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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <?php $this->head() ?>
</head>
<body class="login-page">
<?php $this->beginBody() ?>

<?= Alert::widget() ?>

<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin<b>PANEL</b></a>
        <small>ОТК</small>
    </div>
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
