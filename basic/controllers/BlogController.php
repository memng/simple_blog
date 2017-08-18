<?php

namespace app\controllers;

use yii\data\Pagination;

class BlogController extends \yii\web\Controller{
    public $layout='blog';
    
    
    public function actionIndex(){
        $query = new \yii\db\Query;
        $count = $query->select('*')
             ->from(\app\models\Article::TABLE_NAME)
             ->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->setPageSize(10);
        $data = $query->offset($pagination->offset)
                 ->limit($pagination->limit)
                 ->all();
        return $this->render('index',['data' => $data,'pagination'=>$pagination]);
    }
    
    public function actionTag(){
        $id = \Yii::$app->request->get('id');
        if(empty($id)){
            throw new \Exception('requst error id required');
        }
        $query = new \yii\db\Query;
        $articles = $query->select('article_id')
             ->from(\app\models\ArticleTag::TABLE_NAME)
             ->where('tag_id=:id',[':id'=>$id])
             ->column();
        $query1 = new \yii\db\Query;
        $count = $query1->select('*')
             ->from(\app\models\Article::TABLE_NAME)
             ->where(['id' => $articles])
             ->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->setPageSize(10);
        $data = $query1->offset($pagination->offset)
                 ->limit($pagination->limit)
                 ->where(['id' => $articles])
                 ->all();
        return $this->render('index',['data' => $data,'pagination'=>$pagination]);
    }
    
    public function getTagsData(){
        $query = new \yii\db\Query;
        $data = $query->select('*')
             ->from(\app\models\Tag::TABLE_NAME)
             ->all();
        return $data;
    }
}
