<?php
class TrainerModel extends Database
{
    protected $table = "trainer";

    public function login($email, $password)
    {
        $sqlLogin = "SELECT * FROM $this->table WHERE trainer_email = ? AND trainer_password = ? LIMIT 1";

        $stmtLogin = $this->conn->prepare($sqlLogin);

        $stmtLogin->execute([$email, $password]);

        $resultLogin = $stmtLogin->setFetchMode(PDO::FETCH_OBJ);
        // tổng số bản ghi
        $login = $stmtLogin->fetchObject();

        return $login;
    }

    public function fetchCount()
    {
        $sqlSelect = "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($sqlSelect);

        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

        $users = $stmt->fetchAll();

        return $users;
    }

    public function fetchEmail($email)
    {
        $sql = "SELECT * FROM $this->table WHERE trainer_email = ? LIMIT 1";

        $stmtEmail = $this->conn->prepare($sql);

        $stmtEmail->execute([$email]);

        $result = $stmtEmail->setFetchMode(PDO::FETCH_OBJ);

        $email = $stmtEmail->fetchObject();

        return $email;
    }

    // Lấy ra tất cả các bản ghi
    public function fetchAll()
    {
        $sqlSelect = "SELECT $this->table.id, $this->table.course_id, $this->table.trainer_name, $this->table.trainer_email, $this->table.trainer_phone,
                        $this->table.trainer_address, course.course_name
                        FROM $this->table 
                        INNER JOIN course
                        ORDER BY $this->table.id DESC ";

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
    public function fetchStore(array $data)
    {
        $sqlInsert = "INSERT INTO $this->table ( `trainer_name`, `trainer_email`, `trainer_password`, `trainer_phone`, `trainer_address`) 
                        VALUES ( ?, ?, ?, ?, ?)";

        $stmtInsert = $this->conn->prepare($sqlInsert);

        $resultInsert = $stmtInsert->execute($data);

        // kết quả thực thi câu sql insert
        return $resultInsert;
    }

    // tìm kiếm
    public function fetchSearch($name)
    {
        $sql = " SELECT $this->table.id, $this->table.course_id, $this->table.trainer_name, $this->table.trainer_email, $this->table.trainer_phone,
                    $this->table.trainer_address, course.course_name
                    FROM $this->table 
                    INNER JOIN course
                    WHERE $this->table.trainer_name LIKE '%$name%' ORDER BY id DESC";

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
            $sqlUpdate .= "`trainer_name` = ?";
            $dataBindSql[] = $data["name"];
        }

        // update password
        if (isset($data["password"])) {
            $sqlUpdate .= ", `trainer_password` = ?";
            $dataBindSql[] = $data["password"];
        }

        // update email
        if (isset($data["email"])) {
            $sqlUpdate .= ",`trainer_email` = ?";
            $dataBindSql[] = $data["email"];
        }

        // update phone
        if (isset($data["phone"])) {
            $sqlUpdate .= ",`trainer_phone` = ?";
            $dataBindSql[] = $data["phone"];
        }

        // update 
        if (isset($data["address"])) {
            $sqlUpdate .= ",`trainer_address` = ?";
            $dataBindSql[] = $data["address"];
        }

        // update 
        if (isset($data["course_id"])) {
            $sqlUpdate .= ",`course_id` = ?";
            $dataBindSql[] = $data["course_id"];
        }

        // update 
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

    // Update course
    public function fetchDeleteCourse($id)
    {
        $sqlUpdate = "UPDATE $this->table SET course_id = 0 WHERE `id` = ?";

        $stmtDelete = $this->conn->prepare($sqlUpdate);

        $resultDeleteCourse = $stmtDelete->execute([$id]);

        // output
        return $resultDeleteCourse;
    }
}
