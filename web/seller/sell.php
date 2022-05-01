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
        header('location:/virtualTourWebsite/validations/login.php');
    } 
    if($_SESSION['email']=='guest'){
      header('location:/virtualTourWebsite/validations/login.php');
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="http://localhost/virtualTourWebsite/web/index/listings.css">
  <style>
    .border-bottom{
      border-bottom:1px solid #6c757d!important;
    }   
    ::placeholder {
  color: #343a40  !important;;
  opacity: 1; /* Firefox */
  text-align: left;
}
  </style>
</head>

<body style="background-color: #7f9497!important;" class="container-fluid text-dark">
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
            <a class="nav-link" href="http://localhost/virtualTourWebsite/web/index/listings.php">Buy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link "  href="http://localhost/virtualTourWebsite/web/metaverse/metaverse.php"  >METAverse</a>
          </li>
          <li>
            <a class="nav-link" id="logout" href="http://localhost/virtualTourWebsite/validations/logout.php">Logout</a>
          </li>
        </ul>      
      </div>
    </div>
  </nav>

  <div class="container ">
  <hr class=" my-4 ">
<div class="text-center">
<h4 >
      Generate a report of your activity here
    </h4>
    <iframe src="report.php" style="display: none;" name="report" title="Reportpage"></iframe>
    <button class="btn btn-primary" onclick="frames['report'].print()">Get a report</button>

</div>
    <hr class=" my-4 ">

  <div class="list-group-horizontal list-group position-relative ">
    <h3 class="pb-3" >Your Listings</h3>
    <h3 class=" position-absolute end-0" role="button" id="your_listings">...</h3>      
  </div>

    <div class="row row-cols-4 g-4" id="listings_list" >
      <?php
        if (isset($_SESSION['email'])){
        $user=$_SESSION['email'];
        $sql = "SELECT * FROM listings where posted_by='$user' ORDER BY listings_interaction desc";
        $result = $result = mysqli_query($con, $sql);

        // Associative array of a user's listings
        while($row = $result -> fetch_assoc()){
          echo"
          <div class='col'>  
            <div class='card bg-light'>
              <img src=",$row['image_src']," class='list_img my_img rounded my-2 mx-2' style='max-width:100%; height:180px; object-fit:contain;' >
            
                <div class='card-body'>
                  <h5 class='card-title'>Listing ID.# ",$row['id'],"</h5>
                  <p class='card-title'>",$row['listings_interaction']," views since posted</p>
                
        <h5 class='card-title'>",$row['house_location'],"</h5>
        <h5 class='card-title'>",$row['price'],"</h5>
        <p class='card-text fs-6'>Total acres of land: ",$row['land'],"<br>Total acres of living space: ",$row['living_space'],"<br>No. of Bedrooms: ",$row['bedrooms'],"<br>No. of Bathrooms: ",$row['bathrooms'],"<br>Built/renovated: ",$row['age']," years ago</p>
        </div>
        
            </div>
          </div>";
        }
        // Free result set
        $result -> free_result();
        }
      ?>
    </div>
    <hr class=" my-4 ">
  </div>
 
  <main>

    <form  action="upload.php" method="POST" enctype="multipart/form-data">
      <div class="container py-4 mt-5 px-4" style="background-color: #ffffff57!important;">
        <div class=" rounded mt-5 row  align-self-center">
          <!-- user pic -->
          <div class=" col text-center bg-transparent border-0">
            <h3 class="py-3">Upload a listing </h3>
            <div>
              <img srcset="https://cdn.pixabay.com/photo/2018/11/13/21/43/instagram-3814049_960_720.png 5x"  alt="user">
            </div> 
            <!-- pic from https://pixabay.com/vectors/instagram-insta-user-instagram-icon-3814049/ -->
            <div class="card-body">
              <h5 class="card-title" id="user_id" >Hi <?php echo $_SESSION['email'];?>!</h5>
            </div>
            <div class="card-body">
              <p class="card-title" id="user_id" >Use this page to upload a listing you plan to sell. You can also use the estimate button to see what the prices are like based on the details you provide.</p>
            </div>
          </div>
          
          <div class="col pt-5 mx-3">
            <div class="input-group mb-3">
              <input type="text"  class="border-bottom form-control bg-transparent border-0 rounded-0 house_details" name="living_space" placeholder="acres of living space" required>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control border-bottom bg-transparent border-0 rounded-0 house_details" name="bathrooms" placeholder="no. of bathrooms"required>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control house_details bg-transparent border-0 rounded-0 border-bottom" name="bedrooms" placeholder="no. of bedrooms"required>
            </div>
            <div class="input-group mb-3">
              <select class="form-select border-0 border-bottom  rounded-0 bg-transparent" name="building_class" aria-label="Default select example" required>
                <option selected>Building class</option>
                <option value="1">board house flat</option>
                <option value="3">concrete flat</option>
                <option value="5">concrete complex (multi-story)</option>
                <option value="7">villa-type</option>
                <option value="9">mansion</option>
              </select>  
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control border-0 border-bottom  rounded-0 bg-transparent house_details" name="land" placeholder="acres of land"required>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control border-0 border-bottom  rounded-0 bg-transparent house_details" name="age" placeholder="age in years"required>
            </div>
            <div>
              <ul class="list-group list-group-horizontal">
                <a class="btn border bg-transparent submit">Estimate</a>
                <input type="text" class="form-control"  id="the_estimate" disabled placeholder="">
              </ul>
            </div>
            
          </div>

          <div class="col pt-5 mx-3">
            <div class="input-group mb-3">
              <input type="text" class="form-control border-0 border-bottom  rounded-0 bg-transparent house_details" name="description" placeholder="Extra deatil/ Description">
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control border-0 border-bottom  rounded-0 bg-transparent house_details" name="price" placeholder="Asking price"required>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control border-0 border-bottom  rounded-0 bg-transparent house_details" name="house_location" placeholder="location"required>
            </div>
            <div class="input-group pt-3 mb-2">
                <label >Upload pictute of the listing</label>
            </div>
            <div class="input-group mb-3">
              <input type="file" class="form-control bg-transparent house_details" name="image" required>
            </div>
            <button type="submit" class="btn border bg-transparent submit" name="upload">Upload</button>
          </div>

        </div>
      </div>
    </form>
  </main>

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
    <img id="chat_trigger" class="float-end" srcset="http://localhost/virtualTourWebsite/web/images/chatbot.png 9x" style="cursor: pointer;" alt="">
  </div>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script  type = "text/javascript" src="sell.js"></script>
  <script src="http://localhost/virtualTourWebsite/chatbot_module/chatbot.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"crossorigin="anonymous"></script>

</body>
</html>

