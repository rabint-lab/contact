<?php

namespace rabint\contact;

use Yii;

class contact extends \yii\base\Module {

    public $controllerNamespace = 'rabint\contact\controllers';

    public function init() {
        parent::init();

        // custom initialization code goes here
    }

    public static function adminMenu() {
        return [
            'label' => Yii::t('rabint', 'مدیریت تماس ها'),
            'url' => ['/contact/admin'],
            'icon' => '<i class="fas fa-phone-square"></i>',
            'options' => ['class' => 'treeview'],
            'visible' =>\rabint\helpers\user::can('manager'),
            'items' => [
            ]
        ];
    }

}
