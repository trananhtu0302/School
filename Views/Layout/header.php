<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>School</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo assets_css() ?>dashboard\css\vendor.min.css">
    <link rel="stylesheet" href="<?php echo assets_css() ?>dashboard\vendor\icon-set\style.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo assets_css() ?>dashboard\css\theme.min.css?v=1.0">
</head>

<body class="   footer-offset">
    <script src="<?php echo assets_css() ?>dashboard\vendor\hs-navbar-vertical-aside\hs-navbar-vertical-aside-mini-cache.js"></script>
    <!-- ONLY DEV -->

    <!-- JS Preview mode only -->
    <div id="headerMain" class="d-none">
        <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
            <div class="navbar-nav-wrap">
                <div class="navbar-brand-wrapper">
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.html" aria-label="Front">
                        <img class="navbar-brand-logo" src="<?php echo assets_css() ?>dashboard\svg\logos\logo.svg" alt="Logo">
                        <img class="navbar-brand-logo-mini" src="<?php echo assets_css() ?>dashboard\svg\logos\logo-short.svg" alt="Logo">
                    </a>
                    <!-- End Logo -->
                </div>

                <div class="navbar-nav-wrap-content-left">
                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                        <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip" data-placement="right" title="Collapse"></i>
                        <i class="tio-last-page navbar-vertical-aside-toggle-full-align" data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-toggle="tooltip" data-placement="right" title="Expand"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>

                <!-- Secondary Content -->
                <div class="navbar-nav-wrap-content-right">
                    <!-- Navbar -->
                    <ul class="navbar-nav align-items-center flex-row">
                        <li class="nav-item">
                            <!-- Account -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;" data-hs-unfold-options='{
                                    "target": "#accountNavbarDropdown",
                                    "type": "css-animation"
                                }'>
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="<?php echo assets_css() ?>dashboard\img\160x160\img6.jpg" alt="Image Description">
                                        <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                    </div>
                                </a>

                                <div id="accountNavbarDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account" style="width: 16rem;">
                                    <div class="dropdown-item-text">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-sm avatar-circle mr-2">
                                                <img class="avatar-img" src="<?php echo assets_css() ?>dashboard\img\160x160\img6.jpg" alt="Image Description">
                                            </div>
                                            <div class="media-body">
                                                <span class="card-title h5"><?php echo $_SESSION['admin_name'] ?></span>
                                                <span class="card-text"><?php echo $_SESSION['admin_email'] ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="<?php echo SITE_URL ?>index.php?controller=base&action=logout">
                                        <span class="text-truncate pr-2" title="Sign out">Sign out</span>
                                    </a>
                                </div>
                            </div>
                            <!-- End Account -->
                        </li>
                    </ul>
                    <!-- End Navbar -->
                </div>
                <!-- End Secondary Content -->
            </div>
        </header>
    </div>
    <div id="headerFluid" class="d-none">
        <header id="header" class="navbar navbar-expand-xl navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered  ">
            <div class="js-mega-menu navbar-nav-wrap">
                <div class="navbar-brand-wrapper">
                    <!-- Logo -->
                    <a class="navbar-brand" aria-label="Front">
                        <img class="navbar-brand-logo" src="<?php echo assets_css() ?>dashboard\svg\logos\logo.svg" alt="Logo">
                    </a>
                    <!-- End Logo -->
                </div>
            </div>
        </header>
    </div>
    <div id="headerDouble" class="d-none">
        <header id="header" class="navbar navbar-expand-lg navbar-bordered flex-lg-column px-0">
            <div class="navbar-dark w-100">
                <div class="container-fluid">
                    <div class="navbar-nav-wrap">
                        <div class="navbar-brand-wrapper">
                            <!-- Logo -->
                            <a class="navbar-brand" aria-label="Front">
                                <img class="navbar-brand-logo" src="<?php echo assets_css() ?>dashboard\svg\logos\logo-white.svg" alt="Logo">
                            </a>
                            <!-- End Logo -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div id="sidebarMain" class="d-none">
        <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
            <div class="navbar-vertical-container">
                <div class="navbar-vertical-footer-offset">
                    <div class="navbar-brand-wrapper justify-content-between">
                        <!-- Logo -->
                        <a class="navbar-brand" aria-label="Front">
                            <img class="navbar-brand-logo" src="<?php echo assets_css() ?>dashboard\svg\logos\logo.svg" alt="Logo">
                            <img class="navbar-brand-logo-mini" src="<?php echo assets_css() ?>dashboard\svg\logos\logo-short.svg" alt="Logo">
                        </a>
                        <!-- End Logo -->

                        <!-- Navbar Vertical Toggle -->
                        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                            <i class="tio-clear tio-lg"></i>
                        </button>
                        <!-- End Navbar Vertical Toggle -->
                    </div>

                    <!-- Content -->
                    <div class="navbar-vertical-content">
                        <ul class="navbar-nav navbar-nav-lg nav-tabs">
                            <!-- Dashboards -->
                            <li class="nav-item ">
                                <a class="js-nav-tooltip-link nav-link " href="<?php echo SITE_URL ?>index.php?controller=base&action=dashboard" title="Dashboard" data-placement="left">
                                    <i class="tio-home-vs-1-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
                                </a>
                            </li>
                            <!-- End Dashboards -->

                            <li class="nav-item">
                                <small class="nav-subtitle" title="Account Management">Account</small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <!-- Training staff -->
                            <?php if (($_SESSION['level'] == 0 || $_SESSION['level'] == 1) && $_SESSION['level'] != 3) : ?>
                                <li class="nav-item ">
                                    <a class="js-nav-tooltip-link nav-link " href="<?php echo SITE_URL ?>index.php?controller=trainingStaff&action=index" title="Management staff">
                                        <i class="tio-pages-outlined nav-icon"></i>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Management staff</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <!-- End Training staff -->

                            <!-- Trainer  -->
                            <?php if (($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2) && $_SESSION['level'] != 3) : ?>
                                <li class="nav-item ">
                                    <a class="js-nav-tooltip-link nav-link " href="<?php echo SITE_URL ?>index.php?controller=trainer&action=index" title="Trainer">
                                        <i class="tio-pages-outlined nav-icon"></i>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Trainer</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <!-- End Trainer -->

                            <!-- Trainee  -->
                            <li class="nav-item ">
                                <a class="js-nav-tooltip-link nav-link " href="<?php echo SITE_URL ?>index.php?controller=trainee&action=index" title="Trainee">
                                    <i class="tio-pages-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Trainee</span>
                                </a>
                            </li>
                            <!-- End Trainee -->

                            <li class="nav-item">
                                <div class="nav-divider"></div>
                            </li>

                            <li class="nav-item">
                                <small class="nav-subtitle" title="Subjects and Classes">Course Category and Course</small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="nav-item ">
                                <a class="js-nav-tooltip-link nav-link " href="<?php echo SITE_URL ?>index.php?controller=courseCategory&action=index" title="Course Category" data-placement="left">
                                    <i class="tio-dashboard-vs-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Course Category</span>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="js-nav-tooltip-link nav-link " href="<?php echo SITE_URL ?>index.php?controller=course&action=index" title="Course" data-placement="left">
                                    <i class="tio-dashboard-vs-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Course</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </aside>
    </div>
    <div id="sidebarCompact" class="d-none">
        <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
            <div class="navbar-vertical-container">
                <div class="navbar-brand d-flex justify-content-center">
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.html" aria-label="Front">
                        <img class="navbar-brand-logo-short" src="<?php echo assets_css() ?>dashboard\svg\logos\logo-short.svg" alt="Logo">
                    </a>
                    <!-- End Logo -->
                </div>
        </aside>
    </div>

    <script src="<?php echo assets_css() ?>dashboard\js\demo.js"></script>

    <!-- END ONLY DEV -->