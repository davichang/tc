<?php

use yii\helpers\Html;
use app\models\Training;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '北海艺术设计学院教师发展中心';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-default-index">
    <hr>
    <div class="row">
        <div class="col-md-3  col-md-offset-1 alert alert-success text-center"><h2>培训场次</h2>
            <p class="lead"><?= Training::find()->where(['status'=>1])->count() ?></p></div>
        <div class="col-md-3  col-md-offset-1 alert alert-warning text-center"><h2>参与人次</h2>
            <p class="lead">123</p></div>
        <div class="col-md-3  col-md-offset-1 alert alert-info text-center"><h2>审核人次</h2>
            <p class="lead">123</p></div>
    </div>

</div>

