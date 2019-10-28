<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">


    <p>
        <?= Html::a('Tambah Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-primary">
    <div class="box-header with-border">
    <h2 class ="box-tittle"> Data Users</h2>
    </div>

    <div class= "box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']],

            //'id',
            [
              'attribute' => 'username',
              'headerOptions' => ['style' => 'text-align:center;'],
              'contentOptions' => ['style' => 'text-align:center'],
            ],
            
            [
              'attribute' => 'password',
              'headerOptions' => ['style' => 'text-align:center;'],
              'contentOptions' => ['style' => 'text-align:center'],
            ],

            [
               'attribute' =>'id_anggota',
               //'filter' => Petugas::getList(),
               'headerOptions' => ['style' => 'text-align:center;'],
               'contentOptions' => ['style' => 'text-align:center'],
               'value' => function($data){
                return @$data->anggota->nama;
               }
            ],
            [
               'attribute' =>'id_petugas',
               //'filter' => Petugas::getList(),
               'headerOptions' => ['style' => 'text-align:center;'],
               'contentOptions' => ['style' => 'text-align:center'],
               'value' => function($data){
                return @$data->petugas->nama;
               }
           ],

           [
               'attribute' =>'id_user_role',
               //'filter' => Petugas::getList(),
               'headerOptions' => ['style' => 'text-align:center;'],
               'contentOptions' => ['style' => 'text-align:center'],
               'value' => function($data){
                return @$data->userRole->nama;
               }
           ],





            //'id_anggota',
            //'id_petugas',
            //'id_user_role',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
