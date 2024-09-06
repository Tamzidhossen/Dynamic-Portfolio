<?php
require '../db.php';

$_select_about = "SELECT *  FROM abouts";
$_select_about_res = mysqli_query($db_connection, $_select_about);
$_after_assoc_about = mysqli_fetch_assoc($_select_about_res);

$image = $_FILES['image'];
$after_explode = explode('.', $image['name']);
$extension = end($after_explode);
$allowed_extension = array('png');

if(in_array($extension, $allowed_extension)){
    if($image['size'] <= 1000000){
        $delete_form = '../Uploads/About/'.$_after_assoc_about['image'];
        unlink($delete_form);
        
        $file_name = uniqid().'.'.$extension;
        $new_location = '../Uploads/About/'.$file_name;
        move_uploaded_file($image['tmp_name'], $new_location);

        $update = "UPDATE abouts SET image='$file_name'";
        mysqli_query($db_connection,$update);
        $_SESSION['image'] = 'About Image Updated';
        header('location:about.php');
    }else {
        $_SESSION['err'] = 'Image Size Maximum 1MB';
        header('location:about.php');
    }
}else {
    $_SESSION['err'] = 'Only png Format are allowed';
    header('location:about.php');
}

?>