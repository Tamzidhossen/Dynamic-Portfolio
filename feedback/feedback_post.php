<?php
session_start();
require '../db.php';

$name = $_POST['name'];
$designation = $_POST['designation'];
$feedback = $_POST['feedback'];
$image = $_FILES['image'];

if($image['name'] == ''){
    $insert = "INSERT INTO feedbacks(name, designation, feedback)VALUES('$name', '$designation', '$feedback')";
    mysqli_query($db_connection, $insert);
    $_SESSION['feedback'] = "Feedback Sent Successfully";
    header('location:../index.php#feedback');
}else{
    $explode = explode('.', $image['name']);
    $extension = end($explode);
    $allowed = array('jpg', 'png');
    if(in_array($extension, $allowed)){
        if($image['size'] <= 1000000){
            $file_name = uniqid().'.'.$extension;
            $new_location  = '../Uploads/feedback/'.$file_name;
            move_uploaded_file($image['tmp_name'], $new_location);
            $insert = "INSERT INTO feedbacks(name, designation, feedback, image)VALUES('$name', '$designation', '$feedback', '$file_name')";
            mysqli_query($db_connection, $insert);
            $_SESSION['feedback'] = "Feedback Sent Successfully";
            header('location:../index.php#feedback');
        }else{
            $_SESSION['err'] = "Image Size Max 1MB";
            header('location:../index.php#feedback');
        }
    }else{
        $_SESSION['err'] = "Only Jpg and Png are allowed";
        header('location:../index.php#feedback');
    }
}
?>