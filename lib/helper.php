<?php
namespace Helper;

class Tables
{
    private static $table;
    public function __construct($table)
    {
        self::$table = $table;
    }

    public function showFullTable()
    {
        require_once 'lib/db.php';
        $tableQuery = 'SELECT * FROM '.self::$table;

        if($tableRes = $sql->query($tableQuery)){
            while($row = $tableRes->fetch_assoc()){
                $result[] = $row;
            }
        }
        return $result;
    }
}