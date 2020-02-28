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
                    [
                        'label' => 'Document',
                        'icon' => 'book',
                        'url' => '#',
                        'items' => [
                            // ['label' => 'View Documents', 
                            //  'icon' => 'eye', 
                            //  'url' => '#',
                            //  'items' => [
                            //     ['label' => 'Kebijakan', 'icon' => 'circle', 'url' => ['/main/kebijakan'],],
                            //     ['label' => 'Standar', 'icon' => 'circle', 'url' => ['/main/standar'],],
                            //     ['label' => 'Prosedur Mutu', 'icon' => 'circle', 'url' => ['/main/prosedurmutu'],],
                            //     ['label' => 'SOP', 'icon' => 'circle', 'url' => ['/main/sop'],],
                            //     ['label' => 'Form', 'icon' => 'circle', 'url' => ['/main/form'],],
                            //     //  ['label' = > '['/main/document'],],
                            //  ],
                            // ],
                            ['label' => 'View Document', 'icon' => 'upload', 'url' => ['/main/kebijakan'],],
                            ['label' => 'Create Document', 'icon' => 'upload', 'url' => ['/main/document'],],
                            ['label' => 'Draft', 'icon' => 'upload', 'url' => ['document/draf'],],
                            ['label' => 'Approved Document', 'icon' => 'check-circle', 'url' => ['document/approved'],],
                            ['label' => 'Submitted Document', 'icon' => 'file-code-o', 'url' => ['/submitted-document'],],
                            ['label' => 'Waiting for Tags', 'icon' => 'tags', 'url' => ['/waitingfor-tags'],],
                            ['label' => 'Upload Cover', 'icon' => 'upload', 'url' => ['/upload-cover'],],
                            ['label' => 'Revision', 'icon' => 'upload', 'url' => ['/revision'],],
                        ],
                    ],
                    ['label' => 'Update Hierarchy', 'icon' => 'tree', 'url' => ['/update-hierarchy']],
                    ['label' => 'Grant Access', 'icon' => 'group', 'url' => ['/access-control/index']],
                    ['label' => 'Access Control', 'icon' => 'cog', 'url' => ['']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
