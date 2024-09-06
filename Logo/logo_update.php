<?php
session_start();
require '../db.php';

$_select_logo = "SELECT *  FROM logos";
$_select_logo_res = mysqli_query($db_connection, $_select_logo);
$_after_assoc_logo = mysqli_fetch_assoc($_select_logo_res);

$header_logo = $_FILES['header_logo'];
$footer_logo = $_FILES['footer_logo'];
$flag = false;

if($header_logo['name'] != ''){
    $after_explode = explode('.', $header_logo['name']);
    $extension = end($after_explode);
    $allowed_extension = array('png');
    if(in_array($extension, $allowed_extension)){
        if($header_logo['size'] <= 1000000){
            $delete_form = '../Uploads/logo/'.$_after_assoc_logo['header_logo'];
            unlink($delete_form);
            
            $file_name = uniqid().'.'.$extension;
            $new_location = '../Uploads/logo/'.$file_name;
            move_uploaded_file($header_logo['tmp_name'], $new_location);

            $update = "UPDATE logos SET header_logo='$file_name'";
            mysqli_query($db_connection,$update);
            $flag = true;
        }else {
            $_SESSION['err'] = 'Size Maximum 1MB';
            header('location:logo.php');
        }
    }else {
        $_SESSION['err'] = 'Only png Format are allowed';
        header('location:logo.php');
    }
}

if($footer_logo['name'] != ''){
    $after_explode = explode('.', $footer_logo['name']);
    $extension = end($after_explode);
    $allowed_extension = array('png');
    if(in_array($extension, $allowed_extension)){
        if($footer_logo['size'] <= 1000000){
            $delete_form = '../Uploads/logo/'.$_after_assoc_logo['footer_logo'];
            unlink($delete_form);
            
            $file_name = uniqid().'.'.$extension;
            $new_location = '../Uploads/logo/'.$file_name;
            move_uploaded_file($footer_logo['tmp_name'], $new_location);

            $update = "UPDATE logos SET footer_logo='$file_name'";
            mysqli_query($db_connection,$update);
            $flag = true;
        }else {
            $_SESSION['err'] = 'Size Maximum 1MB';
            header('location:logo.php');
        }
    }else {
        $_SESSION['err'] = 'Only png Format are allowed';
        header('location:logo.php');
    }
}

if($flag){
    $_SESSION['logo'] = 'Logo Updated';
    header('location:logo.php');
}
?>