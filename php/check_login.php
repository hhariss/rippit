<?php
    $index = "../index.php";
    session_start();

    if (isset($_SESSION['username'])) {
        header('Location: '.$index);
        die();
    }

    $conn = mysqli_connect("localhost", "group6", "beadyshown", "group6");
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $query = "SELECT U.username FROM Users U WHERE U.username=? AND U.pwd=? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);

  
    mysqli_stmt_bind_param($stmt, "ss", $usrname, $pwd);

    $usrname = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_ADD_SLASHES);
    $pwd = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ADD_SLASHES);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        echo 'gone';
    }
    else {
        $_SESSION['username'] = mysqli_fetch_assoc($result)[username];
        header('Location: '.$index);
        die();
    }
?>