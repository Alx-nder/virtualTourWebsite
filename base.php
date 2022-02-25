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
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="listings.css">
    
</head>
<body>
  <div id="for_rec" class="container">
    <div class=" row row-cols-1 row-cols-md-3 g-4" id="csec">
      <div class="col">
        <div class="card h-100">
          <img src="https://images.pexels.com/photos/3958954/pexels-photo-3958954.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="https://images.pexels.com/photos/3958954/pexels-photo-3958954.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>    
      <div class="col">
        <div class="card h-100">
          <img src="https://images.pexels.com/photos/3958954/pexels-photo-3958954.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
    </div>
  </div>
    <a href=""> next</a>
<h1 id="nexrec" >next</h1>

<!-- The Modal -->

    <!-- search form -->

<!-- <form action="base.php" method="post">
  <div >
      <input type="text" name="price"   placeholder="price">
    </div>

    <div class="form-group">
        <button class="btn mx-auto  btn-danger" type= "submit">search</button>
    </div> -->
<!-- search fuction -->
<?php
    if (isset($_POST['price'])) {
        $records = mysqli_query($con, "select * From listings where price =" .$_POST['price']); 
        while($data = mysqli_fetch_array($records))
        {
            echo  $data['price'];
            echo  $data['location'];
            echo  $data['description'];
        }
    }
    ?>  
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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script  type = "text/javascript" src="reccomend.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    
</body>
</html>

