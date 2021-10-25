<?php require_once __DIR__ . "/../Layout/header.php" ?>

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo SITE_URL ?>index.php?controller=course&action=index">Course</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add new</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Add new course</h1>
                </div>
            </div>
        </div>

        <!-- Step Form -->
        <form name="themts" class="js-step-form py-md-5" action="<?php echo SITE_URL ?>index.php?controller=course&action=store" method="POST">
            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Content Step Form -->
                    <div id="addUserStepFormContent">
                        <!-- Card -->
                        <div id="addUserStepProfile" class="card card-lg active">
                            <!-- Body -->
                            <div class="card-body">

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Course name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="course_name" id="course_name" value="<?php echo isset($form_data["course_name"]) ? $form_data["course_name"] : "" ?>">
                                        <?php if (isset($_SESSION['error_course_name'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_course_name'];
                                                unset($_SESSION['error_course_name']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="course_categoryLabel" class="col-sm-3 col-form-label input-label">Subject</label>

                                    <div class="col-sm-9">

                                        <select class="form-control col-md-8" name="course_category_id">
                                            <option value=""> - Please select a course - </option>
                                            <?php foreach ($courseCategories as $item) : ?>
                                                <option value="<?php echo $item->id ?>"><?php echo $item->category_name ?></option>
                                            <?php endforeach ?>
                                        </select>

                                        <?php if (isset($_SESSION['error_course_category_id'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_course_category_id'] ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="descriptionLabel" class="col-sm-3 col-form-label input-label">Course description</label>

                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" id="descriptionLabel" value="<?php echo isset($form_data["course_description"]) ? $form_data["course_description"] : "" ?>" rows="4"></textarea>
                                        <?php if (isset($_SESSION['error_course_description'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_course_description'];
                                                unset($_SESSION['error_course_description']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="end_dateLabel" class="col-sm-3 col-form-label input-label">Course end date</label>

                                    <div class="col-sm-9">
                                        <input type="date" name="end_date" class="form-control" value="<?php echo isset($form_data["end_date"]) ? $form_data["end_date"] : "" ?>">
                                    </div>
                                </div>
                                <!-- End Form Group -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-primary">
                                    Create
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