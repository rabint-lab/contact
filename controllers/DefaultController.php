<?php

namespace rabint\contact\controllers;

use Yii;
use rabint\contact\models\Contact;

/**
 * DefaultController implements the CRUD actions for Contact model.
 */
class DefaultController extends \rabint\controllers\DefaultController {

    public function actionIndex() {
        $model = new Contact();
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = (isset(\Yii::$app->user->identity->id)) ? \Yii::$app->user->identity->id : 0;
            $model->created_at = time();
            $model->ip = Yii::$app->getRequest()->getUserIP();
            $model->status = 0;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', \Yii::t('rabint', 'پیام شما یا موفقیت ثبت شد'));
                return $this->redirect(\yii\helpers\Url::home());
//                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', \Yii::t('rabint', 'متاسفانه در ارسال پیام خطایی رخ داده است. لطفا دوباره تلاش نمایید.'));
            }
        }
        return $this->render('index', [
                    'model' => $model,
        ]);
    }

}
