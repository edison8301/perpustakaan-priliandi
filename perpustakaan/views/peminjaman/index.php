<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Buku;
use app\models\Anggota;
use app\models\Peminjaman;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">


    <p>
        
        <?php if (User::isAdmin() OR User::isPetugas()) {
            echo Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Peminjaman', ['create'], ['class' => 'btn btn-success']);
         } ?>

        <?= Html::a('Export PDF', ['site/export-pdfjam'], ['class' => 'btn btn-round btn-danger']) ?>
        <?= Html::a('Eksport Excel', ['peminjaman/export-excel'], ['class' => 'btn btn-round btn-warning']) ?>
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
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            //'id',

           //'id_buku',
           [
                'attribute' => 'id_buku',
                'contentOptions' => ['style' => 'text-align: center'],
                'value' => function ($data)
                {
                    return @$data->buku->nama;
                    # code...
                },
                'filter'=> Peminjaman::getListBuku(),
            ],

            
           


            [
                'attribute' => 'id_anggota',
                'contentOptions' => ['style' => 'text-align: center'],
                'value' => function ($data)
                {
                    return $data->anggota->nama;
                    # code...
                },
                'visible' => User::isAdmin() OR User::isPetugas(),
                    'filter'=> Anggota::getList(),
            ],
            'tanggal_pinjam',
            'tanggal_kembali',
            //'status',

            /**['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>*/

                [
                    'class' => 'yii\grid\ActionColumn',
                    'visibleButtons' => [
                        'view'=> User::isAdmin() OR User::isPetugas(),
                        'update'=> User::isAdmin() OR User::isPetugas(),
                        'delete'=> User::isAdmin() OR User::isPetugas(),
                    ],
                    'headerOptions'=>['style'=>'text-align:center; width:100px'],
                    'contentOptions'=>['style'=>'text-align:center'],
                ],
            ],
        ]); ?>
    </div>


</div>
