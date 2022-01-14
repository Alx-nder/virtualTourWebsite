<?php
    session_start();

    
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'virtUsers');

    if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    }
    
    $query=("SELECT * FROM users");
    $result= mysqli_query($con, $query);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> welcome</p>

    <a href="logout.php"> click here to shub out</a>

</body>
</html>