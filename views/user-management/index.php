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

    <div class="alert alert-warning">
        <code>重置密码</code>：用于用户修改密码遗忘情况下的恢复功能，恢复后初始密码与工号相同。
        <code>状态失效</code>：用于用户离职或更换部门对其本部门的状态设为失效。
    </div>

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
                'label'=>'操作',
                //'attribute'=>'province',
                'enableSorting' => false,
                'value'=>function($model){
                    return Html::a('重置密码', "/order?id={$model->id}").'  '.Html::a('状态失效', "/order?id={$model->id}");
                },
                'format' => 'raw',
                'headerOptions' => ['style'=>'color:red'],
                'contentOptions' => ['style'=>'color:blue'],
            ],
        ],
    ]); ?>


</div>
