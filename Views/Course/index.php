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
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo SITE_URL ?>index.php?controller=course&action=index">Course</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Course</h1>
                </div>

                <?php if ($_SESSION['level'] == 1) : ?>
                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="<?php echo SITE_URL ?>index.php?controller=course&action=create">
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
                                <input type="hidden" name="controller" value="course" />
                                <input type="text" class="form-control" placeholder="Search course" name="keyword">
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
                            <th>Course name</th>
                            <th>Subject title</th>
                            <th>Course description</th>
                            <th>End date</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (is_array($course) && !empty($course)) :
                            foreach ($course as $key => $value) :
                        ?>
                                <tr class="text-center">
                                    <td><?php echo $value->id ?></td>
                                    <td class="h5"><?php echo $value->course_name ?></td>
                                    <td class="h5"><?php echo $value->category_name ?></td>
                                    <td><?php echo $value->course_description ?></td>
                                    <td><?php echo $value->end_date ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-soft-primary" href="<?php echo SITE_URL ?>index.php?controller=course&action=detail&id=<?php echo $value->id ?>">
                                            <i class="tio-direction"></i> Detail
                                        </a>
                                        <?php if ($_SESSION['level'] == 1) : ?>
                                            <a class="btn btn-sm btn-soft-info" href="<?php echo SITE_URL ?>index.php?controller=course&action=edit&id=<?php echo $value->id ?>">
                                                <i class="tio-edit"></i> Edit
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($_SESSION['level'] == 1) : ?>
                                            <a class="btn btn-sm btn-soft-danger" href="<?php echo SITE_URL ?>index.php?controller=course&action=delete&id=<?php echo $value->id ?>">
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