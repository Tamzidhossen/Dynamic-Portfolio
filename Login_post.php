<?php

session_start();
require 'db.php';

$_email = $_POST['email'];
$_password = $_POST['password'];

$_flag = false;

if(empty($_email)){
    $_flag = true;
    $_SESSION['email'] = 'Please Enter Email Address';
}else{
    $_select = "SELECT COUNT(*) as total FROM users WHERE email='$_email'";
    $_select_res = mysqli_query($db_connection, $_select);
    $_after_assoc = mysqli_fetch_assoc($_select_res);
    if($_after_assoc['total'] != 1){
        $_flag = true;
        $_SESSION['email'] = "Email Does Not Exist";
    }
}
if(empty($_password)){
    $_flag = true;
    $_SESSION['pass'] = 'Please Enter Password';
}else{
    $_select = "SELECT * FROM users WHERE email='$_email'";
    $_select_res = mysqli_query($db_connection, $_select);
    $_after_assoc = mysqli_fetch_assoc($_select_res);
    if(!password_verify($_password, $_after_assoc['password'])){
        $_flag = true;
        $_SESSION['pass'] = 'Wrong Password';
    }else{
        $_SESSION['user_login'] = 'Yes Login';
        $_SESSION['logged_id'] = $_after_assoc['id'];
        header('location:Dashboard.php');
    }
}

if($_flag){
    header('location:Login.php');
}

?>