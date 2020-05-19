<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model rabint\contact\models\Contact */
/* @var $form yii\widgets\ActiveForm */
$model = new \rabint\contact\models\Contact;

$this->title = Yii::t('rabint', 'تماس با ما');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rabint', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="contact-form">

        <?php $form = ActiveForm::begin(['action' => 'contact/default/index']); ?>
        <?php
        $fTemplate = [
            'template' => '{input}{error}',
        ];
        ?>




        <div class="form-group form-icon-group">
            <i class="fas fa-user"></i>
            <span class="wpcf7-form-control-wrap your-name">
                <?= $form->field($model, 'name', $fTemplate)->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('name')]) ?>

<!--<input name="your-name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your name" type="text">-->
            </span>
        </div>
        <div class="form-group form-icon-group">
            <i class="fas fa-envelope"> </i> <span class="wpcf7-form-control-wrap your-email">
                <!--<input name="your-email" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Your email" type="email">-->
                <?= $form->field($model, 'email', $fTemplate)->textInput(['placeholder' => true, 'placeholder' => $model->getAttributeLabel('email')]) ?>

            </span>
        </div>
        <div class="form-group form-icon-group">
            <i class="fas fa-mobile"> </i> <span class="wpcf7-form-control-wrap tel-807">
                <!--<input name="tel-807" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="your tell" type="tel">-->
                <?= $form->field($model, 'phone', $fTemplate)->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('phone')]) ?>
            </span>
        </div>
        <div class="form-group form-icon-group">
            <i class="fas fa-edit"></i>  <span class="wpcf7-form-control-wrap your-message">
                <?= $form->field($model, 'text', $fTemplate)->textarea(['rows' => 6, 'placeholder' => $model->getAttributeLabel('text')]) ?>

                <!--<textarea name="your-message" cols="40" rows="8" class="wpcf7-form-control wpcf7-textarea form-control" aria-invalid="false" placeholder="Your message"></textarea></span>-->
        </div>
        <div class="text-center">
            <div class="col-sm-8 contact-captcha">
                <?=
                        $form->field($model, 'verifyCode', $fTemplate)
                        ->widget(Captcha::className(), [
                            'captchaAction' => '/site/captcha',
                            'template' => '<div class="row"><div class="pull-left float-left">{image}</div><div class="pull-left float-left">{input}</div></div>',
                ]);
                ?>
            </div>
            <div class="col-sm-4">
                <?= Html::submitButton(Yii::t('rabint', 'ارسال'), ['class' => 'btn btn-success']) ?>

            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
