<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Buku;
use app\models\Anggota;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Kategori;
use app\models\Peminjaman;
use app\models\Petugas;
use app\models\User;
use app\models\Users;
use app\components\Helper;
use miloschuman\highcharts\Highcharts;
use yiier\chartjs\ChartJs;

/* @var $this yii\web\View */

$this->title = 'Halaman Dashboard';
?>




  <?php if (Yii::$app->user->identity->id_user_role == 1): ?>

      
      <div class="body-content">

        <div class="row">
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <div class="icon"><i class="fa fa-group"></i></div>
                <h3><div class="count"><?= Yii::$app->formatter->asInteger(Anggota::getAnggotaCount()); ?></div></h3>
              <h4>Anggota</h4>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/perpustakaan/web/index.php?r=anggota" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <div class="icon"><i class="fa fa-book"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Anggota::getAnggotaCount()); ?></div></h3>
              <h4>Buku</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/perpustakaan/web/index.php?r=buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <div class="icon"><i class="fa fa-user"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Penulis::getPenulisCount()); ?></div></h3>
              <h4>Penulis</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/perpustakaan/web/index.php?r=penulis" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <div class="icon"><i class="fa fa-building"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Penerbit::getPenerbitCount()); ?></div></h3>
              <h4>Penerbit</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/perpustakaan/web/index.php?r=penerbit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <div class="icon"><i class="fa fa-briefcase"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Peminjaman::getPeminjamanCount()); ?></div></h3>
              <h4>Peminjaman</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/perpustakaan/web/index.php?r=peminjaman" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <div class="icon"><i class="fa fa-tasks"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Kategori::getKategoriCount()); ?></div></h3>
              <h4>Kategori</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/perpustakaan/web/index.php?r=Kategori" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <div class="icon"><i class="fa fa-user"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Petugas::getPetugasCount()); ?></div></h3>
              <h4>Petugas</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/perpustakaan/web/index.php?r=petugas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


          <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <div class="icon"><i class="fa fa-users"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Users::getUsersCount()); ?></div></h3>
              <h4>Users</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/perpustakaan/web/index.php?r=users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        


<!-- ====GRAFIK=== -->
  <!--   <div class="row"> -->
    <div class="col-sm-6">
        <!-- <div class="box box-primary">
                <h3 class="box-title">BUKU BERDASARKAN KATEGORI</h3>
            </div> -->
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'Buku Berdasarkan Kategori'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'bar' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'buku',
                                'data' => Kategori::getGrafikList(),
                            ],
                        ],
                    ],
                ]);?>
        </div>
    </div>


    <!-- ====GRAFIK=== -->
  <!--   <div class="row"> -->
    <div class="col-sm-6">
        <!-- <div class="box box-primary">
                <h3 class="box-title">BUKU BERDASARKAN KATEGORI</h3>
            </div> -->
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'Buku Berdasarkan Penulis'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'bar' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'xAxis' => [
                          'categories'=>[
                            'Syahrul', 
                            'Samsul', 
                            'Maul', 
                            'Priliyandi'
                          ]
                        ],
                        'series' => [
                            [
                                'type' => 'bar',
                                'name' => 'buku',
                                'data' => Penulis::getGrafikList(),
                            ],
                        ],
                    ],
                ]);?>
        </div>
    </div>


  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <h3 class="box-title">Grafik Peminjaman Buku</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- <canvas id="mybarChart"> -->
                        <div class="box-body">
                  <?= ChartJs::widget([
                'type' => 'bar',
                'options' => [
                    'height' => 600,
                    'width' => 900,
                    'color' => 'red'
                ],
                'data' => [
                    'labels' => Helper::getListBulan(),
                     'datasets' => [
                         [
                             'label'=> 'Peminjaman',
                             'data' => Peminjaman::getGrafikPeminjamanByBulan()
                         ],
                     ]
                ]
            ]);?>
                         
        </div> 

       <?php } ?>













        <!-- Dashboard Anggota -->
<?php if (Yii::$app->user->identity->id_user_role == 2): ?>
<?php $this->title = 'Perpustakaan'; ?>

<div class="row">
    <?php foreach ($provider->getModels() as $buku) {?> 
        <!-- Kolom box mulai -->
        <div class="col-md-4">
            <!-- Box mulai -->
            <div class="box box-widget">

                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="<?= Yii::getAlias('@web').'/images/a.jpg'; ?>" alt="User Image">
                        <span class="username"><?= Html::a($buku->nama, ['buku/view', 'id' => $buku->id]); ?></span>
                        <span class="description"> Di Terbitkan : Tahun <?= $buku->tahun_terbit; ?></span>
                    </div>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read"><i class="fa fa-circle-o"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <img class="img-responsive pad" style="height: 300px;" src="<?= Yii::$app->request->baseUrl.'/upload/'.$buku['sampul']; ?>" alt="Photo">
                    <p>Sinopsis : <?= substr($buku->sinopsis,0,120);?> ...</p>
                    <?= Html::a("<i class='fa fa-eye'> Detail Buku</i>",["buku/view","id"=>$buku->id],['class' => 'btn btn-default']) ?>
                    <?= Html::a('<i class="fa fa-file"> Pinjam Buku</i>', ['peminjaman/create', 'id_buku' => $buku->id], [
                        'class' => 'btn btn-primary',
                        'data' => [
                            'confirm' => 'Apa anda yakin ingin meminjam buku ini?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <!-- <span class="pull-right text-muted">127 Peminjam - 3 Komentar</span> -->
                </div>

            </div>
            <!-- Box selesai -->

        </div>
        <!-- Kolom box selesai -->  
    <?php
        }
    ?>

    </div>
    <!-- pagination atau menampilkan next 1, 2, 3 -->
    <div class="row">
        <center>
            <?= LinkPager::widget([
                'pagination' => $provider->pagination,
            ]) ?>
        </center>
    </div>
<?php endif ?>










  


<!-- <div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div> -->
