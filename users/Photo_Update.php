<?php
session_start();
require '../db.php';

$_user_id = $_POST['user_id'];
$_select = "SELECT * FROM users WHERE id=$_user_id";
$_select_res = mysqli_query($db_connection, $_select);
$_after_asoc = mysqli_fetch_assoc($_select_res);

$_photo = $_FILES['photo'];

$_after_explode = explode('.', $_photo['name']);
$_extension = end($_after_explode);
$_allowed_extension = array('png', 'jpg');

if(in_array($_extension, $_allowed_extension)){
    if($_photo['size'] <= 2000000){
        if($_after_asoc['photo'] != null){
            $_delete_from = '../Uploads/users/'. $_after_asoc['photo'];
            unlink($_delete_from);
        }
        
        $_file_name = uniqid() . '.' .$_extension;
        $_new_location = '../Uploads/users/'.$_file_name;
        move_uploaded_file($_photo['tmp_name'], $_new_location);

        $_update = "UPDATE users SET photo='$_file_name' WHERE id=$_user_id";
        mysqli_query($db_connection, $_update);
        $_SESSION['photo_update'] = 'Profile Photo Updated';
        header('location:Profile.php');
    }else{
        $_SESSION['err'] = 'Image Size Max 2 MB';
        header('location:Profile.php');
    }
}else{
    $_SESSION['err'] = 'Only PNG OR JPG Format Are Allowed';
    header('location:Profile.php');
}