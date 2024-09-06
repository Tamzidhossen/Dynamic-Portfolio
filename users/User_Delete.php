<?php
session_start();
require '../db.php';

$_id = $_GET['id'];

$_delete = "DELETE FROM users WHERE id=$_id";
mysqli_query($db_connection, $_delete);

$_SESSION['success'] = "User Deleted Successfully";
header('location:Users.php');