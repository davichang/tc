<?php

use yii\helpers\Html;
use yii\helpers\Markdown;
use yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label'=> '博客','url'=> Url::to(['/blog'])];
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="<?= Yii::getAlias('@web/js/md-toc.js')?>"></script>
<div class="row">
    <div class="col-md-9" id="post">
        <h1 class="page-header"><?= Html::encode("{$model->title}") ?></h1>
        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <small><?= date("Y-m-d",Html::encode("{$model->created_at}")) ?></small></p>

        <?= Markdown::process("{$model->content}",'gfm')?>
    </div>
    <div class="col-md-3">
    <aside id="toc"></aside>
    </div>
</div>
<script type="text/javascript">
    new Toc( 'post',{
        'level':3,
        'top':80,
        'class':'toc',
        'targetId':'toc'
    } );
</script>