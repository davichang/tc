<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Training */

$this->title = '新增培训';
$this->params['breadcrumbs'][] = ['label' => 'Trainings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
