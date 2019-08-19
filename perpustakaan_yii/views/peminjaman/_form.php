<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Buku;
use app\models\Anggota;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-form">
    <div class="box box-primary">
    <div class="box-header with-border">
    <h2 class ="box-tittle"> Data Peminjaman</h2>
    </div>

    <div class= "box-body">

    <?php $form = ActiveForm::begin(); ?>

     <?=$form->field($model, 'id_buku')->dropDownList(
        ArrayHelper::map(Buku::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Buku']
    )
    ?>

     <?=$form->field($model, 'id_anggota')->dropDownList(
        ArrayHelper::map(Anggota::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Penulis']
    )
    ?>

    <?= $form->field($model, 'tanggal_pinjam')->widget(
        DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>


    <?= $form->field($model, 'tanggal_kembali')->widget(
        DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
