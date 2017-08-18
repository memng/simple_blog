<?php
use yii\bootstrap\ActiveForm;
use app\assets\SigninAsset;
use yii\captcha\Captcha;

SigninAsset::register($this);
?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">    
    <?php $this->head() ?>

    <title>Signin</title>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo \yii\helpers\Url::to('/basic/web/js/ie8-responsive-file-warning.js', true);?>"></script><![endif]-->
    <script src="<?php echo \yii\helpers\Url::to('/basic/web/js/ie-emulation-modes-warning.js', true);?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<?php $this->beginBody();?>
  <body>

    <div class="container">
         
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-signin'],
        'fieldConfig' => [
            'template' => "{label}{input}{error}",
            'labelOptions' => ['class' => 'sr-only'],
            'inputOptions' => ['class' => 'form-control'],
        ],
    ]); ?>
        <h2 class="form-signin-heading">Please sign in</h2>

        <?= $form->field($model, 'username',['inputOptions' =>['placeholder'=>'username']]) ?>

        <?= $form->field($model, 'password',['inputOptions' =>['placeholder'=>'password']])->passwordInput() ?>
        
         <?= $form->field($model, 'verifyCode',[
                                               'template' => '{input}{error}',
                                               ])
            ->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-6">{input}</div><div class="col-lg-3">{image}</div></div>',
            'options' =>['placeholder'=>'verifyCode']

        ]) ?>
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "{input} {label}{error}",
        ]) ?>
       <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <?php ActiveForm::end(); ?>

    </div> <!-- /container -->
  <?php $this->endBody()?>
  </body>
</html>
<?php $this->endPage();?>