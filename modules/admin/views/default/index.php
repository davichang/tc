<?php

use yii\helpers\Html;

use app\models\Training;

use app\models\User;


/* @var $this yii\web\View */

/* @var $dataProvider yii\data\ActiveDataProvider */

echo Html::jsFile('@web/js/hightcharts/highcharts.js');
echo Html::jsFile('@web/js/hightcharts/modules/exporting.js');
echo Html::jsFile('@web/js/hightcharts/modules/export-data.js');
echo Html::jsFile('@web/js/hightcharts/modules/accessibility.js');

$this->title = '北海艺术设计学院教师发展中心';

$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    min-width:310px;
    max-width:900px;
    margin: 1em auto;
}

#container {
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>

<div class="admin-default-index">

    <hr>

    <div class="row">

        <div class="col-md-3  col-md-offset-1 alert alert-success text-center"><h2>培训场次</h2>

            <p class="lead"><?= Training::find()->where(['status'=>1])->count() ?></p></div>

        <div class="col-md-3  col-md-offset-1 alert alert-warning text-center"><h2>参与人次</h2>

            <p class="lead">123</p></div>

        <div class="col-md-3  col-md-offset-1 alert alert-info text-center"><h2>系统用户数</h2>

            <p class="lead"><?= User::find()->where(['status'=>1])->count() ?></p></div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
        </div>
    </div>
    

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: '北艺培训数据'
    },
    subtitle: {
        text: '数据源: 教师发展中心'
    },
    xAxis: [{
        categories: ['一月', '二月', '三月', '四月', '五月', '六月',
            '七月', '八月', '九月', '十月', '十一月', '十二月'],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value}次',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: '培训次数',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        title: {
            text: '参加人次',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value} 人次',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
    },
    series: [{
        name: '参加人次',
        type: 'column',
        yAxis: 1,
        data: [499, 715, 1064, 1292, 1440, 1760, 1356, 1485, 2164, 1941, 956, 544],
        tooltip: {
            valueSuffix: ' 人次'
        }

    }, {
        name: '培训场次',
        type: 'spline',
        data: [7.0, 8, 5, 16, 22, 21, 25, 26, 23, 18, 13, 9],
        tooltip: {
            valueSuffix: '次'
        }
    }]
});
		</script>

</div>



