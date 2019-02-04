<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class ParseFilesController extends Controller{

  public function actionStart($ids){
    echo "<pre>"; print_r($ids); die;
  }

}
?>
