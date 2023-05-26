<?php
include 'lib/helper.php';

if (!isset($_COOKIE['AUTH'])) {
    include 'inc/auth.php';
} else {
    include 'inc/header.php';
    if (isset($_GET['p'])) {
        if ($_GET['p'] == 'home') {
            $page = 'index';
        } else {
            $page = $_GET['p'];
        }
    } else {
        $page = 'index';
    }
    if($page && $page != '') {
        include 'inc/'.$page.'.php';
    } else {
        include 'inc/index.php';
    }
    include 'inc/footer.php';
}