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

    <title>blog</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo \yii\helpers\Url::to('/basic/web/css/bootstrap.min.css', true);?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo \yii\helpers\Url::to('/basic/web/css/ie10-viewport-bug-workaround.css', true);?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo \yii\helpers\Url::to('/basic/web/css/blog.css', true);?>" rel="stylesheet">

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

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="<?=\yii\helpers\Url::to(['blog/index'])?>">Home</a>
          <a class="blog-nav-item" href="<?=\yii\helpers\Url::to(['manager/article-list'])?>">manager</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title"> Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
           <?=$content?>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>this blog is complete created use yii freamework.</p>
          </div>
          <div class="sidebar-module">
            <h4>Tags</h4>
            <ol class="list-unstyled">
              <?php $data=$this->context->getTagsData();
                     foreach ($data as $v) :
              ?>
                <li><a href="<?= \yii\helpers\Url::to(['blog/tag','id'=>$v['id']])?>"><?=$v['name']?></a></li>
              <?php endforeach;?>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>copyright by mason</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

  </body>
</html>
