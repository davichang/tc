<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\TrainingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '培训管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>

    <p>
        <?= Html::a('新增培训', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'teacher',
            //'content:ntext',
            [
                'label'=>'参加部门',
                'attribute' => 'department_ids',
                'value' => function($model){
                    $departmentName = '';
                    $departmentids = explode("##",$model->department_ids);
                    foreach ($departmentids as $departmentid){
                        $department = \app\models\Department::findOne($departmentid);
                        $departmentName = $departmentName.'  '.$department->department_name;
                    }
                    return $departmentName;
                }
            ],
            //'training_time',
            [
                'label' => '申请部门',
                'attribute' => 'apply_department_id',
                'value' => function($model){
                    $department = Department::findOne($model->department_ids);
                    return $department->department_name;
                }
            ],
            //'status',
            [
                'label' => '审核状态',
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status ? '已审核' : '未审核';
                }
            ],
            //'created_at',
            //'updated_at',
            //'extro:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
            ],
        ],
    ]); ?>


</div>
