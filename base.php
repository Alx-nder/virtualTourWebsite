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
            echo  $data['address'];
            echo  $data['description'];
        }
    }
    ?>  
    <a href="logout.php"> logout</a>
</form>

<form action="base.php" method="get">
      <input type="text" name="chat" placeholder="Enter message">
      <button type="submit">Send</button>
    </form>
    
    <?php
      if (isset($_GET['chat'])) {
        $chatter=file_get_contents("http://localhost/virtualtourwebsite/chatbot1/chatbot1.py?". urlencode($_GET['chat']));
        echo $chatter;
      }
    ?> 
        
    <?php
      $rec_link = "http://localhost/recommendAlgo/epsilon1.py?";
      $rec=file_get_contents($rec_link);
      echo $rec;
        //using selct where or 

      $records = mysqli_query($con, "select * From listings where price = '$rec' "); 
      //fix for json input
        while($data = mysqli_fetch_array($records))
        {
          echo  $data['price'];
          echo $data['add'];
        }
    ?> 
    
<?php
      // $meetlink="http://localhost/virtualtourwebsite/zoomapi/makemeeting.py?";
      // $meet=file_get_contents($meetlink);
      // echo $meet;
?> 

</body>
</html>

