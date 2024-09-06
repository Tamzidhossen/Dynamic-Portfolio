<?php
session_start();
require '../db.php';

$_role_id = $_POST['role'];
$_user_id = $_POST['user_id'];

$_update = "UPDATE users SET role=$_role_id WHERE id=$_user_id";
mysqli_query($db_connection, $_update);
$_SESSION['role'] = "Role Assigned Success";
header('location:Users.php');
?>