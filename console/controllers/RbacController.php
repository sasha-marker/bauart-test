<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller{
  public function actionInit(){
    $auth = \Yii::$app->authManager;

    $user = $auth->createRole('user');
    $user->description = 'Пользователь';
    $auth->add($user);

    $admin = $auth->createRole('administrator');
    $admin->description = 'Администратор';
    $auth->add($admin);
    $auth->addChild($admin, $user);

    exit("\nРоли успешно созданы\n\r");
  }
}

?>
