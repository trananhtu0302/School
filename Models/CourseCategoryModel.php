<?php

class CourseCategoryModel extends Database
{

    protected $table = "course_categorys";

    // Lấy ra tất cả các bản ghi
    public function fetchAll()
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
    public function fetchStore(array $data)
    {
        $sqlInsert = "INSERT INTO $this->table ( `category_name`, `category_description`) 
                        VALUES ( ?, ?)";

        $stmtInsert = $this->conn->prepare($sqlInsert);

        $resultInsert = $stmtInsert->execute($data);

        // kết quả thực thi câu sql insert
        return $resultInsert;
    }

    // tìm kiếm
    public function fetchSearch($name)
    {
        $sql = " SELECT * FROM $this->table WHERE category_name LIKE '%$name%' ORDER BY id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

        $courseCategory = $stmt->fetchAll();

        return $courseCategory;
    }

    public function fetchCheck($name)
    {
        $sql = "SELECT * FROM $this->table WHERE category_name = ? LIMIT 1";

        $stmtCourseCategory = $this->conn->prepare($sql);

        $stmtCourseCategory->execute([$name]);

        $result = $stmtCourseCategory->setFetchMode(PDO::FETCH_OBJ);

        $name = $stmtCourseCategory->fetchObject();

        return $name;
    }

    // detail
    public function fetchOne($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ? LIMIT 1";

        $stmtCourseCategory = $this->conn->prepare($sql);

        $stmtCourseCategory->execute([$id]);

        $result = $stmtCourseCategory->setFetchMode(PDO::FETCH_OBJ);

        $courseCategory = $stmtCourseCategory->fetchObject();

        return $courseCategory;
    }

    //update
    public function fetchUpdate(array $data)
    {
        $dataBindSql = [];
        
        // sql update
        $sqlUpdate = "UPDATE $this->table SET";

        // update name
        if (isset($data["subjects_name"])) {
            $sqlUpdate .= "`category_name` = ?";
            $dataBindSql[] = $data["subjects_name"];
        }

        // update 
        if (isset($data["description"])) {
            $sqlUpdate .= ",`category_description` = ?";
            $dataBindSql[] = $data["description"];
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
}
