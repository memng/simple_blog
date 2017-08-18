
<?php
use yii\widgets\LinkPager;
?>
<?php foreach ($data as $v) :?>
<div class="blog-post">
   <h2 class="blog-post-title"><?=$v['title']?></h2>
   <p class="blog-post-meta"><?=date('Y-m-d',$v['create_time']).' by '.$v['author']?></p>
   <p><?=$v['content']?></p>
 </div><!-- /.blog-post -->
<?php endforeach;?>
<?php
echo LinkPager::widget([
    'pagination' => $pagination,
]);
?>
