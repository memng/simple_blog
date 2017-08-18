<?php

namespace app\models;

use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Tag extends Model{
    public $name;
    
    const TABLE_NAME = '{{%tag}}';
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // title, content are required
            [['name'], 'required'],
        ];
    }
    
}
