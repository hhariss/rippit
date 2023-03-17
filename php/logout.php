<?php
    session_start();
    $index = "../index.php";
    unset($_SESSION['username']);
    header('Location: '.$index);
    die();
?>