<?php require_once __DIR__ . "/../Layout/header.php" ?>

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo SITE_URL ?>index.php?controller=trainingStaff&action=index">Management staff</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Management staff details</h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-lg-center">
            <div class="col-lg-10">
                <!-- Profile Cover -->
                <div class="profile-cover">
                    <div class="profile-cover-img-wrapper">
                        <img id="profileCoverImg" class="profile-cover-img" src="<?php echo assets_css() ?>dashboard\img\1920x400\img1.jpg" alt="Image Description">
                    </div>
                </div>
                <!-- End Profile Cover -->

                <!-- Profile Header -->
                <div class="text-center mb-5">
                    <!-- Avatar -->
                    <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar" for="avatarUploader">
                        <img id="avatarImg" class="avatar-img" src="<?php echo assets_css() ?>dashboard\img\160x160\img1.jpg" alt="Image Description">
                    </label>
                    <!-- End Avatar -->

                    <h1 class="page-header-title" style="text-transform: capitalize;"><?php echo $user->training_staff_name ?><i class="tio-verified tio-lg text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></h1>
                </div>
                <!-- End Profile Header -->

                <!-- Nav -->
                <div class="js-nav-scroller hs-nav-scroller-horizontal mb-5">
                    <ul class="nav nav-tabs align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active disabled">Profile</a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5 text-center">
                            <!-- Header -->
                            <div class="card-header" style="justify-content: center">
                                <h2 class="card-header-title h5">Profile</h2>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-py-3 text-dark mb-3">
                                    <li class="py-0">
                                        <small class="card-subtitle">Name</small>
                                    </li>

                                    <li>
                                        <i class="tio-user-outlined nav-icon"></i>
                                        <?php echo $user->training_staff_name ?>
                                    </li>

                                    <li class="py-0">
                                        <small class="card-subtitle">Level</small>
                                    </li>

                                    <li>
                                        <i class="tio-briefcase-outlined nav-icon"></i>
                                        <?php if ($user->level == 0) {
                                            echo "admin";
                                        } else {
                                            echo 'training staff';
                                        }  ?>
                                    </li>

                                    <li class="pt-2 pb-0">
                                        <small class="card-subtitle">Email</small>
                                    </li>

                                    <li>
                                        <i class="tio-online nav-icon"></i>
                                        <?php echo $user->training_staff_email ?>
                                    </li>

                                    <li class="pt-2 pb-0">
                                        <small class="card-subtitle">Phone</small>
                                    </li>

                                    <li>
                                        <i class="tio-android-phone-vs nav-icon"></i>
                                        <?php echo $user->training_staff_phone ?>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->

    <?php require_once __DIR__ . "/../Layout/footer.php" ?>