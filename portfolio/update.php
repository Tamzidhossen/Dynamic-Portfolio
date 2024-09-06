<?php
session_start();
require '../db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$image = $_FILES['image'];

$select = "SELECT image FROM portfolio WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if($image['name'] != ''){
    $after_explode = explode('.', $image['name']);
    $extension = end($after_explode);
    $allowed_extn = array('jpg', 'png');
    if(in_array($extension, $allowed_extn)){
        if($image['size'] <= 1000000){
            $delete_from = '../Uploads/portfolio/'.$after_assoc['image'];
            unlink($delete_from);
            $file_name = uniqid().'.'.$extension;
            $new_location = '../Uploads/portfolio/'.$file_name;
            move_uploaded_file($image['tmp_name'], $new_location);

            $insert = "UPDATE portfolio SET title='$title', category='$category', image='$file_name' WHERE id=$id";
            mysqli_query($db_connection, $insert);
            $_SESSION['success'] = "Portfolio Update Successfully";
            header('location:portfolio.php');
        }else{
            $_SESSION['err'] = "Image size max 1MB";
            header('location:edit.php?id'.$id);
        }
    }else{
        $_SESSION['err'] = "Only PNG & JPG format are allowed";
        header('location:edit.php?id='.$id);
    }
}

?>