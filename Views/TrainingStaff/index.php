<?php require_once __DIR__ . "/../Layout/header.php" ?>

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo SITE_URL ?>index.php?controller=trainingStaff&action=index">Management staff</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Management staff</h1>
                </div>

                <?php if ($_SESSION['level'] == 0) : ?>
                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="<?php echo SITE_URL ?>index.php?controller=trainingStaff&action=create">
                            <i class="tio-user-add mr-1"></i> Add new
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']) ?>
            </div>
        <?php endif ?>
        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                        <form action="" method="GET">
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input type="hidden" name="controller" value="trainingStaff" />
                                <input type="text" class="form-control" placeholder="Search management staff" name="keyword">
                            </div>
                            <input type="hidden" name="action" value="index" />
                            <!-- End Search -->
                        </form>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Level</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (is_array($users) && !empty($users)) :
                            foreach ($users as $keyUser => $user) :
                        ?>
                                <tr class="text-center">
                                    <td><?php echo $user->id ?></td>
                                    <td class="h5"><?php echo $user->training_staff_name ?></td>
                                    <td><?php echo $user->training_staff_email ?></td>
                                    <td><?php echo $user->training_staff_phone ?></span></td>
                                    <td>
                                        <?php if ($user->level == 0) {
                                            echo "admin";
                                        } else {
                                            echo 'training staff';
                                        }  ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-soft-primary" href="<?php echo SITE_URL ?>index.php?controller=trainingStaff&action=detail&id=<?php echo $user->id ?>">
                                            <i class="tio-direction"></i> Detail
                                        </a>

                                        <?php if ($_SESSION['level'] == 0 || $_SESSION['admin_email'] == $user->training_staff_email) : ?>
                                            <a class="btn btn-sm btn-soft-info" href="<?php echo SITE_URL ?>index.php?controller=trainingStaff&action=edit&id=<?php echo $user->id ?>">
                                                <i class="tio-edit"></i> Edit
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($_SESSION['level'] == 0) : ?>
                                            <a class="btn btn-sm btn-soft-danger" href="<?php echo SITE_URL ?>index.php?controller=trainingStaff&action=delete&id=<?php echo $user->id ?>">
                                                <i class="tio-delete-outlined"></i> Delete
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif;  ?>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->

    <?php require_once __DIR__ . "/../Layout/footer.php" ?>