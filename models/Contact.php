<?php

namespace rabint\contact\models;

use Yii;
use rabint\contact\Config;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $subject
 * @property string $text
 * @property integer $created_at
 * @property string $ip
 * @property integer $user_id
 */
class Contact extends Config {

    const SCENARIO_READ = 'read';
    const SCENARIO_LOGEDIN = 'logedin';

    public $verifyCode;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'contact';
    }

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_READ] = ['status'];
        $scenarios[self::SCENARIO_LOGEDIN] = ['email', 'name', 'phone', 'subject', 'text', 'status'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['text', 'email'], 'required'],
            [['text'], 'string'],
            [['created_at', 'user_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['email', 'subject'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['phone'], 'string', 'max' => 13],
            [['ip'], 'string', 'max' => 48],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
            [['text','name','email','phone','ip','verifyCode'], 'filter', 'filter' => '\yii\helpers\HtmlPurifier::process'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('rabint', 'شناسه'),
            'name' => Yii::t('rabint', 'نام'),
            'email' => Yii::t('rabint', 'ایمیل'),
            'phone' => Yii::t('rabint', 'شماره تماس'),
            'subject' => Yii::t('rabint', 'موضوع'),
            'text' => Yii::t('rabint', 'پیام'),
            'created_at' => Yii::t('rabint', 'تاریخ ایجاد'),
            'ip' => Yii::t('rabint', 'ip ایجاد کننده'),
            'user_id' => Yii::t('rabint', 'شناسه کاربر'),
            'status' => Yii::t('rabint', 'وضعیت'),
            'verifyCode' => Yii::t('rabint', 'کد امنیتی'),
        ];
    }

}
