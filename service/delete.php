<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM service WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['delete'] = "service Deleted Successfully";
header('location:service.php');
?>