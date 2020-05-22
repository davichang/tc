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


</div>
