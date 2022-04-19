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
        $_SESSION['email']='guest';
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" media="all">
    <link href="https://css.gg/css?=|dollar|pin|spinner|search" rel="stylesheet">

  </head> 

<body  class="movingGradient" >
    <!-- navbar -->
    <nav class="navbar pt-3 navbar-expand-lg navbar-light ">
      <div class="container-fluid">
        <a href="http://localhost/virtualTourWebsite/web/index/listings.php"><img class="mx-3" srcset="http://localhost/virtualTourWebsite/web/images/logo.png 3x" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse justify-content-center navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav  mb-2 justify-content-center mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Buy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/virtualTourWebsite/web/seller\sell.php">Sell</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/virtualTourWebsite/web\metaverse\metaverse.php">METAverse</a>
            </li>
            <li>
              <a class="nav-link" id="logout" href="http://localhost/virtualTourWebsite/validations/logout.php">Logout</a>
            </li>
          </ul> 
     
        </div>
      </div>
    </nav>

    <div class=" row container min-vh-100 pt-4">
      <div class="col-5 pt-5">
        <div class="text-dark pt-5 px-4 ">
        <!-- fs-1 -->
          <h1>Like it.   Tour it.   Secure it. </h1> 
          <p class="mt-4 me-4"> Welcome to virttour. All listings posted here are currently for sale. Here you can even enter a virtual tour. Scroll down or search to get started.</p>
          <form action="" method="get" class="list-group pt-3 me-5 rounded-0 list-group-horizontal border-bottom">
            <i class="gg-search mx-1 mt-2" type="submit" id="search_submit"></i>
            <input type="text" name="search_field" class="form-control border-0  bg-transparent" placeholder="Search by location" id="search">             
          </form>
        </div>
      </div>

        <div class="col-4">
            <video autoplay muted  loop poster="https://images.unsplash.com/photo-1488707872600-5507977fe355?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80">
            <source type="video/mp4" src="http://localhost/virtualTourWebsite/web/images/housetourvideo.mp4">
            <!-- pic credit https://images.unsplash.com/photo-1488707872600-5507977fe355?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80 -->
            <!-- vid credit https://www.youtube.com/watch?v=An0SK0n7Xeo -->
            </video>
      </div>
    </div>

  <h5 class="card-title" id="user_id" ><?php echo $_SESSION['email'];?></h5>
            
  <div id="search_results" style="display:none">
    <h3 class="text-center">Search results</h3>
    <?php
      echo"        <div class='card h-100 bg-light'><img src='https://images.unsplash.com/photo-1599427303058-f04cbcf4756f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=871&amp;q=80' class='list_img my_img rounded my-2 mx-2' style='max-width:100%; height:auto; object-fit:contain;' alt='http://localhost/krpano-1.20.11/viewer/krpano.html?xml=examples/interactive-area/interactive-area.xml'><div class='card-body'><h5 class='card-title'>lucea</h5><h5 class='card-title'>997000</h5><p class='card-text fs-6'>Total acres of land: 0.7<br>Total acres of living space: 0.5<br>No. of Bedrooms: 2<br>No. of Bathrooms: 1.5<br>Built/renovated: 8 years ago</p></div><div class='card-footer'><small class='text-muted'>Contact: info.virttour@gmail.com</small></div></div>";
    if (isset($_GET['search_field'])){
      $house_location=$_GET["search_field"];
      $sql = "SELECT * FROM listings where house_location='$house_location'";
      $result = $result = mysqli_query($con, $sql);

      // Associative array
      
      while($row = $result -> fetch_assoc()){
        printf ("%s (%s)\n", $row["price"], $row["bedrooms"]);
      
      }
      // Free result set
      $result -> free_result();
    }
    ?>
  </div>
  <!-- chatbot -->
  <div class="px-4 my-3" style="position: fixed; right: 0; bottom: 0; z-index: 1030; ">
  <div class="rounded " style="background-color:#ffffffd0">
      <div class="rounded py-3" id="response_area" style="background-color:#ffffffd0">
        <p class="px-2 text-start"  style="background-color:#ffffffd0" >Hi! <?php echo $_SESSION['email'];?></p>
      </div>
        <div class="" id="chat_controls">
        <ul class="list-group list-group-horizontal">  
        <input id="user_chat" type="text" name="chat" class="form-control border-0 bg-light" placeholder="Enter message">
          <button class="send  btn-primary">Send</button>
          </ul>
        </div>
    </div>
      <img id="chat_trigger" class="float-end" srcset="http://localhost/virtualTourWebsite/web\images\chatbot.png 9x" style="cursor: pointer;" alt="">
  </div>

  <!-- main section -->
  <main class="mt-1">
    <div id="for_rec" class="container">
      <div class=" row row-cols-1 row-cols-md-3 g-4" id="csec"></div>
    </div>
  </main>

  <!-- scroll to top button and loading-->
  <div class="text-center py-3">
    <i id="loader_image" class="gg-spinner"></i>
    <br>
    <i id="page_top" class="fas fa-plus fa-2x" style="display: none;"></i>
  </div>
  
  <!-- The Modal -->
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <embed class="modal-content" id="for_tour" src="" type="">
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script  type = "text/javascript" src="recommend.js"></script>
  <script src="http://localhost/virtualTourWebsite/chatbot_module/chatbot.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"crossorigin="anonymous"></script>

</body>
</html>

