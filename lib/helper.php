<?php
namespace Helper;

/* TODO
 * Методы добавления, изменения удаления
 * Верстка таблиц
 * Верстка табов
 * Меню
 *
 *
*/
class Auth
{
      public static function checkAuth($login, $password)
      {
          $sessionHash = md5(rand(10000, 99999));
          $passwordHash = md5($password);
          $sql = new DB();
          $checkAuth = DB::select('users', 'LOGIN="'.$login.'" AND PASSWORD_HASH="'.$passwordHash.'"');
          while ($row = $checkAuth->fetch_assoc()) {
              $arr = $row;
          }

          if ($arr['ID'] > 0) {
              $authQuery = 'UPDATE users SET SESSION_TOKEN="'.$sessionHash.'" WHERE ID='.$arr['ID'];
              $auth = $sql->query($authQuery);
              return $sessionHash;
          } else {
              return 'WRONG';
          }
      }
}
Class DB
{
    const DB_NAME = 'u0748065_taskmgr';
    const DB_USER = 'u0748065_taskmgr';
    const DB_PASSWORD = 'tY4nY1vR5icX4d';
    private static $sql;

    /**
     *
     */
    public function __construct()
    {
        self::$sql = mysqli_connect('localhost', self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
        self::$sql->set_charset("utf8");
        if (self::$sql === false) {
            die("Ошибка: " . mysqli_connect_error());
        }
    }

    /**
     * @param $str
     * @return array
     */
    public static function query($str)
    {
        $result = self::$sql->query($str);
        return $result;
    }

    public function insert()
    {

    }

    public function update()
    {

    }

    /**
     * @param $table
     * @param $filter
     * @return array
     */
    public static function select($table, $filter = '')
    {
        if ($filter != '') {
            $where = ' WHERE '.$filter;
        }
        $query = 'SELECT * FROM '.$table.$where;
        $result = self::query($query);
        return $result;
    }

}

class FinTables
{
    private static $table;
    public function __construct($table)
    {
        self::$table = $table;
    }


    /**
     * @param array $arParams
     * @return array
     */
    public static function getTableArray(array $arParams)
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
        $sql = new DB();
        $result = $sql->query($tableQuery);

        return $result;
    }

    /**
     * @param $params
     * @return string
     */
    public static function showTable($params)
    {
        $tableArray = self::getTableArray($params);
        $result = '<table class="table table-bordered table-hover ">';
        $result .= '<tr>
            <th>ID</th>
            <th>Дата</th>
            <th>Сумма</th>
            <th>Категория</th>
            <th>Описание</th>
            <th> </th>
            <th> </th>
        </tr>';
        foreach ($tableArray as $row) {
            $result .= '<tr>';
            $result .= '<td>'.$row['ID'].'</td>';
            $result .= '<td>'.$row['DATE'].'</td>';
            $result .= '<td>'.$row['SUMM'].'</td>';
            $result .= '<td>'.$row['CATEGORY'].'</td>';
            $result .= '<td>'.$row['DESCRIPTION'].'</td>';
            $result .= '<td><span class="material-icons edit-link" onclick="updateElem('.$row['ID'].')">edit</span></td>';
            $result .= '<td><span class="material-icons delete-link" onclick="deleteElem('.$row['ID'].')">delete</span></td>';
            $result .= '</tr>';
        }
        $result .= '</table>';
        return $result;

    }
}

class Options
{
    private $sql;

    /**
     * @param $name
     * @return array
     */
    public static function getOptions($name)
    {
        $optQuery = 'SELECT * FROM options WHERE NAME="'.$name.'"';
        $sql = new DB();
        $result = $sql->query($optQuery);
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
    /**
     * @param $type
     * @return string
     */
    public static function showAddForm($type)
    {
        switch ($type) {
            case 'income':
                $opt = 'INCOME_CATEGORY';
                break;
            case 'outlay':
                $opt = 'OUTLAY_CATEGORY';
                break;
        }
        $options  = Options::getOptions($opt);
        $result = '<div class="fin-form fin-add-form">';
        $result .= '<table>';
        $result .= '<tr>
                        <td>Дата</td>
                        <td><input type="date" id="finAddDate"></td>
                    </tr>';
        $result .= '<tr>
                        <td>Сумма</td>
                        <td><input type="text" id="finAddSumm"></td>
                    </tr>';
        $result .= '<tr>
                        <td>Категория</td>
                        <td><select id="finAddCategory">';
        foreach ($options as $o) {
            $result .= '<option value="'.$o['VALUE'].'">'.$o['DESCRIPTION'].'</option>';
        }
        $result .= '</select></td>
                    </tr>';
        $result .= '<tr>
                        <td>Описание</td>
                        <td><input type="text" id="finAddDescription"></td>
                    </tr>';

        $result .= '</table>';
        $result .= '</div>';

        return $result;
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

class UI
{
    /**
     * Показывает модальное окно
     * @author Fa1qon
     * @param $id ID окна для обработки резкльтатов JS
     * @param $content Контент модального окна
     * @param $title Заголовок
     * @param $buttons Кнопки
     * @return string
     */
    public static function showModal($id, $content, $title, $buttons) {
        $btnContent = '';
        foreach ($buttons as $btnk => $btnv) {
            $btnContent .= '<button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="'.$btnk.'">'.$btnv.'</button>
';
        }
        $result =  '<div class="modal fade" id="'.$id.'" role="dialog" style="display: none;">
                        <div class="modal-dialog modals-default">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                <div class="modal-body">
                                <h2>'.$title.'</h2>
                                    '.$content.'
                                </div>
                                <div class="modal-footer">
                                    '.$btnContent.'
                                </div>
                            </div>
                        </div>
                    </div>';
        return $result;
    }

}

// TODO ДОбавить список кейсов с категориями, тегами и визуальным редактором с подсветкой синтаксиса кода или отступов или Pre в рамочке
// Лучше с бб-кодами и экранированием для нормального хранения в бд

