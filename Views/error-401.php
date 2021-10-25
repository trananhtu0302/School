<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Error 401</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo assets_css() ?>dashboard\css\vendor.min.css">
    <link rel="stylesheet" href="<?php echo assets_css() ?>dashboard\vendor\icon-set\style.css">



    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo assets_css() ?>dashboard\css\theme.min.css?v=1.0">
</head>

<body class="footer-offset">
    <!-- Content -->
    <div class="content container-fluid">
        <div class="row align-items-sm-center py-sm-10">
            <div class="col-sm-6">
                <div class="text-center text-sm-right mr-sm-4 mb-5 mb-sm-0">
                    <img class="w-60 w-sm-100 mx-auto" src="<?php echo assets_css() ?>dashboard\svg\illustrations\think.svg" alt="Image Description" style="max-width: 15rem;">
                </div>
            </div>

            <div class="col-sm-6 col-md-4 text-center text-sm-left">
                <h1 class="display-1 mb-0">401</h1>
                <p class="lead">Sorry, your account could not be found. Please double check your email and password when logging in!</p>
                <a class="btn btn-primary" href="<?php echo SITE_URL ?>index.php?controller=base&action=index">Go back</a>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->

    <!-- JS Implementing Plugins -->
    <script src="<?php echo assets_css() ?>dashboard\js\vendor.min.js"></script>

    <!-- JS Front -->
    <script src="<?php echo assets_css() ?>dashboard\js\theme.min.js"></script>

    <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./<?php echo assets_css() ?>dashboard/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
</body>

</html>