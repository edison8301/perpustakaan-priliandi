<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Anggota;
use app\models\Petugas;
use app\models\UserRole;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
    <div class="box box-primary">
    <div class="box-header with-border">
    <h2 class ="box-tittle"> Data Users</h2>
    </div>

    <div class= "box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'id_anggota')->dropDownList(
        ArrayHelper::map(Anggota::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Anggota']
    )
    ?>

    <?=$form->field($model, 'id_petugas')->dropDownList(
        ArrayHelper::map(Petugas::find()->all(),'id','nama'),
        ['prompt'=>'Pilih Petugas']
    )
    ?>

    <?=$form->field($model, 'id_user_role')->dropDownList(
        ArrayHelper::map(UserRole::find()->all(),'id','nama'),
        ['prompt'=>'Pilih User Role']
    )
    ?>

    <?=$form->field($model, 'status')->dropDownList(
        $model->getStatus(),
        ['prompt'=>'Pilih Status']
    )
    ?>





    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
