<?php
    session_start();

    
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'virttour');

    if(!isset($_SESSION['email']))
    {
        header('location:login.php');
    } 
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

    <main class="container">
        <form action="base.php" method="post">
                <div class="form-group border-bottom">
                    <input type="text" name="price" class="form-control bg-transparent  border-0"  placeholder="price">
                </div>
                
                <div class="form-group">
                <button class="btn d-grid gap-2 col-2 mx-auto  btn-danger" type= "submit">search</button>            
                </div>
        </form>
        <?php    
        if(isset($_POST['submit'])) {
            $price=$_POST['price']; 
            $search="select * from listings where price= '$price'";
            $result= mysqli_query($con, $search);
            $row = $result->fetch_array();
            echo $row["address"]; 
            echo $row["price"];
            echo $row["description"];
          while($row = mysqli_fetch_array($result))}
            // echo $row['id'], " ", $row['address'], " ", $row['price'], " ", $row['description']; }
            else{
            } 
?>

           
    </main>




    <a href="logout.php"> logout</a>

</body>
</html>