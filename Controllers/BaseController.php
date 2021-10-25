<?php
session_start();
class BaseController
{
    public function index()
    {
        include_once "Views/index.php";
    }

    public function dashboard()
    {
        $trainingStaffModel = new TrainingStaffModel();
        $trainingStaff = $trainingStaffModel->getAll();

        $trainerModel = new TrainerModel();
        $trainer = $trainerModel->fetchCount();

        $traineeModel = new TraineeModel();
        $trainee = $traineeModel->fetchCount();

        $courseModel = new CourseModel();
        $course = $courseModel->fetchAll();

        include_once "Views/dashboard.php";
    }

    public function error_401()
    {
        include_once "Views/error-401.php";
    }

    public function logout()
    {
        // huỷ đăng nhập của tài khoản
        unset($_SESSION['admin_email']);
        unset($_SESSION['admin_id']);
        unset($_SESSION['level']);

        // chuyển về đăng nhập
        $domain =  SITE_URL . "index.php?controller=base&action=index";
        header("Location: $domain");
        exit;
    }
}
