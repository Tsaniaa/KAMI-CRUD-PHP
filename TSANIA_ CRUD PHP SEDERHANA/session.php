<?php
    session_start();

    if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
        header('location: login.php');
        exit();
    }

    $session_id = $_SESSION['id'];

    $sql = "SELECT * FROM user WHERE id='$session_id'";
    $query = mysqli_query($link, $sql);
    $user = mysqli_fetch_array($query);
?>