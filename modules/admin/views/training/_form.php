<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nikitakls\markdown\EditorMdWidget;
use yii\helpers\Url;
use zhuravljov\yii\widgets\DateTimePicker;
use yii\helpers\ArrayHelper;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Training */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teacher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(EditorMdWidget::className(), [
            'options' => [// html attributes
                'id' => 'editor-markdown',
            ],
            'language' => 'zh',
            'clientOptions' => [
                'height' => '300',
                // 'previewTheme' => 'dark',
                // 'editorTheme' => 'pastel-on-dark',
                'markdown' => '',
                //'codeFold' => true,
                'syncScrolling' => true,
                'saveHTMLToTextarea' => true,
                'searchReplace' => true,
                'watch' => true,
                'htmlDecode' => 'style,script,iframe|on*',
                //'toolbar' => false,
                'placeholder' => 'MarkDown',
                'previewCodeHighlight' => false,
                'emoji' => false,
                'taskList' => true,
                'tocm' => true,
                'tex' => true,
                'flowChart' => true,
                'sequenceDiagram' => true,
                'imageUpload' => true,
                'imageFormats' => ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'webp'],
                'imageUploadURL' => Url::to(['/admin/training/upload-image', 'type' => 'md']),
                'toolbarIcons' => [
//                    "undo", "redo", "|",
                    "bold",
                    //"del",
                    "italic", "list-ul", "list-ol", "hr",
//                    "code", "code-block", "|",
                    "image", "table",
                    //"link",
//                    "html-entities", "|",
                    //"preview",
                    "watch",
//                    "help"
                ],
            ]
        ]
    ) ?>

    <?= $form->field($model, 'department_ids')->checkboxList(ArrayHelper::map(Department::find()->all(),'id','department_name')) ?>

    <?= $form->field($model, 'training_time')->widget(DateTimePicker::className(), [
        'clientOptions' => [
            'format' => 'yyyy-mm-dd hh:ii',
            'language' => 'zh',
            'autoclose' => true,
        ],
        'clientEvents' => [],
    ]) ?>


    <?= $form->field($model, 'apply_department_id')->dropDownList(ArrayHelper::map(Department::find()->all(), 'id', 'department_name')) ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => '审核','0' => '未审核']) ?>

    <?= $form->field($model, 'extro')->textarea(['rows' => 2,'placeholder'=>'若多个部门联合申请，请填写所有申请部门名单']) ?>

    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
