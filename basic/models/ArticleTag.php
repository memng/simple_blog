<?php

namespace app\models;

use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ArticleTag extends Model{
    public $tag_id;
    public $article_id;
    
    const TABLE_NAME = '{{%article_tag}}';
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // title, content are required
            [['tag_id'], 'required'],
        ];
    }
    
}
