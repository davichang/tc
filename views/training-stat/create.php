<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingStat */

$this->title = 'Create Training Stat';
$this->params['breadcrumbs'][] = ['label' => 'Training Stats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-stat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
