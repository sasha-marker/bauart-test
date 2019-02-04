<?php
namespace frontend\models;

use Yii;
use common\models\Articles;
use yii\data\ActiveDataProvider;

class ArticlesSearch extends Articles{

  public function search(){

    $query = Articles::find();

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => false
    ]);

    return $dataProvider;
  }

}
?>
