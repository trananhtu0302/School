<?php require_once __DIR__ . "/../Layout/header.php" ?>

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo SITE_URL ?>index.php?controller=courseCategory&action=index">Course Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Update Course Category</h1>
                </div>
            </div>
        </div>

        <!-- Step Form -->
        <form name="themts" class="js-step-form py-md-5" action="<?php echo SITE_URL ?>index.php?controller=courseCategory&action=update" method="POST">
            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Content Step Form -->
                    <div id="addUserStepFormContent">
                        <!-- Card -->
                        <div id="addUserStepProfile" class="card card-lg active">
                            <!-- Body -->
                            <div class="card-body">
                                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $courseCategory->id ?>">
                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Subjects title</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subjects_name" id="subjects_name" value="<?php echo $courseCategory->category_name ?>">
                                        <?php if (isset($_SESSION['error_subjects_name'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_subjects_name']; unset($_SESSION['error_subjects_name']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="descriptionLabel" class="col-sm-3 col-form-label input-label">Subjects description</label>

                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" id="descriptionLabel">
                                            <?php echo $courseCategory->category_description; ?>
                                        </textarea>
                                        <?php if (isset($_SESSION['error_subjects_description'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_subjects_description']; unset($_SESSION['error_subjects_description']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Content Step Form -->
                </div>
            </div>
            <!-- End Row -->
        </form>
        <!-- End Step Form -->
    </div>
    <!-- End Content -->

<?php require_once __DIR__ . "/../Layout/footer.php" ?>