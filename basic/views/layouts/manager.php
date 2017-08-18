<?php
use yii\bootstrap\ActiveForm;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>manager system</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo \yii\helpers\Url::to('/basic/web/css/bootstrap.min.css', true);?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo \yii\helpers\Url::to('/basic/web/css/ie10-viewport-bug-workaround.css', true);?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo \yii\helpers\Url::to('/basic/web/css/dashboard.css', true);?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo \yii\helpers\Url::to('/basic/web/js/ie8-responsive-file-warning.js', true);?>"></script><![endif]-->
    <script src="<?php echo \yii\helpers\Url::to('/basic/web/js/ie-emulation-modes-warning.js', true);?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">blog manager</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">article</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo \yii\helpers\Url::to(['manager/article-list']); ?>">ArticleList</a></li>
            <li><a href="<?php echo \yii\helpers\Url::to(['manager/add-tag']); ?>">add tag</a></li>
            <li><a href="<?php echo \yii\helpers\Url::to(['manager/add-article']); ?>">add article</a></li>
            <li><a href="<?php echo \yii\helpers\Url::to(['manager/logout']); ?>" data-method= "post" >logout</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="col-sm-9 col-md-10">
              <?=\Yii::$app->session->getFlash('message');?>
              <?= $content ?>
         </div>
        </div>
      </div>
    </div>
  </body>
</html>

