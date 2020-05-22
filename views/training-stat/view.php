<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingStat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '申请详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="training-stat-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'training_id',
            'user_id',
            'apply_department_id',
            'extro:ntext',
            'created_at',
            'updated_at',
            'status',
            'process_department_id',
        ],
    ]) ?>

</div>
