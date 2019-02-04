<?php
  use yii\widgets\ListView;
?>

<ul class="articles-list">
  <?= ListView::widget([
    'dataProvider' => $dataProvider,
    // 'pager' => [
    // 		'disabledPageCssClass' => 'pagination__disable-link',
    // 		'options' => ['class' => 'pagination'],
    // ],
    'itemView' => '_articles-list-widget_item',
    'itemOptions' => ['class' => 'item'],
    'layout' => "{items}{pager}",
    'emptyText' => ''
  ]); ?>
</ul>
