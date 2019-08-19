<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kategori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-form">
	<div class="box box-primary">
    <div class="box-header with-border">
    <h2 class ="box-tittle"> Data Kategori</h2>
    </div>

    <div class= "box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
