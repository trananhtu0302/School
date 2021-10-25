<?php
class Router {
    public function run() {
        // khai báo 1 controller mặc định
        $defaultController = "base";

        // khai báo 1 method mặc định sẽ được chạy trong controller
        $defaultAction = "index";

        // $_REQUEST = $_POST + $_GET
        $controller = isset($_REQUEST["controller"]) && ($_REQUEST["controller"]) ? $_REQUEST["controller"] : $defaultController;
        $action = isset($_REQUEST["action"]) && ($_REQUEST["action"]) ? $_REQUEST["action"] : $defaultAction;

        // users => UsersController
        // books => BooksController

        // xử lý tên controller đang muốn gọi
        // biến chữ cái đàu thành chữ viết hoa
        $controller = ucfirst($controller);
        // nối thêm chuỗi Controller cho giống tên file và tên class
        $controller = $controller . "Controller";

        // viết thủ công
        // $controllerObject = new UsersController();
        // $controllerObject->index();

        // viết theo kiểu linh hoạt
        $controllerObject = new $controller();
        $controllerObject->$action();

        // url liệt kê các bản ghi trong user
        
        // url trang đăng nhập
        // http://localhost/mvc/index.php?controller=account&action=index

        
        // các url bên dưới bỏ
        // url thêm mới 1 user
        // http://localhost/t3h.12.2020/UsersManageProjectMVC/index.php?controller=users&action=create

        // url sửa 1 user
        // http://localhost/t3h.12.2020/UsersManageProjectMVC/index.php?controller=users&action=edit&id=1234

        // xóa 1 user
        // http://localhost/t3h.12.2020/UsersManageProjectMVC/index.php?controller=users&action=delete&id=1234
    }
}
