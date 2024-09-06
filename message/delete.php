<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM messages WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['del'] = 'Message Deleted';
header('location:message.php');
?>