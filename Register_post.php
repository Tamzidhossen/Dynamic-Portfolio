<!-- Register_post.php -->


<?php 
session_start();

require 'db.php';

$_name= $_POST['name'];
$_email= $_POST['email'];
$_password= $_POST['password'];
$_after_hash = password_hash($_password, PASSWORD_DEFAULT);
$_conpassword= $_POST['confirm_password'];
$_countrynam= $_POST['country'];
$_gender= $_POST['gender'];
// $_about= $_POST['about'];


$_upper = preg_match('@[A-Z]@', $_password);
$_lower = preg_match('@[a-z]@', $_password);
$_number = preg_match('@[0-9]@', $_password);
$_spaCh = preg_match('@[#,%,$,^,*]@', $_password);

$flag = false;

if(empty($_name))
{
    $flag = true;
    $_SESSION['nam_err'] = 'Please Enter Your Name';
}else{
    $_SESSION['name'] = $_name;
}
if(empty($_email))
{
    $flag = true;
    $_SESSION['email_err'] = 'Please Enter Your Email';
}
else{
    if(!filter_var($_email, FILTER_VALIDATE_EMAIL)){
        $flag = true;
        $_SESSION['email_err'] = 'Please Enter Your Email';
        $_SESSION['email'] = $_email;
    }
    else {
        $_SESSION['email'] = $_email;
    }
}
if(empty($_password))
{
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter Your Password';
}
else{
    if(!$_upper || !$_lower || !$_number || !$_spaCh || strlen($_password) < 8)
    {
        $flag = true;
       $_SESSION['pass_err'] = 'Password contains uppercase, lowercase, number, spcial and min 8 charectar';
    }
}
if(empty($_conpassword))
{
    $flag = true;
    $_SESSION['conpass_err'] = 'Please Enter Confirm Password';
}else{
    if($_password != $_conpassword){
        $flag = true;
        $_SESSION['conpass_err'] = 'Password and Confirm Password does not match';
    }
}
if(empty($_countrynam))
{
    $flag = true;
    $_SESSION['country_err'] = 'Please Select Your Country';
}else{
    $_SESSION['country'] = $_countrynam;
}
if(empty($_gender))
{
    $flag = true;
    $_SESSION['gender_err'] = 'Please Select Your Gender';
}else{
    $_SESSION['gender'] = $_gender;
}
// if(empty($_about))
// {
//     $flag = true;
//     $_SESSION['about_err'] = 'Please write About Your Self';
// }else{
//     $_SESSION['about'] = $_about;
// }

if($flag){
    header('location:Registation.php');
}

else{
    $insert = "INSERT INTO users(name, email, password, country, gender)VALUES('$_name', '$_email', '$_after_hash','$_countrynam', '$_gender')";
    mysqli_query($db_connection, $insert);

    $_SESSION['success'] = 'User Registration successfull!';
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['gender']);
    unset($_SESSION['country']);

    header('location:users/Users.php');
}
?>