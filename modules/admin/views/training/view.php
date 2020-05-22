<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Department;
use yii\helpers\Markdown;

/* @var $this yii\web\View */
/* @var $model app\models\Training */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Trainings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="training-view">

    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered">
                <tr>
                    <td>会议主题: <?=$model->title?></td><td>主讲: <?=$model->teacher?></td><td>培训时间: <?=$model->training_time?></td>
                </tr>
                <tr>
                    <td>申请部门:
                        <?php
                        $department = Department::findOne($model->department_ids);
                        echo $department->department_name;
                        ?>
                    </td>
                    <td>
                        申请状态: <?= $model->status ? '已审核' : '<code>未审核</code>';?>
                    </td>
                    <td>
                        备注或联合部门: <?=$model->extro?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">参加部门：
                        <?php
                        $departmentName = '';
                        $departmentids = explode("##",$model->department_ids);
                        foreach ($departmentids as $departmentid){
                            $department = \app\models\Department::findOne($departmentid);
                            $departmentName = $departmentName.'  '.$department->department_name;
                        }
                        echo $departmentName;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <?= Markdown::process("{$model->content}",'gfm')?>
                    </td>
                </tr>
                <tr>
                    <td>参加人员</td>
                    <td colspan="2">
<!--                        此处获取审核通过的人员名单。-->
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
