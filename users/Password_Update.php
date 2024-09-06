<?php
session_start();
require '../db.php';

$_user_id = $_POST['user_id'];
$_select = "SELECT * FROM users WHERE id=$_user_id";
$_select_res = mysqli_query($db_connection, $_select);
$_after_assoc =  mysqli_fetch_assoc($_select_res);

$_current_password = $_POST['current_password'];
$_password = $_POST['password'];
$_after_hash = password_hash($_password, PASSWORD_DEFAULT);
$_confirm_password = $_POST['confirm_password'];

$_flag = false;

if(empty($_current_password)){
    $_flag = true;
    $_SESSION['curnpass_err'] = 'Please Enter Current Password';
} else {
    if(!password_verify($_current_password, $_after_assoc['password'])) {
        $_flag = true;
        $_SESSION['curnpass_err'] = 'Please Enter Correct Current Password';
    }
}

if(empty($_password)){
    $_flag = true;
    $_SESSION['pass_err'] = 'Please Enter New Password'; 
}
if(empty($_confirm_password)){
    $_flag = true;
    $_SESSION['conpass_err'] = 'Please Enter Confirm Password'; 
} else{
    if($_password != $_confirm_password){
        $_flag = true;
    $_SESSION['conpass_err'] = 'Password and Confirm Password Does Not Match'; 
    }
}

if($_flag){
    header('location:Profile.php');
}else{
    $_update = "UPDATE users  SET password='$_after_hash' WHERE id=$_user_id";
    mysqli_query($db_connection, $_update);
    $_SESSION['pass_update'] = 'Password Has Changed';
    header('location:Profile.php');
}

?>