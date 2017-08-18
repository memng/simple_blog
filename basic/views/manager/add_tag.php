<?php
use yii\bootstrap\ActiveForm;

?>
<h2 class="sub-header">Add tag</h2>
<?php $form = ActiveForm::begin([
      'id' => 'login-form',
      'fieldConfig' => [
          'template' => "{label}{input}{error}",
          'inputOptions' => ['class' => 'form-control'],
      ],
  ]); ?>

      <?= $form->field($model, 'name',['inputOptions' =>['placeholder'=>'name']]) ?>

     <button class="btn btn-lg btn-primary btn-block" type="submit">add Tag</button>
  <?php ActiveForm::end(); ?>
   

