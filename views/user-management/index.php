<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('添加用户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'true_name',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            [
                'label' => '用户状态',
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status ? '正常' : '失效';
                },

            ],
            //'avatar',
            //'department_id',
            //'sub_admin',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',

            ],
        ],
    ]); ?>


</div>
