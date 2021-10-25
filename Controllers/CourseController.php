<?php
class CourseController
{
    public function index()
    {
        // Gọi tới model
        $courseModel = new CourseModel();

        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];

            $course = $courseModel->fetchSearch($keyword);
        } else {
            // Gọi hàm
            $course = $courseModel->fetchAll();
        }

        // Trả về view
        include_once "Views/Course/index.php";
    }

    public function create()
    {
        $courseCategoryModel = new CourseCategoryModel();

        $courseCategories = $courseCategoryModel->fetchAll();

        include_once "Views/Course/create.php";
    }


    // lưu data khi thêm mới
    public function store()
    {
        $courseModel = new CourseModel();

        $data = [];

        $data[] = postInput('course_category_id');
        $data[] = postInput('course_name');
        $data[] = postInput('description');
        $data[] = postInput('end_date');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $error = [];

            if (postInput('course_category_id') == '') {
                $_SESSION['error_course_category_id'] = $error['course_category_id'] = " Please choose a class name ";

                $domain =  SITE_URL . "index.php?controller=course&action=create";
                header("Location: $domain");
                exit;
            }

            if (postInput('course_name') == '') {
                $_SESSION['error_course_name'] = $error['course_name'] = " Please enter the course name ";

                $domain =  SITE_URL . "index.php?controller=course&action=create";
                header("Location: $domain");
                exit;
            } 
            else {
                $is_check = $courseModel->fetchCheck($data['course_name']);
                if ($is_check != NULL) {
                    $_SESSION['error_course_name'] = $error['course_name'] = " This course name already exists ! ";

                    $domain =  SITE_URL . "index.php?controller=course&action=create";
                    header("Location: $domain");
                    exit;
                }
            }

            if (postInput('description') == '') {
                $_SESSION['error_course_description'] = $error['description'] = " Please enter a description of the course ";

                $domain =  SITE_URL . "index.php?controller=course&action=create";
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $courseModel->fetchStore($data);

                if ($courseModel) {
                    $_SESSION['success'] = " Successfully added new ";

                    $domain =  SITE_URL . "index.php?controller=course&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Add new failure ";

                    $domain =  SITE_URL . "index.php?controller=course&action=create";
                    header("Location: $domain");
                    exit;
                }
            }
        }
    }

    public function detail()
    {
        $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

        $courseModel = new CourseModel();

        $data = $courseModel->fetchOne($id);

        include_once "Views/Course/detail.php";
    }

    public function edit()
    {
        $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
        // khởi tạo model
        $courseModel = new CourseModel();
        // lấy data từ model
        $course = $courseModel->fetchEdit($id);

        $courseCategoryModel = new CourseCategoryModel();

        $courseCategories = $courseCategoryModel->fetchAll();

        include_once "Views/Course/edit.php";
    }


    public function update()
    {
        $courseModel = new CourseModel();

        $data = [];

        $data['course_category_id'] = postInput('course_category_id');
        $data['course_name'] = postInput('course_name');
        $data['description'] = postInput('description');
        $data['end_date'] = postInput('end_date');
        $data['id'] = postInput('id');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $error = [];

            if (postInput('course_category_id') == '') {
                $_SESSION['error_course_category_id'] = $error['course_category_id'] = " Please choose a class name ";

                $domain =  SITE_URL . "index.php?controller=course&action=edit";
                header("Location: $domain");
                exit;
            }


            if (postInput('course_name') == '') {
                $_SESSION['error_course_name'] = $error['course_name'] = " Please enter the course name ";

                $domain =  SITE_URL . "index.php?controller=course&action=edit";
                header("Location: $domain");
                exit;
            } 

            if (postInput('description') == '') {
                $_SESSION['error_course_description'] = $error['description'] = " Please enter a description of the course ";

                $domain =  SITE_URL . "index.php?controller=course&action=edit";
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $courseModel->fetchUpdate($data);

                if ($courseModel) {
                    $_SESSION['success'] = " Successfully update ";

                    $domain =  SITE_URL . "index.php?controller=course&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Update failure ";

                    $domain =  SITE_URL . "index.php?controller=course&action=create";
                    header("Location: $domain");
                    exit;
                }
            }
        }
    }

    public function delete()
    {
        $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
        // khởi tạo model
        $courseModel = new CourseModel();

        // lấy data từ model
        $course = $courseModel->fetchDelete($id);

        $_SESSION['success'] = " Record delete successful ";

        $domain =  SITE_URL . "index.php?controller=course&action=index";
        header("Location: $domain");
        exit;
    }

    public function deleteTrainee()
    {
        $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

        $course_id = isset($_GET["course_id"]) ? (int) $_GET["course_id"] : 0;
        // khởi tạo model
        $trainee = new TraineeModel();
        // lấy data từ model
        $user = $trainee->fetchDeleteCourse($id);

        $domain =  SITE_URL . "index.php?controller=course&action=index";
        header("Location: $domain");
        exit;
    }
}
