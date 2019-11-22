<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?= $data['title'] ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?= BASEURL ?>/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= BASEURL ?>/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= BASEURL ?>/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= BASEURL ?>/assets/css/theme.css" rel="stylesheet" media="all">
    <link href="<?= BASEURL ?>/assets/css/lightbox.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?= BASEURL ?>">
                            <img src="<?= BASEURL ?>/assets/images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub <?= (!isset($_GET['url']) ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/admin">
                                <i class="fas fa-tachometer-alt fa-fw"></i>Dashboard
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/customer' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/customer">
                                <i class="fas fa-user fa-fw"></i>Pelanggan
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/tarif' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/tarif">
                                <i class="fas fa-dollar-sign fa-fw"></i>Tarif
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/tagihan' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/tagihan">
                                <i class="fas fa-file-alt fa-fw"></i>Tagihan
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/pembayaran' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/pembayaran">
                                <i class="fas fa-credit-card fa-fw"></i>Pembayaran
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/riwayat' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/riwayat">
                                <i class="fas fa-history fa-fw"></i>Riwayat
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?= BASEURL ?>">
                    <img src="<?= BASEURL ?>/assets/images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub <?= ($_GET['url'] == 'admin' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/admin">
                                <i class="fas fa-tachometer-alt fa-fw"></i>Dashboard
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/customer' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/customer">
                                <i class="fas fa-user fa-fw"></i>Pelanggan
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/tarif' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/tarif">
                                <i class="fas fa-dollar-sign fa-fw"></i>Tarif
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/tagihan' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/tagihan">
                                <i class="fas fa-file-alt fa-fw"></i>Tagihan
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/pembayaran' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/pembayaran">
                                <i class="fas fa-credit-card fa-fw"></i>Pembayaran
                            </a>
                        </li>
                        <li class="has-sub <?= ($_GET['url'] == 'menu/riwayat' ? 'active' : '') ?>">
                            <a href="<?= BASEURL ?>/menu/riwayat">
                                <i class="fas fa-history fa-fw"></i>Riwayat
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= BASEURL ?>/assets/images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= BASEURL ?>/assets/images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="<?= BASEURL ?>">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= BASEURL ?>/assets/images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= BASEURL ?>/assets/images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= BASEURL ?>/assets/images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="<?= BASEURL ?>">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="<?= BASEURL ?>">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?= BASEURL ?>/assets/images/icon/avatar-01.jpg" alt="<?= $data['login']['namalengkap'] ?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="<?= BASEURL ?>"><?= $data['login']['namalengkap'] ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="<?= BASEURL ?>">
                                                        <img src="<?= BASEURL ?>/assets/images/icon/avatar-01.jpg" alt="<?= $data['login']['namalengkap'] ?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="<?= BASEURL ?>"><?= $data['login']['namalengkap'] ?></a>
                                                    </h5>
                                                    <?php
                                                        if ($_SESSION['user_online']['level'] == 'member' || $data['login']['level'] == 'member') {
                                                            ?>
                                                                <span class="email">MEMBER ID : #<?= $data['login']['kodelogin'] ?></span>
                                                            <?php
                                                        } else if ($_SESSION['user_online']['level'] == 'admin' || $data['login']['level'] == 'admin') {
                                                            ?>
                                                                <span class="email">ADMIN ID : #<?= $data['login']['kodelogin'] ?></span>
                                                            <?php
                                                        } else if ($_SESSION['user_online']['level'] == 'super_admin' || $data['login']['level'] == 'super_admin') {
                                                            ?>
                                                                <span class="email">SUPER ADMIN</span>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?= BASEURL ?>">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="<?= BASEURL ?>">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="<?= BASEURL ?>">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= BASEURL ?>/logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->