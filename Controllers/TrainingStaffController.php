<?php
// session_start();
class TrainingStaffController
{
    public function index()
    {
        // Gọi tới model
        $trainingStaffModel = new TrainingStaffModel();

        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];

            $users = $trainingStaffModel->search($keyword);
        } else {
            // Gọi hàm
            $users = $trainingStaffModel->getAll();
        }

        // Trả về view
        include_once "Views/TrainingStaff/index.php";
    }

    public function login()
    {
        $data = [
            'email'    => postInput("email"),
            'password' => md5(postInput("password"))
        ];

        $error = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // check dữ liệu người dùng nhập vào
            if ($data['email'] == '') {
                $error['email'] = " Email cannot be blank ! ";
            }

            // check dữ liệu người dùng nhập vào
            if ($data['password'] == '') {
                $error['password'] = " Password can not be blank ! ";
            }

            if (empty($error)) {
                $training = new TrainingStaffModel();

                // gửi và nhận lại dữ liệu trả về từ database
                $is_check = $training->fetchLogin($data['email'], $data['password']);

                if (is_object($is_check) && $is_check->id > 0) {

                    $_SESSION['admin_name'] = $is_check->training_staff_name;
                    $_SESSION['admin_email'] = $is_check->training_staff_email;
                    $_SESSION['admin_id'] = $is_check->id;
                    $_SESSION['level'] = $is_check->level;

                    // trả về trang tổng 
                    $domain =  SITE_URL . "index.php?controller=base&action=dashboard";
                    header("Location: $domain");
                    exit;
                } else {
                    $domain =  SITE_URL . "index.php?controller=base&action=error_401";
                    header("Location: $domain");
                    exit;
                }
            }
        }
    }

    public function create()
    {
        include_once "Views/TrainingStaff/create.php";
    }

    // lưu data khi thêm mới
    public function store()
    {
        $trainingStaffModel = new TrainingStaffModel();

        $data = [];

        $data[] = postInput('name');
        $data[] = md5(postInput('password'));
        $data[] = postInput('email');
        $data[] = postInput('phone');
        $data[] = postInput('levelRadio');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $error = [];

            if (postInput('name') == '') {
                $_SESSION['error_name'] = $error['name'] = " Please enter your full first and last name ";

                $domain =  SITE_URL . "index.php?controller=trainingStaff&action=create";
                header("Location: $domain");
                exit;
            }

            if (postInput('email') == '') {
                $_SESSION['error_email'] = $error['email'] = " Please enter your email ";

                $domain =  SITE_URL . "index.php?controller=trainingStaff&action=create";
                header("Location: $domain");
                exit;
            } else {
                $is_check = $trainingStaffModel->fetchEmail(postInput('email'));
                if ($is_check != NULL) {
                    $_SESSION['error_email'] = $error['email'] = " Email address already exists ! ";

                    $domain =  SITE_URL . "index.php?controller=trainingStaff&action=create";
                    header("Location: $domain");
                    exit;
                }
            }

            if (postInput('phone') == '') {
                $_SESSION['error_phone'] = $error['phone'] = " Please enter your phone number ";

                $domain =  SITE_URL . "index.php?controller=trainingStaff&action=create";
                header("Location: $domain");
                exit;
            }

            if (postInput('password') == '') {
                $_SESSION['error_password'] = $error['password'] = " Please enter your password ";

                $domain =  SITE_URL . "index.php?controller=trainingStaff&action=create";
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $trainingStaffModel->store($data);

                if ($trainingStaffModel) {
                    $_SESSION['success'] = " Successfully added new ";

                    $domain =  SITE_URL . "index.php?controller=trainingStaff&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Add new failure ";

                    $domain =  SITE_URL . "index.php?controller=trainingStaff&action=index";
                    header("Location: $domain");
                    exit;
                }
            }
        }
    }

    public function detail()
    {
        $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

        $trainingStaffModel = new TrainingStaffModel();

        $user = $trainingStaffModel->fetchOne($id);

        include_once "Views/TrainingStaff/detail.php";
    }

    public function edit()
    {
        $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
        // khởi tạo model
        $trainingStaffModel = new TrainingStaffModel();
        // lấy data từ model
        $user = $trainingStaffModel->fetchOne($id);

        include_once "Views/TrainingStaff/edit.php";
    }

    public function update()
    {
        $trainingStaffModel = new TrainingStaffModel();

        $data = [];

        $data['name'] = postInput('name');
        $data['password'] = md5(postInput('password'));
        $data['email'] = postInput('email');
        $data['phone'] = postInput('phone');
        $data['levelRadio'] = postInput('levelRadio');
        $data['id'] = postInput('id');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $error = [];

            if (postInput('name') == '') {
                $_SESSION['error_name'] = $error['name'] = " Please enter your full first and last name ";

                $domain =  SITE_URL . "index.php?controller=trainingStaff&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('email') == '') {
                $_SESSION['error_email'] = $error['email'] = " Please enter your email ";

                $domain =  SITE_URL . "index.php?controller=trainingStaff&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('phone') == '') {
                $_SESSION['error_phone'] = $error['phone'] = " Please enter your phone number ";

                $domain =  SITE_URL . "index.php?controller=trainingStaff&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('password') == '') {
                $_SESSION['error_password'] = $error['password'] = " Please enter your password ";

                $domain =  SITE_URL . "index.php?controller=trainingStaff&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $trainingStaffModel->fetchUpdate($data);

                if ($trainingStaffModel) {
                    $_SESSION['success'] = " Update successful ";

                    $domain =  SITE_URL . "index.php?controller=trainingStaff&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Update failed ";

                    $domain =  SITE_URL . "index.php?controller=trainingStaff&action=index";
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
        $trainingStaffModel = new TrainingStaffModel();
        // lấy data từ model
        $user = $trainingStaffModel->fetchDelete($id);

        $_SESSION['success'] = " Record delete successful ";

        $domain =  SITE_URL . "index.php?controller=trainingStaff&action=index";
        header("Location: $domain");
        exit;
    }
}
