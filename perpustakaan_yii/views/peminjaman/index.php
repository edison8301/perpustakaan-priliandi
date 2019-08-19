<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Buku;
use app\models\Anggota;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">


    <p>
        <?= Html::a('Create Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-primary">
    <div class="box-header with-border">
    <h2 class ="box-tittle"> Data Peminjaman</h2>
    </div>

    <div class= "box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',

           'id_buku',
            
           


            [
                'attribute' => 'id_anggota',
                'contentOptions' => ['style' => 'text-align: center'],
                'value' => function ($data)
                {
                    return $data->anggota->nama;
                    # code...
                }
            ],
            'tanggal_pinjam',
            'tanggal_kembali',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
