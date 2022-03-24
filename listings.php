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
    <!-- <link href='https://css.gg/spinner-alt.css' rel='stylesheet'> -->
    <link href="https://css.gg/css?=|dollar|pin|spinner" rel="stylesheet">

  </head> 

<body  class="movingGradient" >
    
    
    <!-- navbar -->
    <nav class="navbar  navbar-expand-lg navbar-light ">
      <div class="container-fluid">
        <a class="navbar-brand h3" href="logout.php"><img class="ms-4 w-25" src="qesf.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse justify-content-center navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav  mb-2 justify-content-center mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Buy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="seller\sell.php">Sell</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="decentralandAPI\metaverse.php"  >METAverse</a>
            </li>
          </ul> 
          <a class="navbar-brand h3" href="logout.php">Logout</a>
     
        </div>
      </div>
    </nav>

    <div class=" row container min-vh-100 pt-4">
      <div class="col-5 pt-5">
        <div class="text-dark pt-5 px-4 ">
        <!-- fs-1 -->
          <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1> 
        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione temporibus tenetur quod blanditiis optio natus quibus</p>
        </div>
      </div>

        <div class="col-4">
            <video autoplay muted  loop poster="https://images.unsplash.com/photo-1488707872600-5507977fe355?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80">
            <source type="video/mp4" src="housetourvideo.mp4">
            <!-- pic credit https://images.unsplash.com/photo-1488707872600-5507977fe355?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80 -->
            <!-- vid credit https://www.youtube.com/watch?v=An0SK0n7Xeo -->
            </video>
      </div>
    </div>

  <h5 class="card-title" id="user_id" ><?php echo $_SESSION['email'];?></h5>
                
  <!-- chatbot -->
    <input type="text" name="chat" placeholder="Enter message">
    <button class="send">Send</button>
    <button class="mic">mic</button>
    <?php
    // system("C:\\xampp\htdocs\\virtualTourWebsite\\chatbot1\\speech_module.py",$voice);
    // echo $voice;
    ?>

  
  <!-- main section -->
  <main class="mt-4">
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
  <script  type = "text/javascript" src="reccomend.js"></script>
  <script src="chatbot.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"crossorigin="anonymous"></script>

</body>
</html>

