<?php

namespace app\models;

use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Article extends Model{
    public $title;
    public $content;
    public $author;
    public $create_time;
    public $update_time;
    const TABLE_NAME = '{{%article}}';
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // title, content are required
            [['title', 'content','author'], 'required'],
        ];
    }
    
}
