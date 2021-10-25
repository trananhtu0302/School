<?php require_once __DIR__ . "/../Layout/header.php" ?>

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo SITE_URL ?>index.php?controller=trainee&action=index">Trainee</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Update Trainee</h1>
                </div>
            </div>
        </div>

        <!-- Step Form -->
        <form name="themts" class="js-step-form py-md-5" action="<?php echo SITE_URL ?>index.php?controller=trainee&action=update" method="POST">
            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <!-- Content Step Form -->
                    <div id="addUserStepFormContent">
                        <!-- Card -->
                        <div id="addUserStepProfile" class="card card-lg active">
                            <!-- Body -->
                            <div class="card-body">
                                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $user->id ?>">
                                
                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Full name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $user->trainee_name ?>">
                                        <?php if (isset($_SESSION['error_name'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_name'];
                                                unset($_SESSION['error_name']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="courseLabel" class="col-sm-3 col-form-label input-label">Course</label>

                                    <div class="col-sm-9">

                                        <select class="form-control col-md-8" name="course_id">
                                            <option value=""> - Please select a course - </option>
                                            <?php foreach ($course as $item) : ?>
                                                <option value="<?php echo $item->id ?>"><?php echo $item->course_name ?></option>
                                            <?php endforeach ?>
                                        </select>

                                        <?php if (isset($_SESSION['error_course_id'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_course_id'] ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="ageLabel" class="col-sm-3 col-form-label input-label">Age</label>

                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="age" id="ageLabel" value="<?php echo $user->age ?>">
                                        <?php if (isset($_SESSION['error_age'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_age'];
                                                unset($_SESSION['error_age']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="emailLabel" class="col-sm-3 col-form-label input-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="emailLabel" value="<?php echo $user->trainee_email ?>">
                                        <?php if (isset($_SESSION['error_email'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_email'];
                                                unset($_SESSION['error_email']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="passwordLabel" class="col-sm-3 col-form-label input-label">Password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" id="password" value="<?php echo isset($user->trainee_password) ? $user->trainee_password : "" ?>">
                                        <?php if (isset($_SESSION['error_password'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_password']; unset($_SESSION['error_password']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="phoneLabel" class="col-sm-3 col-form-label input-label">Phone</label>

                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="phone" id="phone" value="<?php echo $user->trainee_phone ?>">
                                        <?php if (isset($_SESSION['error_phone'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_phone'];
                                                unset($_SESSION['error_phone']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row">
                                    <label class="col-sm-3 col-form-label input-label">Level</label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-down-break">
                                            <!-- Custom Radio -->
                                            <div class="form-control">
                                                <div class="custom-control custom-radio">
                                                    <?php $radio0 = (isset($user->trainee_sex) == 0) ? "checked" : "";  ?>
                                                    <input type="radio" class="custom-control-input" name="sexRadio" id="sexRadio1" value="0" <?php echo $radio0 ?>>
                                                    <label class="custom-control-label" for="sexRadio1">Male</label>
                                                </div>
                                            </div>
                                            <!-- End Custom Radio -->

                                            <!-- Custom Radio -->
                                            <div class="form-control">
                                                <div class="custom-control custom-radio">
                                                    <?php $radio1 = (isset($user->trainee_sex) == 1) ? "checked" : "";  ?>    
                                                    <input type="radio" class="custom-control-input" name="sexRadio" id="sexRadio2" value="1" <?php echo $radio1 ?>>
                                                    <label class="custom-control-label" for="sexRadio2">Female</label>
                                                </div>
                                            </div>
                                            <!-- End Custom Radio -->
                                        </div>
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