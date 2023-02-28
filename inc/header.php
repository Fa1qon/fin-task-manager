<?php
$checkAuthQuery = 'SELECT * FROM users WHERE SESSION_TOKEN="'.$_COOKIE['AUTH'].'"';
$checkAuth = $sql->query($checkAuthQuery);
if($checkAuth = $sql->query($checkAuthQuery)){
    while($row = $checkAuth->fetch_assoc()){
        $arr = $row;
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
<pre>
    <?
        print_r($_COOKIE['AUTH']);
        print_r($arr);
    ?>
</pre>
<p><a href="?p=outlay">Расходы</a></p>
<p><a href="?p=income">Доходы</a></p>
<p><a href="?p=tasks">Задачи</a></p>
