<?php
namespace backend\modules\railwayCarriage\controllers;

use Yii;
use yii\filters\{VerbFilter, AccessControl};
use yii\web\{BadRequestHttpException, Controller, Response, UploadedFile};
use yii\bootstrap\ActiveForm;
use console\controllers\ParseFilesController;

use backend\modules\railwayCarriage\models\RailwayCarriageUploadForm;

class DefaultController extends Controller{

  public function behaviors()
  {
      return [
          'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'actions' => ['index', 'upload-files'],
                      'allow' => true,
                      'roles' => ['administrator'],
                  ],
              ],
          ],
      ];
  }

  public function actionIndex(){
    return $this->render('index', [
      'model' => new RailwayCarriageUploadForm()
    ]);
  }

  public function actionUploadFiles(){
    $model = new RailwayCarriageUploadForm();


    if($files = UploadedFile::getInstances($model, 'files')){
      $attachments = $model->uploads($files);

      $consoleController = new ParseFilesController('parseFilesController', Yii::$app);
      $consoleController->runAction('start', [$attachments]);

      return $this->redirect(['index']);
    }
  }

}
?>
