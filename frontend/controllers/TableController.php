<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\{BadRequestHttpException, Controller};
use yii\helpers\Json;

use common\models\Table;

class TableController extends Controller{

  public function actionIndex(){

    $table = Table::find()->one();
    if(!$table){
      $table = new Table();
      $tableArray = [];
      for($i = 1; $i <= 100; $i++){
        for($j = 1; $j <= 100; $j++){
          $tableArray[$i][] = rand(1, 9999);
        }
      }
    }else{
      $array = json_decode($table->json_data, true);
      $tableArray = array_chunk($array, 100);

      // echo "<pre>"; print_r($tableArray); die;
    }

    return $this->render('index', [
      'table' => $table,
      'tableArray' => $tableArray
    ]);
  }

  public function actionUpdate(){
    $table = Table::find()->one();
    if(!$table){
      $table = new Table();
    }

    $table->json_data = Yii::$app->request->post('json_data');
    if($table->save()){
      $status = 'Обновлено';
    }else{
      $status = 'Ошибка';
    }

    return Json::encode([
      'status' => $status
    ]);
  }

}
