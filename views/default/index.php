<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use rabint\option\models\Option;

/* @var $this yii\web\View */
/* @var $model rabint\contact\models\Contact */
/* @var $form yii\widgets\ActiveForm */

$opts = Option::get('general');
if (empty($opts) or !isset($opts[0])) {
    return;
}
$opts = $opts[0];

$this->title = Yii::t('rabint', 'تماس با ما');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('rabint', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create">
    
    <br/>
    <h4><?= \Yii::t('rabint', 'اطلاعات تماس') ?></h4>
    <br/>
    <div class="contact-body">
        <ul class="contact-fields">
            <li>
                <span class="title"><?= \Yii::t('rabint', 'آدرس'); ?>:</span>
                <span class="value"> <?= $opts['address']; ?></span>
            </li>
            <li>
                <span class="title"><?= \Yii::t('rabint', 'تلفن'); ?>:</span>
                <span class="value"> <?= $opts['tel']; ?></span>
            </li>
            <?php if (isset($opts['email']) and !empty($opts['email'])) { ?>
                <li>
                    <span class="title"><?= \Yii::t('rabint', 'ایمیل'); ?>:</span>
                    <span class="value"> <a href="mailto:<?= $opts['email']; ?>" class="shareIcon feature email" title="<?= \Yii::t('rabint', 'ارسال ایمیل به {sitename}', ['sitename' => config("fullname")]); ?>">
                            <?= $opts['email']; ?>
                        </a></span>
                </li>
            <?php } ?>

            <?php if (isset($opts['telegram']) and !empty($opts['telegram'])) { ?>
                <li>
                    <span class="title"><?= \Yii::t('rabint', 'صفحه تلگرام'); ?>:</span>
                    <span class="value">
                        <a href="<?= $opts['telegram']; ?>" class="shareIcon telegram" title="<?= \Yii::t('rabint', 'صفحه تلگرام {sitename}', ['sitename' => config("fullname")]); ?>">
                            <?= $opts['telegram']; ?>
                        </a>
                    </span>

                </li>
            <?php } ?>

            <?php if (isset($opts['instagram']) and !empty($opts['instagram'])) { ?>
                <li>
                    <span class="title"><?= \Yii::t('rabint', 'صفحه اینستاگرام'); ?>:</span>
                    <span class="value">
                        <a href="<?= $opts['instagram']; ?>" class="shareIcon instagram" title="<?= \Yii::t('rabint', 'صفحه اینستاگرام {sitename}', ['sitename' => config("fullname")]); ?>">
                            <?= $opts['instagram']; ?>
                        </a>
                    </span>

                </li>
            <?php } ?>

            <?php if (isset($opts['gplus']) and !empty($opts['gplus'])) { ?>
                <li>
                    <span class="title"><?= \Yii::t('rabint', 'صفحه گوگل پلاس'); ?>:</span>
                    <span class="value">
                        <a href="<?= $opts['gplus']; ?>" class="shareIcon gplus" title="<?= \Yii::t('rabint', 'صفحه گوگل پلاس {sitename}', ['sitename' => config("fullname")]); ?>">
                            <?= $opts['gplus']; ?>
                        </a>
                    </span>

                </li>
            <?php } ?>

            <?php if (isset($opts['facebook']) and !empty($opts['facebook'])) { ?>
                <li>
                    <span class="title"><?= \Yii::t('rabint', 'صفحه فیسبوک'); ?>:</span>
                    <span class="value">
                        <a href="<?= $opts['facebook']; ?>" class="shareIcon facebook" title="<?= \Yii::t('rabint', 'صفحه فیسبوک {sitename}', ['sitename' => config("fullname")]); ?>">
                            <?= $opts['facebook']; ?>
                        </a>
                    </span>
                </li>
            <?php } ?>

            <?php if (isset($opts['twitter']) and !empty($opts['twitter'])) { ?>
                <li>
                    <span class="title"><?= \Yii::t('rabint', 'صفحه تویتر'); ?>:</span>
                    <span class="value">
                        <a href="<?= $opts['twitter']; ?>" class="shareIcon twitter" title="<?= \Yii::t('rabint', 'صفحه تویتر {sitename}', ['sitename' => config("fullname")]); ?>">
                            <?= $opts['twitter']; ?>
                        </a>
                    </span>
                </li>
            <?php } ?>

            <?php if (isset($opts['aparat']) and !empty($opts['aparat'])) { ?>
                <li>
                    <span class="title"><?= \Yii::t('rabint', 'صفحه آپارات'); ?>:</span>
                    <span class="value">
                        <a href="<?= $opts['aparat']; ?>" class="shareIcon aparat" title="<?= \Yii::t('rabint', 'صفحه آپارات {sitename}', ['sitename' => config("fullname")]); ?>">
                            <?= $opts['aparat']; ?>
                        </a>
                    </span>
                </li>
            <?php } ?>

            <?php if (isset($opts['youtube']) and !empty($opts['youtube'])) { ?>
                <li>
                    <span class="title"><?= \Yii::t('rabint', 'صفحه یوتیوب'); ?>:</span>
                    <span class="value">
                        <a href="<?= $opts['aparat']; ?>" class="shareIcon youtube" title="<?= \Yii::t('rabint', 'صفحه یوتیوب {sitename}', ['sitename' => config("fullname")]); ?>">
                            <?= $opts['youtube']; ?>
                        </a>
                    </span>
                </li>
            <?php } ?>

        </ul>

    <div class="center">

        <?php if (isset($opts['android']) and !empty($opts['android'])) { ?>
            <a href="<?= $opts['android']; ?>" class="shareIcon feature android btn btn-success" title="<?= \Yii::t('rabint', 'دانلود نرم افزار اندروید {sitename}', ['sitename' => config("fullname")]); ?>">
            <?= \Yii::t('rabint', 'دانلود نرم افزار اندروید '); ?>
        </a>
        <?php } ?>

        <?php if (isset($opts['ios']) and !empty($opts['ios'])) { ?>
            <a href="<?= $opts['ios']; ?>" class="shareIcon feature apple btn btn-warning" title="<?= \Yii::t('rabint', 'دانلود نرم افزار ios {sitename}', ['sitename' => config("fullname")]); ?>">
            <?= \Yii::t('rabint', 'دانلود نرم افزار ios '); ?>
        </a>
        <?php } ?>
    </div>


    </div>

    <h4><?= \Yii::t('rabint', 'فرم تماس') ?></h4>
    <br/>
    <div class="contact-form">

        <?php $form = ActiveForm::begin(); ?>
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-8">
            <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
            <?=
                $form->field($model, 'verifyCode')
                    ->widget(Captcha::className(), [
                        'captchaAction' => '/site/captcha',
                        'template' => '<div class="row"><div class="col-sm-12 center center-block">{image}</div><div class="clearfix"></div><div class="col-sm-12">{input}</div></div>',
                    ])->hint(\Yii::t('rabint', 'برای تغییر کد روی عکس کلیک نمایید'));
            ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12">
            <div class="form-group center">
                <?= Html::submitButton(Yii::t('rabint', 'ارسال'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>