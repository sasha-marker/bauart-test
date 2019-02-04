<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\BaseConsole;
use common\models\User;

class UserController extends Controller{

  public function actionCreateAdmin(){

    $user = new User();

    $user->username = 'administrator';
    $user->firstname = 'Sasha';
    $user->lastname = 'Baksheev';
    $user->role = 'administrator';
    $user->sex = User::MALE;
    $user->status = User::STATUS_ACTIVE;
    $user->email = 'baksheev.a.a@makeforu.ru';
    $user->phone = '79639570923';
    $user->setPassword('otkproject');
    $user->generateAuthKey();
    $user->validate();

    if($user->save()){
      $resault = $this->ansiFormat('Пользователь создан', BaseConsole ::FG_GREEN);
      echo "\n $resault \n";
    }
  }

}
?>
