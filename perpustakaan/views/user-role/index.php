<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserRoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-role-index">


    <p>
        <?= Html::a('Tambah User Role', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-primary">
    <div class="box-header with-border">
    <h2 class ="box-tittle"> Data User Role</h2>
    </div>

    <div class= "box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
