<?php

session_start();


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'virttour');

//$fname=$_POST['fname'];
//$lname=$_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['password'];

$check = "select * from users where email= '$email' && password='$pass'";

$result = mysqli_query($con, $check);

$num = mysqli_num_rows($result);

if($num==1){
    $_SESSION['email']=$email;
    header('location:base.php');
}
else{
    header('location:index.php');
}

?>