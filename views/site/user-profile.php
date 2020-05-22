<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '个人中心';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <!--    左侧8个列的宽度 先把样子做好，后期填入数据-->
    <div class="col-md-8">
        <table class="table table-bordered">
            <tr>
                <td>姓名</td>
                <td><?= Html::encode($model->true_name) ?></td>
            </tr>
            <tr>
                <td>部门</td>
                <td><?= Html::encode($model->department->department_name) ?></td>
            </tr>
            <tr>
                <td>邮箱</td>
                <td><?= Html::encode($model->email) ?></td>
            </tr>
            <tr>
                <td>注册时间</td>
                <td><?= date("Y-m-d H:i", Html::encode($model->created_at)) ?></td>
            </tr>
            <tr>
                <td>更新时间</td>
                <td><?= date("Y-m-d H:i", Html::encode($model->updated_at)) ?></td>
            </tr>
        </table>
    </div>
    <!--    右侧3个列的宽度并且距离左侧1个列的距离，总数12列满宽度-->
    <div class="col-md-3 col-md-offset-1">
        <!--        右侧的菜单-->
        <div class="list-group">
            <a href="#" class="list-group-item active">
                个人中心
            </a>
            <a href="<?= Url::to(['/site/change-password']) ?>" class="list-group-item">修改密码</a>
        </div>
    </div>
</div>