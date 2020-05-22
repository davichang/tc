<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\DepartmentCate;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => '正常','0'=>'失效']) ?>

    <?= $form->field($model, 'department_cate_id')->dropDownList(ArrayHelper::map(DepartmentCate::find()->all(),'id','cate_name')) ?>


    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
