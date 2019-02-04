<?php
  use yii\bootstrap\ActiveForm;
  use kartik\file\FileInput;
  use yii\helpers\Url;
?>

  <?= FileInput::widget([
      'model' => $model,
      'name' => 'RailwayCarriageUploadForm[files][]',
      'options' => [
          'multiple' => true,
          'accept' => 'csv/*'
      ],
      'pluginOptions' => [
          'showCaption' => true,
          'showRemove' => true,
          'showUpload' => true,
          'allowedFileExtensions' => ['csv'],
          'overwriteInitial' => false,
          'uploadUrl' => Url::to(['/railwayCarriage/default/upload-files']),
          'maxFileCount' => 5
      ],
  ]);
  ?>
