<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Penerbit;
use app\models\Penulis;
use app\models\Kategori;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

    <p>
        <?= Html::a('Create Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-primary">
    <div class="box-header with-border">
    <h2 class ="box-tittle"> Data Buku</h2>
    </div>

    <div class= "box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama',
            'tahun_terbit',


            [
                'attribute' => 'id_penulis',
                'value' => function ($data)
                {
                    return $data->penulis->nama;
                }
            ],

            [
                'attribute' => 'id_penerbit',
                'contentOptions' => ['style' => 'text-align: center'],
                'value' => function ($data)
                {
                    return $data->penerbit->nama;
                    # code...
                }
            ],

            [
                'attribute' => 'id_kategori',
                'contentOptions' => ['style' => 'text-align: center'],
                'value' => function ($data)
                {
                    return $data->kategori->nama;
                    # code...
                }
            ],

            
            //'sinopsis:ntext',
            'sampul',
            'berkas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
