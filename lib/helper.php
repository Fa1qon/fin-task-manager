<?php
namespace Helper;

define('DB_NAME', 'u0748065_taskmgr');
define('DB_USER', 'u0748065_taskmgr');
define('DB_PASSWORD', 'tY4nY1vR5icX4d');

class Tables
{

    private static $table;
    public function __construct($table)
    {
        self::$table = $table;
        self::$sql = mysqli_connect('localhost', DB_USER, DB_PASSWORD, DB_NAME);
        if (self::$sql === false) {
            die("Ошибка: " . mysqli_connect_error());
        }
    }

    public function showFullTable()
    {
        require_once 'lib/db.php';
        $tableQuery = 'SELECT * FROM '.self::$table;

        if($tableRes = self::$sql->query($tableQuery)){
            while($row = $tableRes->fetch_assoc()){
                $result[] = $row;
            }
        }
        return $result;
    }
}