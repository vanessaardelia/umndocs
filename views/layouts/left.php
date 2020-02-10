<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
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
                    /* label => nama di web, icon atau mau langsung url => bentuk logo, etc*/
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/main/index']],
                    // ['label' => 'View', 'icon' => 'eye', 'url' => ['/view']],
                    [
                        'label' => 'Document',
                        'icon' => 'book',
                        'url' => '#',
                        'items' => [
                            ['label' => 'View Documents', 'icon' => 'edit', 'url' => ['/main/document'],],
                            ['label' => 'Approved Document', 'icon' => 'check-circle', 'url' => ['/approved-document'],],
                            ['label' => 'Submitted Document', 'icon' => 'file-code-o', 'url' => ['/submitted-document'],],
                            ['label' => 'Waiting for Tags', 'icon' => 'tags', 'url' => ['/waitingfor-tags'],],
                            ['label' => 'Upload Cover', 'icon' => 'upload', 'url' => ['/upload-cover'],],
                            // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            // [
                            //     'label' => 'Level One',
                            //     'icon' => 'circle-o',
                            //     'url' => '#',
                            //     'items' => [
                            //         ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                            //         [
                            //             'label' => 'Level Two',
                            //             'icon' => 'circle-o',
                            //             'url' => '#',
                            //             'items' => [
                            //                 ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                            //                 ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                            //             ],
                            //         ],
                            //     ],
                            // ],
                        ],
                    ],
                    ['label' => 'Update Hierarchy', 'icon' => 'tree', 'url' => ['/update-hierarchy']],
                    ['label' => 'Grant Access', 'icon' => 'group', 'url' => ['/grant-access']],
                    ['label' => 'Access Control', 'icon' => 'cog', 'url' => ['/access-control']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
