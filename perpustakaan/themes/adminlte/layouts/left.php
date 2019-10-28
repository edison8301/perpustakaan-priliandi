<?php
    use app\models\User;
?>

 <?php if (User::isAdmin()) { ?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/index.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
 <?php } ?>




 <?php if (User::isAnggota()) { ?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
 <?php } ?>


 <?php if (User::isPetugas()) { ?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
 <?php } ?>


    <?php if (User::isAdmin()) { ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                   
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site']],

                    ['label' => 'Menu Utama', 'options' => ['class' => 'header']],

                    [
                        'label' => 'Master Data',
                        'icon' => 'th',
                        'url' => '#',
                        'items' =>[
                            ['label' => 'Anggota', 'icon' => 'user', 'url' => ['/anggota'],],
                            ['label' => 'Buku', 'icon' => 'book', 'url' => ['/buku'],],
                            ['label' => 'Kategori', 'icon' => 'tasks', 'url' => ['/kategori'],],
                            ['label' => 'Penulis', 'icon' => 'user', 'url' =>['/penulis'],],
                            ['label' => 'Penerbit', 'icon' => 'briefcase', 'url' => ['/penerbit'],],
                            ['label' => 'Petugas', 'icon' => 'user', 'url' => ['/petugas'],],
                        ],
                    ],

                    ['label' => 'Peminjaman', 'icon' => 'shopping-cart', 'url' =>['/peminjaman'],],

                    ['label' => 'Users', 'icon' => 'users', 'items' => [
                        ['label' => 'Admin', 'icon' => 'circle-o', 'url' => ['/users/index', 'id_user_role' => 1]],
                        ['label' => 'Anggota', 'icon' => 'circle-o', 'url' => ['/users/index', 'id_user_role' => 2]],
                        ['label' => 'Petugas', 'icon' => 'circle-o', 'url' => ['/users/index', 'id_user_role' => 3]],
                    
                    ]
                    ],
                    
                    ['label' => 'User Role', 'icon' => 'user Role', 'url' => ['/user-role'],],


                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],

                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],

                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                            
                        
                    
                ],
            ]
        ) ?>
    <?php } ?>


      <?php if (User::isAnggota()) { ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                  
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site']],
                    
                    ['label' => 'Menu Utama', 'options' => ['class' => 'header']],


                    ['label' => 'Peminjaman', 'icon' => 'shopping-cart', 'url' =>['/peminjaman'],],


                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                            
                        
                    
                ],
            ]
        ) ?>
    <?php } ?>


    <?php if (User::isPetugas()) { ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site']],
                    

                    ['label' => 'Menu Utama', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Master Data',
                        'icon' => 'th',
                        'url' => '#',
                        'items' =>[
                            ['label' => 'Anggota', 'icon' => 'user', 'url' => ['/anggota'],],
                            ['label' => 'Buku', 'icon' => 'book', 'url' => ['/buku'],],
                            ['label' => 'Kategori', 'icon' => 'tasks', 'url' => ['/kategori'],],
                            ['label' => 'Penulis', 'icon' => 'user', 'url' =>['/penulis'],],
                            ['label' => 'Penerbit', 'icon' => 'briefcase', 'url' => ['/penerbit'],],
                        ],
                    ],

                    ['label' => 'Peminjaman', 'icon' => 'shopping-cart', 'url' =>['/peminjaman'],],

                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                            
                        
                    
                ],
            ]
        ) ?>
    <?php } ?>

    </section>

</aside>
