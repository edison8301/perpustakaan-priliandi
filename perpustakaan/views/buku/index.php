<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Penerbit;
use app\models\Penulis;
use app\models\Kategori;
use app\models\User;
use kartik\export\ExportMenu;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

    <p>
        <?php if (User::isAdmin()): ?>
        <?= Html::a('Tambah Buku', ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif ?>
        <?= Html::a('Eksport Excel', ['buku/export-excel'], ['class' => 'btn btn-round btn-warning']) ?>
        <?= Html::a('Export PDF', ['site/export-pdf-buku'], ['class' => 'btn btn-round btn-danger']) ?>
         <?= Html::a('Export PDF SKL', ['site/export-pdf-surat-kunjungan-lapangan'], ['class' => 'btn btn-round btn-danger']) ?>
        <?= Html::a('Export Word', ['buku/export-word'], ['class' => 'btn btn-round btn-info']) ?>

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
            ['class' => 'yii\grid\SerialColumn',
            'header' => 'No.',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            //'id',
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            
            [
                'attribute' => 'tahun_terbit',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center', 'width:80px;'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            [
                'attribute' => 'id_penulis',
                //'filter' => Penulis::getList(),
               'headerOptions' => ['style' => 'text-align:center;'],
               'contentOptions' => ['style' => 'text-align:center'],
                'value' => function ($data)
                {
                    return $data->penulis->nama;
                }
            ],

            [
                'attribute' => 'id_penerbit',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align: center'],
                'value' => function ($data)
                {
                    return $data->penerbit->nama;
                    # code...
                }
            ],

            [
                'attribute' => 'id_kategori',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align: center'],
                'value' => function ($data)
                {
                    return $data->kategori->nama;
                    # code...
                }
            ],

            
            //'sinopsis:ntext',
            //'sampul',
             [
               'attribute' =>'sinopsis',
               'format' => 'raw',
               'headerOptions' => ['style' => 'text-align:center;'],
           ],

            [
              'attribute' => 'sampul',
              'format' =>'raw',
              'headerOptions' => ['style' => 'text-align:center;'],
              'value' => function ($model){
                if ($model->sampul != '') {
                    return Html::img('@web/upload/sampul/'. $model->sampul,['class'=>'img-responsive','style' => 'width:150px','height:150px', 'align'=>'center']);
                }else{
                  return '<div align="center"><h2>No Image</h2></div>';
                }
              },
            ],
            

            //'berkas',
            /**[
                'attribute' => 'berkas',
                'headerOptions' => ['style' => 'text-align:center;'],
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->berkas !='') {
                        return '<a href="' . Yii::$app->request->baseUrl . '/upload/' . $model->berkas . '"><div align="center"><button class="btn btn-success glyphicon glyphicon-download-alt"></button></div></a>';
                    } else {
                        return '<div align="center"><h1>No File</h1></div>';
                    }
                },
            ],*/

               [
                    'attribute' => 'berkas',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return $model->getLinkIconBerkas();
                    },
                    'headerOptions'=>['style'=>'text-align:center; width:100px'],
                    'contentOptions'=>['style'=>'text-align:center'],
                ],




            /**[
                'format' => 'raw',
                'value' => function ($model) {
                    $button = null;

                        $button .=Html::a('<i class= "fa fa-eye"></i>', ['buku/view', 'id' => $model->id]).' ';
                    if (User::isAdmin()){
                        $button .=Html::a('<i class= "fa fa-pencil"></i>', ['buku/update', 'id' => $model->id]).' ';
                    }

                    if(User::isAdmin()){
                        $button .=Html::a('<i class= "fa fa-trash"></i>', ['buku/delete', 'id' => $model->id]).' ';
                    }

                    return $button;
                },
                'contentOptions' => ['style' => 'text-align:center; width: 100px'],
            ],

        ],*/

    ['class' => 'yii\grid\ActionColumn'],
    ],


    ]); ?>

</div>
</div>

    </div>




