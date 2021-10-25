<?php
// no mvc giống là ngôi nhà có rất nhiều cửa ra vào
// mvc thì có 1 cửa chính để ra vào duy nhất
// index.php là file đầu vào của ứng dụng
// mọi tác vụ thêm sửa xóa đăng nhập đăng ký đều chạy file index.php ngoài cùng

// câu lệnh nạp file
// include , require , include_once , require_once 4 câu lệnh nạp file vào file khác

// khai báo hằng số url của ứng dụng
// tên miền của ứng dụng này
define("SITE_URL", "http://localhost/school/");
// nên nạp đầu tiên
include_once "models/Database.php";

// nạp Function
include_once "models/Function.php";

// nạp các controller vào trong index.php
include_once "controllers/BaseController.php";
include_once "controllers/TrainingStaffController.php";
include_once "controllers/TrainerController.php";
include_once "controllers/TraineeController.php";
include_once "controllers/CourseCategoryController.php";
include_once "controllers/CourseController.php";

// nạp các model
include_once "models/TrainingStaffModel.php";
include_once "models/TrainerModel.php";
include_once "models/TraineeModel.php";
include_once "models/CourseCategoryModel.php";
include_once "models/CourseModel.php";

// nạp router.php
include_once "router.php";

$router = new Router();
$router->run();