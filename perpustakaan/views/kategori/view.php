<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kategori */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kategori-view">

   

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
            'nama',
        ],
    ]) ?>

</div>

<div class="box box-primary">
    <div>&nbsp;</div>
    <h2>Daftar Buku</h2>
    <?= Html::a('Tambah Buku', ['buku/create', 'id_kategori' => $model->id], ['class' => 'btn btn-primary']) ?>
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama Buku</th>
            <td>&nbsp;</td>
        </tr>
        <?php $no=1; foreach ($model->findAllBuku() as $buku): ?> 
        <tr>
            <td><?= $no; ?></td>
            <td><?= Html::a($buku->nama, ['buku/view','id'=>$buku->id]); ?></td>
            <td><?= Html::a("Edit", ["buku/update","id"=>$buku->id], ['class' => 'btn btn-primary']); ?> &nbsp;</td>
            <td><?= Html::a("Delete", ["buku/delete","id"=>$buku->id], ['class' => 'btn btn-primary'], ['data-method' => 'post', 'data-confirm' => 'file akan dihapus?']); ?> &nbsp;</td>
        </tr>
        <?php $no++; endforeach ?>
    </table>
</div>

