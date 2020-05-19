<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel rabint\contact\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rabint', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="card-body block-content block-content-full">
        <div class="contact-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    'email:email',
                    'phone',
                    'subject',
                    // 'text:ntext',
                    'created_at' => [
                        'attribute' => 'created_at',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return rabint\helpers\locality::jdate('j F Y h:i', $model->created_at);
                        }
                    ],
                    'ip',
//            'useFFr_id',
                    'status' => [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return ($model->status) ? Yii::t('rabint', 'خوانده شده') : Yii::t('rabint', 'خوانده نشده');
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status', ['1' => Yii::t('rabint', 'خوانده شده'), '0' => Yii::t('rabint', 'خوانده نشده')], ['class' => 'form-control', 'prompt' => '']),
                    ],
                    // 'meta:ntext',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}{delete}', //{define}
//                                'buttons' => [
//                                    'define' => function ($url, $model) {
//                                                    $url = yii\helpers\Url::to(['/impost/admin-presents/create','course_id'=>$model->course_id,'grade_id'=>$model->grade_id,'field_id'=>$model->field_id]);
//                                        return Html::a('<span class="fas fa-user-plus"></span>', $url, [
//                                                    'title' => Yii::t('yii', 'تعریف استاد'),
//                                        ]);
//                                    }
//                                        ]
                    ],
                ],
            ]);
            ?>

        </div>
    </div>
</div>
