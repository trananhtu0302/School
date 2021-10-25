<?php require_once __DIR__ . "/../Layout/header.php" ?>

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo SITE_URL ?>index.php?controller=trainer&action=index">Trainer</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add new</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Add new Trainer</h1>
                </div>
            </div>
        </div>

        <!-- Step Form -->
        <form name="themts" class="js-step-form py-md-5" action="<?php echo SITE_URL ?>index.php?controller=trainer&action=store" method="POST">
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
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Full name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo isset($form_data["name"]) ? $form_data["name"] : "" ?>">
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
                                    <label for="addressLabel" class="col-sm-3 col-form-label input-label">Address</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address" id="addressLabel" value="<?php echo isset($form_data["address"]) ? $form_data["address"] : "" ?>">
                                        <?php if (isset($_SESSION['error_address'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_address'];
                                                unset($_SESSION['error_address']); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="emailLabel" class="col-sm-3 col-form-label input-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="emailLabel" value="<?php echo isset($form_data["email"]) ? $form_data["email"] : "" ?>">
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
                                    <label for="phoneLabel" class="col-sm-3 col-form-label input-label">Phone</label>

                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="phone" id="phone" value="<?php echo isset($form_data["phone"]) ? $form_data["phone"] : "" ?>">
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
                                <div class="row form-group">
                                    <label for="passwordLabel" class="col-sm-3 col-form-label input-label">Password</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" id="password" value="<?php echo isset($form_data["password"]) ? $form_data["password"] : "" ?>">
                                        <?php if (isset($_SESSION['error_password'])) : ?>
                                            <p class="text-danger">
                                                <?php echo $_SESSION['error_password'];
                                                unset($_SESSION['error_password']); ?>
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