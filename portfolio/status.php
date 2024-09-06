<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT status FROM portfolio WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if($after_assoc['status'] == 0){
    $update = "UPDATE  portfolio SET status=1 WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['status'] = "Portfolio Status Activated";
    header('location:portfolio.php');
}else{
    $update = "UPDATE  portfolio SET status=0 WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['status'] = "Portfolio Status Deactivated";
    header('location:portfolio.php');
}
?>