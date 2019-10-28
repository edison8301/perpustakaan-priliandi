<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peminjaman-view">

  

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
            //'id',
           // 'id_buku',

          [
                'attribute' => 'id_buku',
                'contentOptions' => ['style' => 'text-align:left;'],
                'value' => function ($data)
                {
                    return @$data->buku->nama;
                    # code...
                }
          ],

          [
               'attribute' =>'id_anggota',
               'headerOptions' => ['style' => 'text-align:center;'],
               'value' => function($data){
                return @$data->anggota->nama;
               }
           ],
           
            //'id_anggota',
            'tanggal_pinjam',
            'tanggal_kembali',
        ],
    ]) ?>

</div>
