<?php


class DataBase
{
    private static ?DataBase $instance = null;

    private string $host = "localhost";
    private string $user = "root";
    private string $password = "";
    private string $dbName = "news";
    private mysqli $connect;


    private function __construct()
    {
        $this->connect = new mysqli($this->host, $this->user,
            $this->password, $this->dbName);

        if ($this->connect->connect_error) {
            throw new Exception('Connection failed 
            (' . $this->connect->connect_errno . '): 
            ' . $this->connect->connect_error);
        }

        echo "Connection enabled\n";
    }

    public static function getInstance(): DataBase
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function query(string $sql):mysqli_result
    {
        $result = $this->connect->query($sql);

        if (!$result) {
            throw new Exception('Query failed: ' . $this->connect->error);
        }

        return $result;
    }

    public function prepare(string $sql): mysqli_stmt
    {
        $stmt = $this->connect->prepare($sql);

        if (!$stmt) {
            throw new Exception('Failed to prepare statement: ' . $this->connect->error);
        }

        return $stmt;
    }

    public function close(): void
    {
        $this->connect->close();
    }

    private function __clone()
    {
    }

    public function __destruct()
    {
        $this->close();
    }
}

try {

    $db = DataBase::getInstance();


    $result = $db->query("SELECT * FROM news");

    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

