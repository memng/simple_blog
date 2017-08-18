<?php

namespace app\controllers;
use app\models\Tag;
use app\models\ArticleTag;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;



class ManagerController extends \yii\web\Controller {
    public $layout= 'manager';
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actionAddArticle()
    {
        $model=new \app\models\Article();
        $query = new \yii\db\Query;
        $data = $query->select('id, name')
             ->from(\app\models\Tag::TABLE_NAME)
             ->indexBy('id')
             ->all();
        foreach ($data as $k => $v){
            $data[$k] = $v['name'];
        }
        $articleTag = new \app\models\ArticleTag();
        if ($model->load(\Yii::$app->request->post())) {
            $model->create_time=$model->update_time = time();
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                \Yii::$app->db->createCommand()->insert(\app\models\Article::TABLE_NAME,
                    $model->toArray()
                )->execute();
                $articleTag->article_id = \Yii::$app->db->getLastInsertID();
                $articleTag->load(\Yii::$app->request->post());
                if(!empty($articleTag->tag_id)){
                    \Yii::$app->db->createCommand()
                    ->BatchInsert(\app\models\ArticleTag::TABLE_NAME, ['tag_id','article_id'],
                    array_map(function($v) use ($articleTag){return [$v,$articleTag->article_id];}, $articleTag->tag_id)
                    )->execute();
                }
                $transaction->commit();
                \Yii::$app->session->setFlash('message','add successfully');
            } catch (Exception $e) {
                $transaction->rollBack();
            }
            
        }
        return $this->render('add',['model' => $model,'tags' => $data,'articleTag' => $articleTag]);
        
    }
    
    public function actionArticleList(){
        $query = new \yii\db\Query;
        $data = $query->select('id,title,content,create_time,update_time')
        ->from(\app\models\Article::TABLE_NAME)
        ->indexBy('id')
        ->all();
        $query1 = new \yii\db\Query();
        $data1 = $query1->select('article_id,tag_id,name')
        ->from(\app\models\Article::TABLE_NAME)
        ->leftJoin(ArticleTag::TABLE_NAME,'b_article_tag.article_id=b_article.id')
        ->leftJoin(Tag::TABLE_NAME,'b_article_tag.tag_id=b_tag.id')
        ->all();
        foreach ($data as $k=>$v){
            $tags = array();
            foreach ($data1 as $v1){
                if($v1['article_id'] == $k){
                    $tags[] = $v1; 
                }
            }
            $data[$k]['tags']=$tags;
        }
        return $this->render('list',['data' => $data]);
    }
    
    public function actionDeleteArticle(){
        $id = \Yii::$app->request->get('id');
        if(empty($id)){
            throw new \Exception('requst error id required');
        }
        $result = \Yii::$app->db->createCommand()->delete(\app\models\Article::TABLE_NAME, 'id=:id',[':id'=>$id])->execute();
        if($result)      
        {
            \Yii::$app->session->setFlash('message','delete successfully'); 
        }
        $this->redirect(\yii\helpers\Url::to(['manager/article-list']));
    }
    
    public function actionAddTag(){
        $model= new \app\models\Tag();
        if($model->load(\Yii::$app->request->post())){
            \Yii::$app->db->createCommand()->insert(Tag::TABLE_NAME, $model->toArray())->execute();
            \Yii::$app->session->setFlash('message','add successfully');
        }
        return $this->render('add_tag',['model' => $model]);
    }
    
    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }
}

