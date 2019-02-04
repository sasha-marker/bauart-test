<?php
namespace frontend\widgets;

use Yii;
use common\models\Articles;
use frontend\models\ArticlesSearch;

class ArticlesListWidget extends \yii\base\Widget{
  public $_dataProvider;

  public function init(){

    $searchModel = new ArticlesSearch();
    $this->_dataProvider = $searchModel->search();

    parent::init();
  }

  public function run(){
    return $this->render('articles-list-widget', [
      'dataProvider' => $this->_dataProvider
    ]);
  }

}
?>
