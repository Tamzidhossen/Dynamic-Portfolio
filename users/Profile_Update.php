<?php
session_start();
require '../db.php';

$_id = $_SESSION['logged_id'];

$_name = $_POST['name'];
$_email = $_POST['email'];
$_country = $_POST['country'];
$_gender = $_POST['gender'];

$_update = "UPDATE users SET name='$_name', email='$_email', country='$_country', gender='$_gender' WHERE id='$_id'";
mysqli_query($db_connection, $_update);
$_SESSION['success'] = 'Profile Info Updated';
header('location:Profile.php');
?>