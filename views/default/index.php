<?php

use rabint\option\models\Option;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model rabint\contact\models\Contact */
/* @var $form yii\widgets\ActiveForm */

$opts = Option::get('general');
$social = Option::get('social');

$opts = array_merge($opts[0] ?? [], $social[0] ?? []);
$this->title = Yii::t('rabint', 'تماس با ما');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('rabint', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$showFiels = [
    'address' => ['title' => Yii::t('rabint', 'آدرس'), 'icon' => 'fas fa-map-marker-alt', 'lankable' => false],
    'email' => ['title' => Yii::t('rabint', 'ایمیل'), 'icon' => 'fas fa-envelope', 'lankable' => false],
    'contact_tel' => ['title' => Yii::t('rabint', 'تلفن'), 'icon' => 'fas fa-phone-square', 'lankable' => false],
    'fax' => ['title' => Yii::t('rabint', 'فکس'), 'icon' => 'fas fa-fax', 'lankable' => false],

    'eitaa' => ['title' => Yii::t('app', 'ایتا'), 'icon' => 'fab fa-facebook-messenger', 'lankable' => true],
    'bale' => ['title' => Yii::t('app', 'بله'), 'icon' => 'fas fa-circle-check', 'lankable' => true],
    'aparat' => ['title' => Yii::t('app', 'آپارات'), 'icon' => 'fas fa-film', 'lankable' => true],
    'gap' => ['title' => Yii::t('app', 'گپ'), 'icon' => 'fas fa-comment-dots', 'lankable' => true],
    'soroush' => ['title' => Yii::t('app', 'سروش'), 'icon' => 'fab fa-speakap', 'lankable' => true],

    'telegram' => ['title' => Yii::t('app', 'تلگرام'), 'icon' => 'fab fa-telegram-plane', 'lankable' => true],
    'instagram' => ['title' => Yii::t('app', 'اینستاگرام'), 'icon' => 'fab fa-instagram', 'lankable' => true],
    'whatsapp' => ['title' => Yii::t('app', 'واتساپ'), 'icon' => 'fab fa-whatsapp', 'lankable' => true],
    'youtube' => ['title' => Yii::t('app', 'یوتیوب'), 'icon' => 'fab fa-youtube', 'lankable' => true],
    'twitter' => ['title' => Yii::t('app', 'تویتر'), 'icon' => 'fab fa-twitter', 'lankable' => true],
    'facebook' => ['title' => Yii::t('app', 'فیسبوک'), 'icon' => 'fab fa-facebook', 'lankable' => true],
    'linkedin' => ['title' => Yii::t('app', 'لینکدین'), 'icon' => 'fab fa-linkedin', 'lankable' => true],
    'pinterest' => ['title' => Yii::t('app', 'پینترست'), 'icon' => 'fab fa-pinterest-p', 'lankable' => true],
    'vimeo' => ['title' => Yii::t('app', 'ویمو'), 'icon' => 'fab fa-vimeo', 'lankable' => true],
];
?>
    <div class="contact-create">
        <div class="row">
            <div class="col-lg-6 col-12">

                <div class="widget-header">
                    <h3 class="widget-title">
                        <?= \Yii::t('rabint', 'اطلاعات تماس') ?>
                    </h3>
                </div>
                <div class="contact-body">
                    <ul class="contact-fields" style="list-style: none; padding: 0">
                        <?php
                        foreach ($showFiels as $key => $item) {
                            if (!isset($opts[$key]) OR empty($opts[$key])) {
                                continue;
                            }
                            ?>
                            <li>
                                <i class="<?= $item['icon'] ?>"></i>
                                <span class="title"><?= $item['title'] ?>:</span>

                                <span class="value "
                                      style="text-align: left ;direction: ltr; display: inline-block">
                                    <?= $item['lankable'] ? '<a href="' . $opts[$key] . '">' : ''; ?>
                                    <?= $opts[$key]; ?>
                                    <?= $item['lankable'] ? '</a>' : ''; ?>
                                </span>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                    <div class="center-map">
                        <?php

                        $location = $opts['location'] ?: '36.305857, 59.614906';

                        if (!empty($opts['location_link'])) {
                            $notePop = '<div class="mapPopUp center">';

                            $text = $opts['location_text'] ?: "باز کردن روی نقشه";
                            $notePop .= '<a  class="text-center" target="_blank" href="' . $opts['location_link'] . '">' . $text . '</a>';
                            $notePop .= '</div>';
                        }

                        $markers = [[
                            'location' => $location,
                            'bindPopup' => $notePop ?? '',
                        ]
                        ];

                        echo rabint\widgets\map\MapWidget::widget(['center' => $location, 'markers' => $markers, 'style' => 'width: 100%;height: 400px;	float: right;'])
                        ?>
                    </div>
                    <div class="center">

                        <?php if (isset($opts['android']) and !empty($opts['android'])) { ?>
                            <a href="<?= $opts['android']; ?>" class="shareIcon feature android btn btn-success"
                               title="<?= \Yii::t('rabint', 'دانلود نرم افزار اندروید {sitename}', ['sitename' => config("fullname")]); ?>">
                                <?= \Yii::t('rabint', 'دانلود نرم افزار اندروید '); ?>
                            </a>
                        <?php } ?>

                        <?php if (isset($opts['ios']) and !empty($opts['ios'])) { ?>
                            <a href="<?= $opts['ios']; ?>" class="shareIcon feature apple btn btn-warning"
                               title="<?= \Yii::t('rabint', 'دانلود نرم افزار ios {sitename}', ['sitename' => config("fullname")]); ?>">
                                <?= \Yii::t('rabint', 'دانلود نرم افزار ios '); ?>
                            </a>
                        <?php } ?>
                    </div>


                </div>

            </div>
            <div class="col-lg-6 col-12">

                <div class="widget-header">
                    <h3 class="widget-title">
                        <?= \Yii::t('rabint', 'فرم تماس') ?>
                    </h3>
                </div>
                <div class="clearfix spacer"></div>
                <div class="contact-form">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="clearfix spacer"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12">
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
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>
        </div>

    </div>
<?php
$css = <<<CSS
.contact-fields .svg-inline--fa {
	font-size: 13px;
	color: #324253;
	width: 25px;
	display: inline-block;
	line-height: 25px;
	height: 38px;
	padding-top: 19px;
	text-align: right;
}
.contact-fields li {
	display: inline-block;
	height: 30px;
	float: right;
	width: 100%;
	margin-bottom: 8px;
}

CSS;
$this->registerCss($css);
