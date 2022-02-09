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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
  
<div class="card-group" id="csec">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>

    <a id="nexrec" href="#">next</a>
       
<form action="base.php" method="post">
  <div >
      <input type="text" name="price"   placeholder="price">
    </div>
    
    <div class="form-group">
        <button class="btn mx-auto  btn-danger" type= "submit">search</button>
    </div>
    <?php
    if (isset($_POST['price'])) {
        $records = mysqli_query($con, "select * From listings where price =" .$_POST['price']); 
        while($data = mysqli_fetch_array($records))
        {
            echo  $data['price'];
            echo  $data['add'];
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
      // $rec_link = "http://localhost/recommendAlgo/epsilon1.py?";
      // $rec=file_get_contents($rec_link);
      // echo $rec;
      //   //using selct where or 

      // $records = mysqli_query($con, "select * From listings where price = '$rec' "); 
      // //fix for json input
      //   while($data = mysqli_fetch_array($records))
      //   {
      //     echo  $data['price'];
      //     echo $data['add'];
      //   }
    ?> 
   
    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>

