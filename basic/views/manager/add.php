<?php
use yii\bootstrap\ActiveForm;

?>
<h2 class="sub-header">Add article</h2>
<?php $form = ActiveForm::begin([
      'id' => 'login-form',
      'fieldConfig' => [
          'template' => "{label}{input}{error}",
          'inputOptions' => ['class' => 'form-control'],
      ],
  ]); ?>

      <?= $form->field($model, 'title',['inputOptions' =>['placeholder'=>'title']]) ?>

      <?= $form->field($model, 'content',['inputOptions' =>['placeholder'=>'content']])->textarea() ?>

      <?= $form->field($model, 'author',['inputOptions' =>['placeholder'=>'author']]) ?>
      <?=  $form->field($articleTag,'tag_id')->checkboxList($tags);?>

     <button class="btn btn-lg btn-primary btn-block" type="submit">add Article</button>
  <?php ActiveForm::end(); ?>
   

