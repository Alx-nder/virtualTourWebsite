<?php
    session_start();

    
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'virttour');

    if(!$con)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

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
<form action="base.php" method="post">

  
  <div class="form-group border-bottom">
      <input type="text" name="price" class="form-control bg-transparent  border-0"  placeholder="price">
    </div>
    
    <div class="form-group">
        <button class="btn d-grid gap-2 col-2 mx-auto  btn-danger" type= "submit">search</button>
    </div>
    <?php
    if (isset($_POST['price'])) {
        $records = mysqli_query($con, "select * From listings where price = '$_POST[price]'"); 
        while($data = mysqli_fetch_array($records))
        {
            echo  $data['price'];
            echo '<img src="' . $data['address'] . '"height="42" width="42" alt="error">'; //tour image preview
            echo "<a href=".$data['description'].">tour</a>"; //tour link
        }
    }
    ?>  
</form>
    <a href="logout.php"> logout</a>

    
    <form action="index.php" method="get">
      <input type="text" name="chat" placeholder="Enter message">
      <button type="submit">Send</button>
    </form>
    
        <?php
 $con = mysqli_connect('localhost','root','');
 mysqli_select_db($con, 'virttour');

        if (isset($_GET['chat'])) {
        #  $chattinglink = "http://localhost/virtualtourwebsite/chatbot1/chatbot1.py?". $_GET['chat'];
      
          $chatter=file_get_contents("http://localhost/virtualtourwebsite/chatbot1/chatbot1.py?". urlencode($_GET['chat']));
          echo $chatter;
        }
        ?> 
    <form action="index.php" method="get">
      <input type="text" name="rcmd" placeholder="try this" disabled>
      <button type="submit">Send</button>
    </form>
    <?php
      $rec=file_get_contents("http://localhost/recommendAlgo/epsilon1.py?");
      echo $rec;
        
      $records = mysqli_query($con, "select * From listings where price = $rec"); 
      while($data = mysqli_fetch_array($records))
      {
        echo  $data['price'];
        echo $data['address'];
        //echo '<img src="' . $data['address'] . '"height="42" width="42" alt="error">'; //tour image preview
        //echo "<a href=".$data['description'].">tour</a>"; //tour link
      }
        if (isset($_GET['rcmd'])) {
        #  $chattinglink = "http://localhost/virtualtourwebsite/chatbot1/chatbot1.py?". $_GET['chat'];
       
          $rec1=1;
          echo $rec1;
        }
        ?> 


</body>
</html>

