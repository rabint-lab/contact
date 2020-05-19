<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model rabint\contact\models\Contact */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rabint', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block">
    <div class="card-body block-content block-content-full">
        <div class="contact-view">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?=
                Html::a(Yii::t('rabint', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('rabint', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ])
                ?>
            </p>

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'email:email',
                    'phone',
                    'subject',
                    'text:ntext',
                    'created_at',
                    'ip',
                    'user_id',
                ],
            ])
            ?>

        </div>
    </div>
</div>
