<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = '培训中心';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert alert-warning">
    本部门的培训认证，提交申请由本部门进行审核<br />
    若您申请跨部门的培训认证，请您提供足够的证明资料,点击跨部门申请，由教师发展中心进行审核。
</div>
<div class="row">
    <!--    左侧8个列的宽度 先把样子做好，后期填入数据-->
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <td>
                    培训标题
                </td>
                <td>
                    主讲
                </td>
                <td>
                    培训时间
                </td>
                <td>
                    操作
                </td>
            </tr>
            <?php foreach ($trainings as $training): ?>
                <tr>
                    <td><?= Html::encode($training->title) ?></td>
                    <td><?= Html::encode($training->teacher) ?></td>
                    <td><?= date("Y-m-d H:i:s",Html::encode($training->created_at)) ?></td>
                    <td>
                        申请认证
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
</div>