<?php
  use frontend\widgets\ArticlesListWidget;

  $this->title = 'Articles';
?>

<div class="article-index">
  <div class="site-index">
    <div class="row">
      <div class="col-sm-4">
        <?= ArticlesListWidget::widget(); ?>
      </div>
      <div class="col-sm-offset-2 col-sm-6">
        <?= $this->render('_form-article', [
          'article' => $article
        ]); ?>

        <div class="articles-view hidden"></div>

      </div>
    </div>
  </div>
</div>
