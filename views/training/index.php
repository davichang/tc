<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '培训管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('申请培训', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="alert alert-warning">本表格仅列出本部门申请的培训。</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'teacher',
            //'content:ntext',
            [
                'label' => '参加部门',
                'attribute' => 'department_ids',
                'value' => function($model){
                    $departments='';
                    $department_ids = explode("##",$model->department_ids);
                    foreach ($department_ids as $department_id){
                        $department = \app\models\Department::findOne($department_id);
                        $departments = $departments.' '.$department->department_name;
                    }
                    return $departments;
                }
            ],
            //'training_time',
            //'apply_department_id',
            //'status',
            'created_at:datetime',
            'updated_at:datetime',
            //'extro:ntext',

        ],
    ]); ?>


</div>
