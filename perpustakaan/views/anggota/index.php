<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnggotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Anggota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-index">

<!--   <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Tambah Anggota', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export PDF', ['site/export-pdfa'], ['class' => 'btn btn-round btn-danger']) ?>
    </p>

    <?php  // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-primary">
    <div class="box-header with-border">
    <h2 class ="box-tittle"> Data Anggota</h2>
    </div>

    <div class= "box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            //'id',
            //'nama',
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            [
                'attribute' => 'alamat',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            [
                'attribute' => 'telepon',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            [
                'attribute' => 'email',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            //'alamat',
            //'telepon',
            //'email:email',
            //'status_aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
