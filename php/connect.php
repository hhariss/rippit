<?php
    $servername = "localhost";
    $username = "group6";
    $password = "beadyshown";
    $dbname = "group6";

    $conn = mysqli_connect("localhost", "group6admin","SucceedChange","group6");
    if (mysqli_connect_errno()){
        die("<script>alert('Connection_Failed');</script>");
        }
?>