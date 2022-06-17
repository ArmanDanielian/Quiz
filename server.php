<?php

session_start();

$i = 0;
foreach ($_POST as $k => $v) {
    $_POST[$i] = $v;
    unset($_POST[$k]);
    $i++;
}
$_SESSION['data'] = $_POST;
$_SESSION['flag'] = false;
header('location: /Homework_2(quiz)/test.php');