<?php
  use yii\bootstrap\ActiveForm;
  use yii\helpers\Html;

  $this->registerJsFile('/js/articles.js', ['depends' => [\yii\web\JqueryAsset::class]]);
?>

<?php $form = ActiveForm::begin([
  'enableAjaxValidation' => false,
  'enableClientValidation' => true,
  'validationUrl' => '/articles/validate-form',
  'method' => 'POST',
  'options' => [
     'id' => 'articles-form',
     'class' => 'articles-form'
  ],
  'fieldConfig' => [
    'template' => '{input}'
  ]
]); ?>

  <?= $form->field($article, 'title')->textInput(['maxlength' => true, 'placeholder' => $article->getAttributeLabel('title')]) ?>

  <?= $form->field($article, 'text')->textArea(['maxlength' => true, 'placeholder' => $article->getAttributeLabel('text')]) ?>

  <div class="text-right">
    <?= Html::button('Добавить', ['id' => 'add-article', 'class' => 'btn btn-purple']) ?>
  </div>

<?php ActiveForm::end(); ?>
