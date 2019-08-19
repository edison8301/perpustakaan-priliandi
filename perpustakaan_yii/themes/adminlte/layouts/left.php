<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/prili.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Priliyandi</p>

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

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],


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

                    ['label' => 'Users', 'icon' => 'users', 'url' => ['/users'],],

                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                            
                        
                    
                ],
            ]
        ) ?>

    </section>

</aside>
