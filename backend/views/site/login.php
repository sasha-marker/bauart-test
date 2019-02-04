<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="body">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <div class="msg">Для работы необходимо авторизоваться</div>

        <?= $form->field($model, 'email', [
            'template' => "<div class=\"input-group\">
                <span class=\"input-group-addon\">
                    <i class=\"material-icons\">person</i>
                </span>
                <div class=\"form-line\">
                    {input}
                    {error}
                </div>
            </div>"
        ])->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('email')]) ?>

        <?= $form->field($model, 'password', [
            'template' => "<div class=\"input-group\">
                        <span class=\"input-group-addon\">
                            <i class=\"material-icons\">lock</i>
                        </span>
                <div class=\"form-line\">
                    {input}
                    {error}
                </div>
            </div>"
        ])->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8 p-t-5">
                <?= Html::activeCheckbox($model, 'rememberMe', ['class' => 'filled-in chk-col-pink', 'label' => false]) ?>
                <label for="loginform-rememberme">Запомнить меня</label>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-block bg-pink waves-effect', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
