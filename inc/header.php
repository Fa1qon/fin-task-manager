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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
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

<header class="menu">
    <div class="menu-wrap">
        <img src="logo.png" class="logo-img" alt="Logo">
        <input type="checkbox" id="checkbox">
        <nav>
            <ul>
                <li><a href="?p=outlay">Расходы</a></li>
                <li><a href="?p=income">Доходы</a></li>
                <li><a href="?p=tasks">Задачи</a></li>
                <li><a href="#">Статистика</a></li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">Dropdown
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <label for="checkbox">
            <i class="fa fa-bars menu-icon"></i>
        </label>
    </div>
</header>