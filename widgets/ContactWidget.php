<?php

namespace rabint\contact\widgets;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactWidget
 *
 * @author mojtaba
 */
class ContactWidget extends \yii\bootstrap4\Widget {

    var $style = 'default';

    /**
     * @throws InvalidConfigException
     */
    public function init() {

        parent::init();
    }

    public function run() {

        return $this->render('ContactWidget/' . $this->style);
    }

}
