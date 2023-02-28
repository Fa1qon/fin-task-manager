<?
define('DB_NAME', 'u0748065_taskmgr');
define('DB_USER', 'u0748065_taskmgr');
define('DB_PASSWORD', 'tY4nY1vR5icX4d');

$sql = mysqli_connect('localhost', DB_USER, DB_PASSWORD, DB_NAME);
if ($sql === false) {
    die("Ошибка: " . mysqli_connect_error());
}
//echo "Подключение успешно установлено";
//mysqli_close($sql);