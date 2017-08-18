<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>title</th>
          <th>tag</th>
          <th>create_time</th>
          <th>update_time</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $k=>$v):?>
        <tr>
          <td><?=$v['id']?></td>
          <td><?=$v['title']?></td>
          <td><?php 
                 $tags='';
                 foreach($v['tags'] as $v1){
                    $tags .= $v1['name'].'</br>';
                 }
                 echo $tags;
               ?>  
         </td>
          <td><?=date('Y-m-d',$v['create_time']);?></td>
          <td><?=date('Y-m-d',$v['update_time']);?></td>
          <td><a href="<?= \yii\helpers\Url::to(['manager/delete-article','id'=>$v['id']])?>">delete</a></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
</div>

