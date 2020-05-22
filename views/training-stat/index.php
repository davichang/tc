<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TraingStatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '培训管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-stat-index">

    <p>

    </p>
    <div class="alert alert-warning">
        注意：若二级部门开设培训需向教师发展中心申请报备，经教师发展中心审核批准后参加培训的教师才能进行相关认证。<?= Html::a('培训申请', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => '培训主题',
                'attribute' => 'training_id',
                'value' => function($model){
                    return $model->training->title;
                },
                'filter'=>false,
            ],
            [
                'label' => '申请人',
                'attribute' => 'user_id',
                'value' => function($model){
                    return $model->user->true_name;
                },
                'filter' => false,
            ],
            [
                'label' => '申请时间',
                'attribute' => 'created_at',
                'value' => function($model){
                    return date("Y-m-d H:i:s",$model->created_at);
                },
                'filter'=>false,
            ],
            [
                'label' => '申请时间',
                'attribute' => 'updated_at',
                'value' => function($model){
                    return date("Y-m-d H:i:s",$model->updated_at);
                },
                'filter'=>false,
            ],
            [
                'label' => '审核状态',
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status ? '已审核' : '未审核';
                },
//                 'filter'=> \yii\helpers\ArrayHelper::map([['id'=>1,'name'=>'已审核'],['id'=>0,'name'=>'未审核']],'id','name'),
                'filter' => false,
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{view}'
            ],
        ],
    ]); ?>
    <div class="alert alert-info">
        本表格仅列出向本部门进行相关培训申请的学员信息，请根据本部门的实际情况进行审核。
    </div>

</div>
