<?php
class TraineeController
{
    public function index()
    {
        // Gọi tới model
        $traineeModel = new TraineeModel();

        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];

            $users = $traineeModel->fetchSearch($keyword);
        } else {
            // Gọi hàm
            $users = $traineeModel->fetchAll();

            $ids = array_column($users, 'id');
            $ids = array_unique($ids);
            $users = array_filter($users, function ($key, $value) use ($ids) {
                return in_array($value, array_keys($ids));
            }, ARRAY_FILTER_USE_BOTH);
        }

        include_once "Views/Trainee/index.php";
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
                $trainee = new TraineeModel();

                // gửi và nhận lại dữ liệu trả về từ database
                $is_check = $trainee->login($data['email'], $data['password']);

                if (is_object($is_check) && $is_check->id > 0) {
                    $_SESSION['admin_email'] = $is_check->trainee_email;
                    $_SESSION['admin_id'] = $is_check->id;
                    $_SESSION['level'] = 3;

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
        include_once "Views/Trainee/create.php";
    }

    // lưu data khi thêm mới
    public function store()
    {
        $trainee = new TraineeModel();

        $data = [];

        $data[] = postInput('name');
        $data[] = postInput('email');
        $data[] = md5(postInput('password'));
        $data[] = postInput('sexRadio');
        $data[] = postInput('phone');
        $data[] = postInput('age');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $error = [];

            if (postInput('name') == '') {
                $_SESSION['error_name'] = $error['name'] = " Please enter your full first and last name ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=create";
                header("Location: $domain");
                exit;
            }

            if (postInput('email') == '') {
                $_SESSION['error_email'] = $error['email'] = " Please enter your email ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=create";
                header("Location: $domain");
                exit;
            } else {
                $is_check = $trainee->fetchEmail(postInput('email'));
                if ($is_check != NULL) {
                    $_SESSION['error_email'] = $error['email'] = " Email address already exists ! ";

                    $domain =  SITE_URL . "index.php?controller=trainee&action=create";
                    header("Location: $domain");
                    exit;
                }
            }

            if (postInput('phone') == '') {
                $_SESSION['error_phone'] = $error['phone'] = " Please enter your phone number ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=create";
                header("Location: $domain");
                exit;
            }

            if (postInput('age') == '') {
                $_SESSION['error_age'] = $error['age'] = " Please enter your age ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=create";
                header("Location: $domain");
                exit;
            }

            if (postInput('password') == '') {
                $_SESSION['error_password'] = $error['password'] = " Please enter your password ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=create";
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $trainee->fetchStore($data);

                if ($trainee) {
                    $_SESSION['success'] = " Successfully added new ";

                    $domain =  SITE_URL . "index.php?controller=trainee&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Add new failure ";

                    $domain =  SITE_URL . "index.php?controller=trainee&action=index";
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
        $trainee = new TraineeModel();
        // lấy data từ model
        $user = $trainee->fetchOne($id);

        $courseModel = new CourseModel();

        $course = $courseModel->fetchAll();

        include_once "Views/Trainee/edit.php";
    }

    public function update()
    {
        $trainee = new TraineeModel();

        $data = [];

        $data['name'] = postInput('name');
        $data['email'] = postInput('email');
        $data['password'] = md5(postInput('password'));
        $data['sexRadio'] = postInput('sexRadio');
        $data['phone'] = postInput('phone');
        $data['age'] = postInput('age');
        $data['course_id'] = postInput('course_id');
        $data['id'] = postInput('id');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $error = [];

            if (postInput('name') == '') {
                $_SESSION['error_name'] = $error['name'] = " Please enter your full first and last name ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('email') == '') {
                $_SESSION['error_email'] = $error['email'] = " Please enter your email ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('phone') == '') {
                $_SESSION['error_phone'] = $error['phone'] = " Please enter your phone number ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('age') == '') {
                $_SESSION['error_age'] = $error['age'] = " Please enter your age ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('password') == '') {
                $_SESSION['error_password'] = $error['password'] = " Please enter your password ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('course_id') == '') {
                $_SESSION['error_course_id'] = $error['course_id'] = " Please choose a class name ";

                $domain =  SITE_URL . "index.php?controller=trainee&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $trainee->fetchUpdate($data);

                if ($trainee) {
                    $_SESSION['success'] = " Successfully Update ";

                    $domain =  SITE_URL . "index.php?controller=trainee&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Update failure ";

                    $domain =  SITE_URL . "index.php?controller=trainee&action=index";
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
        $trainee = new TraineeModel();
        // lấy data từ model
        $user = $trainee->fetchDelete($id);

        $_SESSION['success'] = " Record delete successful ";

        $domain =  SITE_URL . "index.php?controller=trainee&action=index";
        header("Location: $domain");
        exit;
    }
}
