<?php

class CourseModel extends Database
{

    protected $table = "course";

    // Lấy ra tất cả các bản ghi
    public function fetchAll()
    {
        $sqlSelect = "SELECT $this->table.id, $this->table.course_categorys_id, $this->table.course_name, $this->table.course_description, $this->table.end_date,
                        course_categorys.category_name, course_categorys.category_description
                        FROM $this->table 
                        INNER JOIN course_categorys ON $this->table.course_categorys_id = course_categorys.id
                        ORDER BY $this->table.id DESC";

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
        $sqlInsert = "INSERT INTO $this->table ( `course_categorys_id`, `course_name`, `course_description`, `end_date`) 
                        VALUES ( ?, ?, ?, ?)";

        $stmtInsert = $this->conn->prepare($sqlInsert);

        $resultInsert = $stmtInsert->execute($data);

        // kết quả thực thi câu sql insert
        return $resultInsert;
    }

    public function fetchCheck($name)
    {
        $sql = "SELECT * FROM $this->table WHERE course_name = ? LIMIT 1";

        $stmtCourseCategory = $this->conn->prepare($sql);

        $stmtCourseCategory->execute([$name]);

        $result = $stmtCourseCategory->setFetchMode(PDO::FETCH_OBJ);

        $name = $stmtCourseCategory->fetchObject();

        return $name;
    }

    // tìm kiếm
    public function fetchSearch($name)
    {
        $sql = "SELECT $this->table.id, $this->table.course_categorys_id, $this->table.course_name, $this->table.course_description, $this->table.end_date,
                course_categorys.category_name, course_categorys.category_description
                FROM $this->table 
                INNER JOIN course_categorys ON $this->table.course_categorys_id = course_categorys.id
                WHERE $this->table.course_name LIKE '%$name%'
                ORDER BY $this->table.id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

        $users = $stmt->fetchAll();

        return $users;
    }

    // detail
    public function fetchOne($id)
    {
        $sqlCourse = "SELECT * FROM $this->table WHERE id = ? LIMIT 1";
        $stmtCourse = $this->conn->prepare($sqlCourse);
        $stmtCourse->execute([$id]);
        $result = $stmtCourse->setFetchMode(PDO::FETCH_OBJ);
        $course = $stmtCourse->fetchObject();

        $sqlTrainer = "SELECT * FROM trainer WHERE course_id = ? ";
        $stmtTrainer = $this->conn->prepare($sqlTrainer);
        $stmtTrainer->execute([$id]);
        $result1 = $stmtTrainer->setFetchMode(PDO::FETCH_OBJ);
        $trainer = $stmtTrainer->fetchObject();

        $sqlTrainee = "SELECT * FROM trainee WHERE course_id = ? ORDER BY id DESC";
        $stmtTrainee = $this->conn->prepare($sqlTrainee);
        $stmtTrainee->execute([$id]);
        $result2 = $stmtTrainee->setFetchMode(PDO::FETCH_OBJ);
        $trainee = $stmtTrainee->fetchAll();

        $sqlCourse_categorys = "SELECT * FROM $this->table INNER JOIN course_categorys ON $this->table.course_categorys_id = course_categorys.id WHERE $this->table.id = ?";
        $stmtCourse_categorys = $this->conn->prepare($sqlCourse_categorys);
        $stmtCourse_categorys->execute([$id]);
        $result3 = $stmtCourse_categorys->setFetchMode(PDO::FETCH_OBJ);
        $course_categorys = $stmtCourse_categorys->fetchObject();

        $data = [ "course" => $course, "trainer" => $trainer, "trainee" => $trainee, "course_categorys" => $course_categorys];

        return $data;
    }

    // one edit
    public function fetchEdit($id)
    {
        $sqlCourse = "SELECT $this->table.id, $this->table.course_categorys_id, $this->table.course_name, $this->table.course_description, $this->table.end_date,
                        course_categorys.category_name
                        FROM $this->table 
                        INNER JOIN course_categorys ON $this->table.course_categorys_id = course_categorys.id WHERE $this->table.id = ? LIMIT 1";
        
        $stmtCourse = $this->conn->prepare($sqlCourse);

        $stmtCourse->execute([$id]);

        $result = $stmtCourse->setFetchMode(PDO::FETCH_OBJ);

        $course = $stmtCourse->fetchObject();

        return $course;
    }

    //update
    public function fetchUpdate(array $data)
    {
        $dataBindSql = [];
        
        // sql update
        $sqlUpdate = "UPDATE $this->table SET";

        // update name
        if (isset($data["course_category_id"])) {
            $sqlUpdate .= "`course_categorys_id` = ?";
            $dataBindSql[] = $data["course_category_id"];
        }

        // update name
        if (isset($data["course_name"])) {
            $sqlUpdate .= ",`course_name` = ?";
            $dataBindSql[] = $data["course_name"];
        }

        // update 
        if (isset($data["description"])) {
            $sqlUpdate .= ",`course_description` = ?";
            $dataBindSql[] = $data["description"];
        }

        // update 
        if (isset($data["end_date"])) {
            $sqlUpdate .= ",`end_date` = ?";
            $dataBindSql[] = $data["end_date"];
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


        $sqlUpdateTrainer = "UPDATE trainer SET course_id = 0 WHERE course_id = ? ";
        $stmtUpdateTrainer = $this->conn->prepare($sqlUpdateTrainer);
        $resultUpdateTrainer = $stmtUpdateTrainer->execute([$id]);

        $sqlUpdateTrainee = "UPDATE trainee SET course_id = 0 WHERE course_id = ? ";
        $stmtUpdateTrainee = $this->conn->prepare($sqlUpdateTrainee);
        $resultUpdateTrainee = $stmtUpdateTrainee->execute([$id]);

        // output
        return $resultDelete;
    }
}
