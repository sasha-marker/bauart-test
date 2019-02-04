<?php
  use yii\helpers\Html;
  $this->registerJsFile('/js/table.js', ['depends' => [\yii\web\JqueryAsset::class]]);

  $this->title = 'Table';
?>

<div class="table-index">
  <div class="row">
    <div class="col-sm-12">
      <div class="table-array">
        <table class="table table-bordered">
          <form id="table-from">
            <tbody>

              <?php foreach($tableArray as $row => $tr):?>
                <tr>
                  <?php foreach($tr as $key => $value):?>
                    <td><input onkeyup="this.value = this.value.replace (/\D/, '')" class="form-control input-table" type="text" name="<?= $table->isNewRecord ? 'element-' . $row . '-' . $key : $value['name'] ?>" value="<?= ($table->isNewRecord) ? $value : $value['value'] ?>"></td>
                  <?php endforeach;?>
                </tr>
              <?php endforeach;?>
            </tbody>
          </form>
        </table>
      </div>
      <div class="response-block text-right">
        <p class="response-table hidden">Обновлено</p>
        <?= Html::button('Update', ['id' => 'update-table', 'class' => 'btn btn-purple' , 'style' => 'margin-top:30px;']) ?>
      </div>
    </div>
  </div>
</div>
