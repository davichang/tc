<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="pull-right">
        <?= Html::a('添加教职工', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'department_id',
                'value' => function($model){
                    return $model->department->department_name;
                },
                'filter'  => \yii\helpers\ArrayHelper::map(\app\models\Department::find()->all(),'id','department_name')
            ],
            'username',
            'true_name',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status ? '正常' : '无效';
                }
            ],
            //'avatar',

            //'created_at:datetime',
            //'updated_at:datetime',
            [
                'attribute' => 'sub_admin',
                'value' => function($model){
                    return $model->sub_admin ? '是' : '否';
                },
                'filter'  => \yii\helpers\ArrayHelper::map([['id'=>1,'value'=>'是'],['id'=>0,'value'=>'否']],'id','value')
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>


</div>
