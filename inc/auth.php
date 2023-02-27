<?php
//include 'lib/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['login'] && $_POST['password']) {
    $sessionHash = md5(rand(10000, 99999));
    $passwordHash = md5($_POST['password']);
    $checkAuthQuery = 'SELECT * FROM users WHERE LOGIN="'.$_POST['login'].'" AND PASSWORD_HASH="'.$passwordHash.'"';
    $checkAuth = $sql->query($checkAuthQuery);
    if($checkAuth = $sql->query($checkAuthQuery)){
        while($row = $checkAuth->fetch_assoc()){
            $arr = $row;
        }
    }
    if ($arr['ID'] > 0) {
        $authQuery = 'UPDATE users SET SESSION_TOKEN="'.$sessionHash.'" WHERE ID='.$arr['ID'];
        $auth = $sql->query($authQuery);
        setcookie("AUTH", $sessionHash, time()+28800);
        header('Location: /apps/manager/');
    } else {
        header('Location: /apps/manager/?p=wrong');
    }
} else { ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title>Authorization</title>
    </head>
    <body>
    <?php
        if ($_GET['p'] == 'wrong')
            echo '<p class="wrongAuthMessage">Неправильное имя пользователя или пароль</p>';
    ?>
    <form action="#" method="post">
        <p>Login: <input type="text" name="login"></p>
        <p>Password: <input type="password" name="password"></p>
        <input type="submit" value="Auth">
    </form>
    </body>
    </html>
<?php } ?>
