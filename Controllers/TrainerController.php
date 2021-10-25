<?php
class TrainerController
{
    public function index()
    {
        // Gọi tới model
        $trainerModel = new TrainerModel();

        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];

            $users = $trainerModel->fetchSearch($keyword);
        } else {
            // Gọi hàm
            $users = $trainerModel->fetchAll();

            $ids = array_column($users, 'id');
            $ids = array_unique($ids);
            $users = array_filter($users, function ($key, $value) use ($ids) {
                return in_array($value, array_keys($ids));
            }, ARRAY_FILTER_USE_BOTH);
        }

        include_once "Views/Trainer/index.php";
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
                $error['email'] = " Email không được để trống ! ";
            }

            // check dữ liệu người dùng nhập vào
            if ($data['password'] == '') {
                $error['password'] = " Mật khẩu không được để trống ! ";
            }

            if (empty($error)) {
                $trainer = new TrainerModel();

                // gửi và nhận lại dữ liệu trả về từ database
                $is_check = $trainer->login($data['email'], $data['password']);

                if (is_object($is_check) && $is_check->id > 0) {
                    $_SESSION['admin_email'] = $is_check->trainer_email;
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
        include_once "Views/Trainer/create.php";
    }

    // lưu data khi thêm mới
    public function store()
    {
        $trainer = new TrainerModel();

        $data = [];

        $data[] = postInput('name');
        $data[] = postInput('email');
        $data[] = md5(postInput('password'));
        $data[] = postInput('phone');
        $data[] = postInput('address');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $error = [];

            if (postInput('name') == '') {
                $_SESSION['error_name'] = $error['name'] = " Please enter your full first and last name ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=create";
                header("Location: $domain");
                exit;
            }

            if (postInput('email') == '') {
                $_SESSION['error_email'] = $error['email'] = " Please enter your email ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=create";
                header("Location: $domain");
                exit;
            } else {
                $is_check = $trainer->fetchEmail(postInput('email'));
                if ($is_check != NULL) {
                    $_SESSION['error_email'] = $error['email'] = " Email address already exists ! ";

                    $domain =  SITE_URL . "index.php?controller=trainer&action=create";
                    header("Location: $domain");
                    exit;
                }
            }

            if (postInput('phone') == '') {
                $_SESSION['error_phone'] = $error['phone'] = " Please enter your phone number ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=create";
                header("Location: $domain");
                exit;
            }

            if (postInput('address') == '') {
                $_SESSION['error_address'] = $error['address'] = " Please enter your address ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=create";
                header("Location: $domain");
                exit;
            }

            if (postInput('password') == '') {
                $_SESSION['error_password'] = $error['password'] = " Please enter your password ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=create";
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $trainer->fetchStore($data);

                if ($trainer) {
                    $_SESSION['success'] = " Successfully added new ";

                    $domain =  SITE_URL . "index.php?controller=trainer&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Add new failure ";

                    $domain =  SITE_URL . "index.php?controller=trainer&action=index";
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
        $trainer = new TrainerModel();

        // lấy data từ model
        $user = $trainer->fetchOne($id);

        $courseModel = new CourseModel();

        $course = $courseModel->fetchAll();

        include_once "Views/Trainer/edit.php";
    }

    public function update()
    {
        $trainer = new TrainerModel();

        $data = [];

        $data['name'] = postInput('name');
        $data['email'] = postInput('email');
        $data['password'] = md5(postInput('password'));
        $data['phone'] = postInput('phone');
        $data['address'] = postInput('address');
        $data['course_id'] = postInput('course_id');
        $data['id'] = postInput('id');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $error = [];

            if (postInput('name') == '') {
                $_SESSION['error_name'] = $error['name'] = " Please enter your full first and last name ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('email') == '') {
                $_SESSION['error_email'] = $error['email'] = " Please enter your email ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('phone') == '') {
                $_SESSION['error_phone'] = $error['phone'] = " Please enter your phone number ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('address') == '') {
                $_SESSION['error_address'] = $error['address'] = " Please enter your address ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            if (postInput('password') == '') {
                $_SESSION['error_password'] = $error['password'] = " Please enter your password ";

                $domain =  SITE_URL . "index.php?controller=trainer&action=edit&id=".$data['id'];
                header("Location: $domain");
                exit;
            }

            //error trống có nghĩa ko có lỗi
            if (empty($error)) {

                $trainer->fetchUpdate($data);

                if ($trainer) {
                    $_SESSION['success'] = " Successfully Update ";

                    $domain =  SITE_URL . "index.php?controller=trainer&action=index";
                    header("Location: $domain");
                    exit;
                } else {
                    $_SESSION['error'] = " Update failure ";

                    $domain =  SITE_URL . "index.php?controller=trainer&action=index";
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
        $trainer = new TrainerModel();
        // lấy data từ model
        $user = $trainer->fetchDelete($id);

        $_SESSION['success'] = " Record delete successful ";

        $domain =  SITE_URL . "index.php?controller=trainer&action=index";
        header("Location: $domain");
        exit;
    }
}
