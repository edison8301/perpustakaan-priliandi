<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */

$this->title = 'Create Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
