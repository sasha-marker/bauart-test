<?php
namespace backend\modules\railwayCarriage\models;

use Yii;
use common\models\Attachment;

class RailwayCarriageUploadForm extends \yii\db\ActiveRecord{

  public $files;

  public function rules()
  {
      return [
          [['files'], 'file', 'extensions' => 'csv', 'maxFiles' => 5],
      ];
  }

  public function attributeLabels()
  {
      return [
          'files' => 'Файлы'
      ];
  }

  public function uploads($files){
    $attachments = [];

    foreach ($files as $file) {
        $attachment = new Attachment();
        $attachment->filename = $file->baseName;
        $attachment->extension = $file->extension;
        $attachment->mime_type = $file->type;
        $attachment->size = (string)$file->size;
        $attachment->duration = 0;

        if ($attachment->save()) {
            if ($file->saveAs(Yii::getAlias('@backend') . '/web/upload-files/' . md5($attachment->id) . '.' . $attachment->extension, false)) {
                $attachments[] = $attachment->id;
            }
        }
    }
    return $attachments;
  }
}
?>
