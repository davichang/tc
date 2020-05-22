<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use nikitakls\markdown\EditorMdWidget;

/* @var $this yii\web\View */
/* @var $model common\models\TaskStat */
/* @var $form ActiveForm */

$this->title = '提交任务';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'task_id')->textInput()->hiddenInput(['value' => $task_id])->label(false) ?>
        <?= $form->field($model, 'user_id')->textInput()->hiddenInput(['value' => $user_id]) ->label(false) ?>
        <?= $form->field($model, 'perusal')->textInput()->hiddenInput(['value' => '未批阅']) ->label(false) ?>
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
                        'watch' => false, 
                        'htmlDecode' => 'style,script,iframe|on*',
                        //'toolbar' => false,             
                        'placeholder' => 'MarkDown',
                        'previewCodeHighlight' => false,  
                        'emoji' => true,
                        'taskList' => true,
                        'tocm' => true, 
                        'tex' => true,   
                        'flowChart' => true,            
                        'sequenceDiagram' => true,     
                        'imageUpload' => true,
                        'imageFormats' => ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'webp'],
                        'imageUploadURL' => Url::to(['/task/upload-image', 'type' => 'md']),
                        'toolbarIcons' => [
                            "undo", "redo", "|",
                            "bold", "del", "italic", "list-ul", "list-ol", "hr", "|",
                            "code", "code-block", "|",
                            "image", "table", "link", "|",
                            "html-entities", "|",
                            "preview", "watch","|",
                            "help"
                        ],
                    ]
                ]
    ) ?>
        <div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- task-create -->
