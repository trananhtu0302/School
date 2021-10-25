<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Sign In</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo assets_css() ?>dashboard\css\vendor.min.css">
    <link rel="stylesheet" href="<?php echo assets_css() ?>dashboard\vendor\icon-set\style.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo assets_css() ?>dashboard\css\theme.min.css?v=1.0">
    <link rel="stylesheet" href="<?php echo assets_css() ?>stylelogin.css">

</head>

<body>
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <div class="position-fixed top-0 right-0 left-0 bg-img-hero" style="height: 32rem; background-image: url(<?php echo assets_css() ?>dashboard/svg/components/abstract-bg-4.svg);">
            <!-- SVG Bottom Shape -->
            <figure class="position-absolute right-0 bottom-0 left-0">
                <svg preserveaspectratio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewbox="0 0 1921 273">
                    <polygon fill="#fff" points="0,273 1921,273 1921,0 "></polygon>
                </svg>
            </figure>
            <!-- End SVG Bottom Shape -->
        </div>

        <!-- Content -->
        <div class="container py-5 py-sm-7 mt-5 mb-5">
            <a class="d-flex justify-content-center mb-5 mt-5 mb-5" href="index.html">
                <!-- Logo -->
                <img class="z-index-2" src="<?php echo assets_css() ?>dashboard\img\Logo-FU-01.png" alt="FPT">
            </a>

            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <!-- Card -->
                    <div class="card card-lg mb-5">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="mb-5">
                                    <h1 class="display-4" style="font-weight: bold;">WELCOME TO GREENWICH UNIVERSITY</h1>
                                </div>
                            </div>

                            <!-- Login Training Staff -->
                            <button onclick="document.getElementById('trainingstaff').style.display='block'" class="btn btn-lg btn-block btn-primary">Sign in Manament</button>

                            <div id="trainingstaff" class="modal mt-8">
                                <!-- Form -->
                                <form class="js-validate modal-content animate" action="<?php echo SITE_URL ?>index.php?controller=trainingStaff&action=login" method="POST" style="padding: 20px;">

                                    <span onclick="document.getElementById('trainingstaff').style.display='none'" class="close">&times;</span>

                                    <!-- Form Group -->
                                    <?php include __DIR__ . "/login.php"; ?>
                                    <!-- End Form Group -->

                                    <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in Manament</button>
                                </form>
                                <!-- End Form -->
                            </div>
                            <!-- End Login Training Staff -->

                            <div class="m-5"></div>

                            <!-- Login Trainer -->
                            <button onclick="document.getElementById('trainer').style.display='block'" class="btn btn-lg btn-block btn-primary">Sign in Trainer</button>

                            <div id="trainer" class="modal mt-8">
                                <!-- Form -->
                                <form class="js-validate modal-content animate" action="<?php echo SITE_URL ?>index.php?controller=trainer&action=login" method="POST" style="padding: 20px;">

                                    <span onclick="document.getElementById('trainer').style.display='none'" class="close">&times;</span>

                                    <!-- Form Group -->
                                    <?php include __DIR__ . "/login.php" ?>
                                    <!-- End Form Group -->

                                    <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in Trainer</button>
                                </form>
                                <!-- End Form -->
                            </div>
                            <!-- End Login Trainer -->

                            <div class="m-5"></div>

                            <!-- Login Trainer -->
                            <button onclick="document.getElementById('trainee').style.display='block'" class="btn btn-lg btn-block btn-primary">Sign in Trainee</button>

                            <div id="trainee" class="modal mt-8">
                                <!-- Form -->
                                <form class="js-validate modal-content animate" action="<?php echo SITE_URL ?>index.php?controller=trainee&action=login" method="POST" style="padding: 20px;">

                                    <span onclick="document.getElementById('trainee').style.display='none'" class="close">&times;</span>

                                    <!-- Form Group -->
                                    <?php include __DIR__ . "/login.php"; ?>
                                    <!-- End Form Group -->

                                    <button type="submit" class="btn btn-lg btn-block btn-primary">Sign in Trainer</button>
                                </form>
                                <!-- End Form -->
                            </div>
                            <!-- End Login Trainer -->
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
        </div>
        <!-- End Content -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


    <!-- JS Implementing Plugins -->
    <script src="<?php echo assets_css() ?>dashboard\js\vendor.min.js"></script>

    <!-- JS Front -->
    <script src="<?php echo assets_css() ?>dashboard\js\theme.min.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF SHOW PASSWORD
            // =======================================================
            $('.js-toggle-password').each(function() {
                new HSTogglePassword(this).init()
            });


            // INITIALIZATION OF FORM VALIDATION
            // =======================================================
            $('.js-validate').each(function() {
                $.HSCore.components.HSValidation.init($(this));
            });
        });


        // Get the modal
        var trainingstaff = document.getElementById('trainingstaff');
        var trainer = document.getElementById('trainer');
        var trainee = document.getElementById('trainee');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == trainingstaff) {
                modal.style.display = "none";
            }

            if (event.target == trainer) {
                modal.style.display = "none";
            }

            if (event.target == trainee) {
                modal.style.display = "none";
            }
        };
    </script>

    <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?php echo assets_css() ?>dashboard/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>