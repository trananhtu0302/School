<?php
class CourseCategoryController
{
    public function index()
    {
        // Gọi tới model
        $courseCategoryModel = new CourseCategoryModel();

        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];

            $courseCategories = $courseCategoryModel->fetchSearch($keyword);
        } else {
            // Gọi hàm
            $courseCategories = $courseCategoryModel->fetchAll();
        }

        // Trả về view
        include_once "Views/CourseCategory/index.php";
    }

    public function create()
    {
        include_once "Views/CourseCategory/create.php";
    }

    // lưu data khi thêm mới
    public function store()
    {
        $courseCategoryModel = new CourseCategoryModel();

        $data = [];

        $data[] = postInput('subjects_name');
        $data[] = postInput('description');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $error = [];

            if (postInput('subjects_name') == '') {
                $_SESSION['error_subjects_name'] = $error['subjects_name'] = " Please enter the subject name ";

                $domain =  SITE_URL . "index.php?controller=courseCategory&action=create";
                header("Location: $domain");
                exit;
            } else {
                $is_check = $courseCategoryModel->fetchCheck($data['subjects_name']);
                if ($is_check != NULL) {
                    $_SESSION['error_subjects_name'] = $error['subjects_name'] = " This course name already exists ! ";

                    $domain =  SITE_URL . "index.php?controller=courseCategory&action=create";
                    header("Location: $domain");
                    exit;
                }
            }

            if (postInput('description') == '') {
                $_SESSION['error_subjects_description'] = $error['description'] = " Please enter a description of the course ";

                $domain =  SITE_URL . "index.php?controller=courseCategory&action=create";
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $courseCategoryModel->fetchStore($data);

                if ($courseCategoryModel) {
                    $_SESSION['success'] = " Successfully added new ";

                    $domain =  SITE_URL . "index.php?controller=courseCategory&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Add new failure ";

                    $domain =  SITE_URL . "index.php?controller=courseCategory&action=index";
                    header("Location: $domain");
                    exit;
                }
            }
        }
    }

    public function edit()
    {
        $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
        // khởi tạo model
        $courseCategoryModel = new CourseCategoryModel();
        // lấy data từ model
        $courseCategory = $courseCategoryModel->fetchOne($id);

        include_once "Views/CourseCategory/edit.php";
    }

    public function update()
    {
        $courseCategoryModel = new CourseCategoryModel();

        $data = [];

        $data['subjects_name'] = postInput('subjects_name');
        $data['description'] = postInput('description');
        $data['id'] = postInput('id');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $error = [];

            if (postInput('subjects_name') == '') {
                $_SESSION['error_subjects_name'] = $error['subjects_name'] = " Please enter the subject name ";

                $domain =  SITE_URL . "index.php?controller=courseCategory&action=edit";
                header("Location: $domain");
                exit;
            }

            if (postInput('description') == '') {
                $_SESSION['error_subjects_description'] = $error['description'] = " Please enter a description of the course ";

                $domain =  SITE_URL . "index.php?controller=courseCategory&action=create";
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $courseCategoryModel->fetchUpdate($data);

                if ($courseCategoryModel) {
                    $_SESSION['success'] = " Update successful ";

                    $domain =  SITE_URL . "index.php?controller=courseCategory&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Update failed ";

                    $domain =  SITE_URL . "index.php?controller=courseCategory&action=index";
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
        $courseCategoryModel = new CourseCategoryModel();

        // lấy data từ model
        $courseCategory = $courseCategoryModel->fetchDelete($id);

        $_SESSION['success'] = " Record delete successful ";

        $domain =  SITE_URL . "index.php?controller=courseCategory&action=index";
        header("Location: $domain");
        exit;
    }
}
