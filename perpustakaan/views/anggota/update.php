<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */

$this->title = 'Update Anggota: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anggota-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
