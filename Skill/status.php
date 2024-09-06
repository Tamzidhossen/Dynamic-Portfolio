<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT status FROM skills WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if($after_assoc['status'] == 0){
    $update = "UPDATE  skills SET status=1 WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['status'] = "SKill Status Activated";
    header('location:skill.php');
}else{
    $update = "UPDATE  skills SET status=0 WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['status'] = "SKill Status Deactivated";
    header('location:skill.php');
}
?>