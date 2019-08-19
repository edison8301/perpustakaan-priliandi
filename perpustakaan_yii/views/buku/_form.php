<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kategori; 
use app\models\Penerbit;
use app\models\Penulis;


/* @var $this yii\web\View */
/* @var $model app\models\Buku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buku-form">
    <div class="box box-primary">
    <div class="box-header with-border">
    <h2 class ="box-tittle"> Data Buku</h2>
    </div>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    
    

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'tahun_terbit')->dropDownList(
        $model->getCaritahun(),
        ['prompt'=>'Pilih Tahun']
    )
    ?>

    <?=$form->field($model, 'id_penulis')->dropDownList(
        ArrayHelper::map(Penulis::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Penulis']
    )
    ?>

    <?=$form->field($model, 'id_penerbit')->dropDownList(
        ArrayHelper::map(Penerbit::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Penerbit']
    )
    ?>

     <?=$form->field($model, 'id_kategori')->dropDownList(
        ArrayHelper::map(Kategori::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Kategori']
    )
    ?>

    <?= $form->field($model, 'sinopsis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sampul')->fileInput() ?>

    <?= $form->field($model, 'berkas')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
