<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kategori; 
use app\models\Penerbit;
use app\models\Penulis;
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;


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

    <?= $form->field($model, 'sinopsis')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'es',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);?>

    <?= $form->field($model, 'sampul')->widget(FileInput::classname(), [
        'data' => $model->berkas,
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Select Photo'
        ] 
    ]); ?>


    <?= $form->field($model, 'berkas')->widget(FileInput::classname(), [
        'data' => $model->berkas,
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
