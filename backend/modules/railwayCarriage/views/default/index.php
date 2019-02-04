<?php
use yii\helpers\Html;

$this->title = "Вагоны";
?>

<div class="railway-carriage-index">
   <div class="card">
     <div class="header header-block">
         <h2>
             <?= Html::encode($this->title) ?>
         </h2>
     </div>
     <div class="body">
       <ul class="nav nav-tabs tab-nav-right" role="tablist">
         <li role="presentation" class="active">
             <a href="#railway-carriage-info" data-toggle="tab" aria-expanded="false">Информация</a>
         </li>
         <li role="presentation">
             <a href="#railway-carriage-load" data-toggle="tab" aria-expanded="true">Загрузка файлов</a>
          </li>
       </ul>

       <div class="tab-content">
         <div role="tabpanel" class="tab-pane fade active in" id="railway-carriage-info">
           <?= $this->render('_railway-carriage-info'); ?>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="railway-carriage-load">
           <?= $this->render('_railway-carriage-load', [
             'model' => $model
           ]); ?>
         </div>
       </div>
     </div>
   </div>
 </div>
