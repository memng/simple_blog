<?php

namespace app\controllers;

class SignController extends \yii\web\Controller {
    public $layout= false;
    
    public function actionSignin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new \app\models\LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('signin', [
            'model' => $model,
        ]);
    }
    

}

