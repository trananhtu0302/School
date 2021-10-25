<?php require_once __DIR__. "/Layout/header.php" ?>

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main pointer-event">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h1 class="page-header-title">Dashboard</h1>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Stats -->
            <div class="row gx-2 gx-lg-3">
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="#">
                        <div class="card-body">
                            <h6 class="card-subtitle">Total number of management staff accounts</h6>

                            <div class="row align-items-center gx-2 mb-1 mt-5">
                                <div class="col-6">
                                    <span class="card-title h1"><?php echo count($trainingStaff) ?></span>
                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </a>
                    <!-- End Card -->
                </div>

                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="#">
                        <div class="card-body">
                            <h6 class="card-subtitle">Total number of trainer accounts</h6>

                            <div class="row align-items-center gx-2 mb-1 mt-5">
                                <div class="col-6">
                                    <span class="card-title h1"><?php echo count($trainer) ?></span>
                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </a>
                    <!-- End Card -->
                </div>

                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="#">
                        <div class="card-body">
                            <h6 class="card-subtitle">Total number of trainee accounts</h6>

                            <div class="row align-items-center gx-2 mb-1 mt-5">
                                <div class="col-6">
                                    <span class="card-title h1"><?php echo count($trainee) ?></span>
                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </a>
                    <!-- End Card -->
                </div>

                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100" href="#">
                        <div class="card-body">
                            <h6 class="card-subtitle">Total number of classes</h6>

                            <div class="row align-items-center gx-2 mb-1 mt-5">
                                <div class="col-6">
                                    <span class="card-title h1"><?php echo count($course) ?></span>
                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
            </div>
            <!-- End Stats -->
        </div>
        <!-- End Content -->

<?php require_once __DIR__. "/Layout/footer.php" ?>