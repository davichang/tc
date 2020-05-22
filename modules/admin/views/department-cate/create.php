<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DepartmentCate */

$this->title = '新增分类';
$this->params['breadcrumbs'][] = ['label' => '新增分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-cate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
