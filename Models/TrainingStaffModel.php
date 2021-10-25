<?php
class TrainingStaffModel extends Database
{
    protected $table = "training_staff";

    public function fetchLogin($email, $password)
    {
        // Câu lệnh SQL
        $sqlLogin = "SELECT * FROM $this->table WHERE training_staff_email = ? AND training_staff_password = ? LIMIT 1";

        // gọi đến DB và truyền vào câu lệnh SQL
        $stmtLogin = $this->conn->prepare($sqlLogin);

        // truyền tham số vào câu lệnh SQL
        $stmtLogin->execute([$email, $password]);

        $resultLogin = $stmtLogin->setFetchMode(PDO::FETCH_OBJ);
        // tổng số bản ghi
        $login = $stmtLogin->fetchObject();

        // trả về bản ghi
        return $login;
    }

    public function fetchEmail($email)
    {
        $sql = "SELECT * FROM $this->table WHERE training_staff_email = ? LIMIT 1";

        $stmtEmail = $this->conn->prepare($sql);

        $stmtEmail->execute([$email]);

        $result = $stmtEmail->setFetchMode(PDO::FETCH_OBJ);

        $email = $stmtEmail->fetchObject();

        return $email;
    }

    // Lấy ra tất cả các bản ghi
    public function getAll()
    {
        $sqlSelect = "SELECT * FROM $this->table ORDER BY id DESC";

        $stmt = $this->conn->prepare($sqlSelect);

        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

        $users = $stmt->fetchAll();

        return $users;
    }

    // lưu mới 1 bản ghi
    // hàm là tập hợp các câu lệnh để thực hiện 1 chức năng
    // hàm có input và output
    // input là tham số
    // output là return cuối hàm
    public function store(array $data)
    {
        $sqlInsert = "INSERT INTO $this->table ( `training_staff_name`, `training_staff_password`, `training_staff_email`, `training_staff_phone`, `level`) 
                        VALUES ( ?, ?, ?, ?, ?)";

        $stmtInsert = $this->conn->prepare($sqlInsert);

        $resultInsert = $stmtInsert->execute($data);

        // kết quả thực thi câu sql insert
        return $resultInsert;
    }

    // tìm kiếm
    public function search($name)
    {
        $sql = " SELECT * FROM $this->table WHERE training_staff_name LIKE '%$name%' ORDER BY id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

        $users = $stmt->fetchAll();

        return $users;
    }

    // detail
    public function fetchOne($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ? LIMIT 1";

        $stmtUser = $this->conn->prepare($sql);

        $stmtUser->execute([$id]);

        $result = $stmtUser->setFetchMode(PDO::FETCH_OBJ);

        $user = $stmtUser->fetchObject();

        return $user;
    }

    //update
    public function fetchUpdate(array $data)
    {
        $dataBindSql = [];
        
        // sql update
        $sqlUpdate = "UPDATE $this->table SET";

        // update name
        if (isset($data["name"])) {
            $sqlUpdate .= "`training_staff_name` = ?";
            $dataBindSql[] = $data["name"];
        }

        // update password
        if (isset($data["password"])) {
            $sqlUpdate .= ", `training_staff_password` = ?";
            $dataBindSql[] = $data["password"];
        }

        // update email
        if (isset($data["email"])) {
            $sqlUpdate .= ",`training_staff_email` = ?";
            $dataBindSql[] = $data["email"];
        }

        // update phone
        if (isset($data["phone"])) {
            $sqlUpdate .= ",`training_staff_phone` = ?";
            $dataBindSql[] = $data["phone"];
        }

        // update level
        if (isset($data["levelRadio"])) {
            $sqlUpdate .= ",`level` = ?";
            $dataBindSql[] = $data["levelRadio"];
        }

        if (isset($data["id"])) {
            $sqlUpdate .= "WHERE `id` = ?";
            $dataBindSql[] = $data["id"];
        }

        $stmtInsert = $this->conn->prepare($sqlUpdate);
        
        // truyền cho ->execute là 1 mảng chỉ số
        $resultUpdate = $stmtInsert->execute($dataBindSql);

        // output
        return $resultUpdate;
    }

    // Delete
    public function fetchDelete($id)
    {
        $sqlDelete = "DELETE FROM $this->table WHERE `id` = ?";

        $stmtDelete = $this->conn->prepare($sqlDelete);

        $resultDelete = $stmtDelete->execute([$id]);

        // output
        return $resultDelete;
    }
}
