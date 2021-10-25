<?php 

    /**
    * 
    */
    class Database
    {
        /**
         * Khai báo biến kết nối
         * @var [type]
         */
        public $conn;

        const DATABASE_SERVER = "localhost";

        const DATABASE_USER = "root";

        const DATABASE_PASSWORD = "";

        const DATABASE_NAME = "school_management";

        public function __construct()
        {
            /**
             * !$this->conn
             * Khi chưa có kết nối đến CSDL
             */
            if (!$this->conn) {

                // viết theo hàm để kết nối đến CSDL
                /*$this->connection = mysqli_connect(self::DATABASE_SERVER, self::DATABASE_USER,
                    self::DATABASE_PASSWORD, self::DATABASE_NAME);*/

                // Hướng PDO
                try {
                    // truy cập đến const trong class self::Tên_Hằng_Số
                    $serverName = self::DATABASE_SERVER;
                    $databaseName = self::DATABASE_NAME;
                    $username = self::DATABASE_USER;
                    $password = self::DATABASE_PASSWORD;

                    $this->conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);
                    // set the PDO error mode to exception
                    // đặt chế độ lỗi cho ngoại lệ khi kết nối PDO
                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                } catch (PDOException $e) {
                    echo $e->getMessage();
                    exit();
                }
            }
        }
    }