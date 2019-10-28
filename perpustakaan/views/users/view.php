<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'password',

            [
               'attribute' =>'id_anggota',
               'headerOptions' => ['style' => 'text-align:center;'],
               'value' => function($data){
                return $data->anggota->nama;
               }
           ],
          [
               'attribute' =>'id_petugas',
               'headerOptions' => ['style' => 'text-align:center;'],
               'value' => function($data){
                return $data->petugas->nama;
               }
           ],
            [
               'attribute' =>'id_user_Role',
               'headerOptions' => ['style' => 'text-align:center;'],
               'value' => function($data){
            return @$data->userRole->nama;
               }
           ],


            //'id_anggota',
            //'id_petugas',
            //'id_user_role',
            'status',
        ],
    ]) ?>

</div>
