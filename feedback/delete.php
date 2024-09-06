<?php
session_start();
require '../db.php';

$id = $_GET['id'];
$select = "SELECT image FROM feedbacks WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if($after_assoc['image'] != null){
    $delete_from = '../Uploads/feedback/'.$after_assoc['image'];
    unlink($delete_from);
}

$delete = "DELETE FROM feedbacks WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['del'] = 'Feedback Deleted';
header('location:feedback.php');
?>