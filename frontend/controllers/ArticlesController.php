<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\{BadRequestHttpException, Controller};
use yii\helpers\Json;

use common\models\Articles;

class ArticlesController extends Controller{

  public function actionIndex(){

    return $this->render('index', [
      'article' => new Articles()
    ]);

  }

  public function actionCreate(){
    $article = new Articles();

    if($article->load(Yii::$app->request->post()) && $article->validate()){

      $article->save(false);

      return Json::encode([
        'id' => $article->id,
        'title' => $article->title
      ]);
    }
  }

  public function actionDelete(){
    if($article = Articles::find()->where(['id' => Yii::$app->request->post('id')])->one()){

      if($article->delete()){
        return Json::encode([
          'status' => 'success'
        ]);
      }
    }
  }

  public function actionView(){
    if($article = Articles::find()->where(['id' => Yii::$app->request->post('id')])->one()){

      return Json::encode([
        'id' => $article->id,
        'title' => $article->title,
        'text' => $article->text,
        'date' => \Yii::$app->formatter->asDate($article->created_at, 'php: d-m-Y')
      ]);
    }

  }

}
?>
