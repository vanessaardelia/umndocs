<?php

use Codeception\PHPUnit\ResultPrinter\HTML as ResultPrinterHTML;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

// $dataProvider = new ActiveDataProvider([
//     //    'query' => $query,
//     //        'query' => $documents->asArray(),
//         'query' => Document::find() ->select(['JenisDoc', 'DocumentStatus', 'CreatedBy', 'M_Revisi.NamaDoc AS namaDoc'])
//                                     ->from('M_Document')
//                                     ->join('join', 'M_Revisi', 'M_Revisi.IdDoc = M_Document.IdDoc'),

//         'pagination' => [
//             'pageSize' => 10,
//         ]
//     ])

$cookies = Yii::$app->request->cookies;
if (($cookie = $cookies->get('emailUser')) !== null) {
    $emailUser = $cookie->value;
    $IdUserquery = "SELECT M_User.IdUser FROM M_User WHERE M_User.EmailUser = '$emailUser'";
    $IdUser = Yii::$app->db->createCommand($IdUserquery)->queryScalar();
    $namaUserquery = "SELECT M_User.Nama FROM M_User WHERE M_User.EmailUser = '$emailUser'";
    $namaUser = Yii::$app->db->createCommand($namaUserquery)->queryScalar();
    $query = "SELECT *
                                FROM M_Notification
                                JOIN M_NotificationStatus ON M_Notification.IdContentNotif = M_NotificationStatus.IdContentNotif
                                WHERE M_Notification.IdUser = '$IdUser'";
    $notifications = Yii::$app->db->createCommand($query);
    $result = $notifications->query();
} else {
}
?>

<header class="main-header">

    <?php
    echo Html::a('<img src="' . Yii::$app->request->baseUrl . '/assets/Images/logo.png" style="width:40px; margin-top: 7px; float:left;">' . '<span class="col-12" style="font-size: 8pt;">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo', 'style' => 'padding: 0px; padding-left: 5px;']);
    ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li> -->
                <!-- inner menu: contains the actual data -->
                <!-- <ul class="menu">
                                <li> -->
                <!-- start message -->
                <!-- <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                                        </div>
                                        <h4>
                                            
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li> -->
                <!-- end message -->
                <!-- </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li> -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <?php foreach ($result as $notif) { ?>
                                            <i class="fa fa-users text-aqua"></i> <?= $notif['ContentNotif'] ?>
                                        <?php } ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>

                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image" />
                        <span class="hidden-xs"><?= $namaUser ?> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />

                            <p>
                                <?= $namaUser ?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!-- <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div> -->
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>