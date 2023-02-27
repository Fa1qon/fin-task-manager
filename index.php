<?php
$page = $_GET['p'];
include 'lib/db.php';

if (!$_COOKIE['AUTH']) {
    include 'inc/auth.php';
} else {
    //$passwordHash = $_COOKIE['AUTH'];
    include 'inc/header.php';

    if($page && $page != '') {
        include 'inc/'.$page.'.php';
    } else {
        include 'inc/index.php';
    }
    include 'inc/footer.php';
}