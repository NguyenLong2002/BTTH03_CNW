
<?php
class DBConnection
{
    private $conn = null;

    public function __construct()
    {
        try {
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $this->conn = new PDO('mysql:host=localhost;dbname=btth3;port=3306', 'root', '', $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
