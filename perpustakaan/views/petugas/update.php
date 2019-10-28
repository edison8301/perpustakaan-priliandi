<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Petugas */

$this->title = 'Update Petugas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="petugas-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
