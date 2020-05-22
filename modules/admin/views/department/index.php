<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '部门管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <p>
        <?= Html::a('新增部门', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',

            //'status',
            [
                'label' => '分类',
                'attribute' => 'department_cate_id',
                'value'=>function($model){
                    return $model->departmentCate->cate_name;
                },
                'filter'  => \yii\helpers\ArrayHelper::map(\app\models\DepartmentCate::find()->all(),'id','cate_name')
            ],
            'department_name',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'  => '{view} {update}'
            ],
        ],
    ]); ?>


</div>
