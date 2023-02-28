<?php
namespace Helper;

define('DB_NAME', 'u0748065_taskmgr');
define('DB_USER', 'u0748065_taskmgr');
define('DB_PASSWORD', 'tY4nY1vR5icX4d');

class FinTables
{

    private static $table;
    private static $sql;
    public function __construct($table)
    {
        self::$table = $table;
        self::$sql = mysqli_connect('localhost', DB_USER, DB_PASSWORD, DB_NAME);
        self::$sql->set_charset("utf8");
        if (self::$sql === false) {
            die("Ошибка: " . mysqli_connect_error());
        }
    }

    public function getTableArray(array $arParams)
    {
        if (empty($arParams)) {
            $strParams = '';
        } else {
            $strParams = ' WHERE ';
            foreach ($arParams as $k => $v) {
                if ($k[0] == '>' || $k[0] == '<' || $k[0] == '=') {
                    $sep = $k[0];
                } else {
                    $sep = '=';
                }
                $strParams .= $k . $sep . '"'.$v.'" AND ';
                $strParams = substr($strParams,0,-5);
            }
        }
        $tableQuery = 'SELECT * FROM '.self::$table.$strParams;
        if($tableRes = self::$sql->query($tableQuery)){
            while($row = $tableRes->fetch_assoc()){
                $result[] = $row;
            }
        }
        return $result;
    }

    public function showTable($params)
    {
        $tableArray = self::getTableArray($params);
        $result = '<table border=1>';
        $result .= '<tr>
            <th>ID</th>
            <th>Дата</th>
            <th>Сумма</th>
            <th>Категория</th>
            <th>Описание</th>
        </tr>';
        foreach ($tableArray as $row) {
            $result .= '<tr>';
            $result .= '<td>'.$row['ID'].'</td>';
            $result .= '<td>'.$row['DATE'].'</td>';
            $result .= '<td>'.$row['SUMM'].'</td>';
            $result .= '<td>'.$row['CATEGORY'].'</td>';
            $result .= '<td>'.$row['DESCRIPTION'].'</td>';
            $result .= '</tr>';
        }
        $result .= '</table>';
        return $result;

    }
}

class Options
{
    private static $sql;
    public function __construct($table)
    {
        self::$sql = mysqli_connect('localhost', DB_USER, DB_PASSWORD, DB_NAME);
        self::$sql->set_charset("utf8");
        if (self::$sql === false) {
            die("Ошибка: " . mysqli_connect_error());
        }
    }

    public function getOptions($name)
    {
        $optQuery = 'SELECT * FROM options WHERE NAME="'.$name.'"';
        if($optRes = self::$sql->query($optQuery)){
            while($row = $optRes->fetch_assoc()){
                $result[] = $row;
            }
        }
        return $result;

    }

    public function showOptionsTable($name)
    {

    }

    public function addOption($params)
    {

    }

    public function updateOption($id, $params)
    {

    }

    public function deleteOption($id)
    {

    }

    public function showOptionAddForm($name)
    {

    }

    public function showOptionUpdateForm($id)
    {

    }
}

class FinForms
{
    public function showAddForm($type)
    {

    }

    public function showUpdateForm($type, $id)
    {

    }

    public function showDeleteForm($type, $id)
    {

    }

    public function add($type, $params = array())
    {

    }

    public function update($type, $id, $params = array())
    {

    }

    public function delete($type, $id)
    {

    }
}