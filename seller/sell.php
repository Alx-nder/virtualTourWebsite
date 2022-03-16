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
        header('location:/virtualTourWebsite/login.php');
    } 
?>

<!DOCTYPE html>
<html lang="en"  >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="http://localhost/virtualTourWebsite/listings.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" media="all">
  </head>
<body style="background-color: #7f9497!important;" class="container-fluid text-dark">
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
      <a class="navbar-brand h3" href="http://localhost/virtualTourWebsite/logout.php">VtZ</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse justify-content-center navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav  mb-2 justify-content-center mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/virtualTourWebsite/base.php">Buy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link "  href="http://localhost/virtualTourWebsite/decentralandAPI/metaverse.php"  >METAverse</a>
          </li>
        </ul>      
      </div>
    </div>
  </nav>
  

  <!-- chatbot -->
    <input type="text" name="chat" placeholder="Enter message">
    <button class="send">Send</button>
    <button class="mic">mic</button>

  
  <!-- main section -->
  <main class="mt-4">
    <div class="container">
        <div class="navbar bg-transparent navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid pb-2 justify-content-center">
                <div class="fs-5" >
                <ul class="navbar-nav">
                    <li class="nav-item px-3">
                    <a class="nav-link active" aria-current="page" id="user_profile">Profile</a>
                    </li>
                    <li class="nav-item px-3">
                    <a class="nav-link" id="upload_listing">Upload a listing</a>
                    </li>
                    <li class="nav-item px-3">
                    <a class="nav-link" id="my_listings">My Listings</a>
                    </li>
                    <li class="nav-item px-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
        </div>    
    </div>
    
    <div class="container py-2 px-4" style="background-color: #ffffff57!important;">
      <div id="current_selection">
        <div class=" rounded my-3 row align-self-center">    
          <div class="card col bg-transparent border-0 " style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2018/11/13/21/43/instagram-3814049_960_720.png" class="card-img-top" alt="user">
            <!-- pic from https://pixabay.com/vectors/instagram-insta-user-instagram-icon-3814049/ -->
            <div class="card-body">
                <h5 class="card-title" id="user_id" ><?php echo $_SESSION['email'];?></h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
    
          <div class="card col bg-transparent border-0 " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item bg-transparent">An item</li>
              <li class="list-group-item bg-transparent">A second item</li>
              <li class="list-group-item bg-transparent">A third item</li>
            </ul>
          </div>
          <div class="card bg-transparent border-0 " style="width: 18rem;">
            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
          </div>
          <div class="card col bg-transparent border-0 " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent">An item</li>
                <li class="list-group-item bg-transparent">A second item</li>
                <li class="list-group-item bg-transparent">A third item</li>
            </ul>
  <!--           
            <div class="card bg-transparent border-0 " style="width: 18rem;">
              <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div> -->
        </div>
        
        
       
      </div>
    </div>
  </main>

  <!-- listing for the user -->
  <div id="my_listings">

  </div>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script  type = "text/javascript" src="sell.js"></script>
  <script src="http://localhost/virtualTourWebsite/chatbot.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"crossorigin="anonymous"></script>

</body>
</html>

