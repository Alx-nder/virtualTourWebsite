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
<html lang="en"  >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/virtualTourWebsite/listings.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" media="all">
  </head>
<body style="background-color: #10051b!important;   background-size: 100% 100%;   object-fit: cover;
" class="container-fluid text-light">
    <!-- navbar -->
    <div class="min-vh-100" style="background-image: url('http://localhost/virtualTourWebsite/milad-fakurian-wNsHBf_bTBo-unsplash.jpg');">
      <nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container-fluid">
        <a class="navbar-brand h3" href="http://localhost/virtualTourWebsite/logout.php">VtZ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse justify-content-center navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav  mb-2 justify-content-center mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/virtualTourWebsite/listings.php">Buy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/virtualTourWebsite/seller/sell.php">Sell</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"  >METAverse</a>
            </li>
          </ul>      
        </div>
      </div>
    </nav>
    </div>
  
  
<input style="display: none;" type="text" name="user_session" value=<?php echo $_SESSION['email'];?>>  

  <!-- chatbot -->
    <input type="text" name="chat" placeholder="Enter message">
    <button class="send">Send</button>
    <button class="mic">mic</button>

  
  <!-- main section -->
  <main class="mt-4">
    <div id="for_rec" class="container">
      <div class=" row row-cols-1 row-cols-md-3 g-4" id="csec"></div>
    </div>
  </main>

   <!-- loader image -->
  <!-- <div id="loader_image" style="display: block">
    <img src="" alt="loading..." >
  </div> -->
  

  <!-- scroll to top button -->
  <div class="text-center py-3">
    <i id="page_top" class="fas fa-plus fa-2x"></i>
  </div>
  
  
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script  type = "text/javascript" src="metaverse.js"></script>
  <script src="http://localhost/virtualTourWebsite/chatbot.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"crossorigin="anonymous"></script>

</body>
</html>

