<?php
session_start();   
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'virttour');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/virtualTourWebsite/web/index/listings.css">
</head>
<body>
    <div class="container">
        <div class=" col text-center bg-transparent border-0">
            <h3 class="py-3">Report <?php echo uniqid("",false);?> </h3>
            <div>
                <img srcset="https://cdn.pixabay.com/photo/2018/11/13/21/43/instagram-3814049_960_720.png 5x"  alt="user">
            </div> 
            <!-- pic from https://pixabay.com/vectors/instagram-insta-user-instagram-icon-3814049/ -->
            <div class="card-body">
                <h5 class="card-title" id="user_id" ><?php echo $_SESSION['email'];?></h5>
            </div>
            <div class="card-body">
                <p class="card-title" id="user_id" > Generated: <?php $timestamp = time(); echo date("F d, Y h:i:s A", $timestamp);?></p>
            </div>
        </div>

        <?php
            if (isset($_SESSION['email'])){
                $user=$_SESSION['email'];
                $sql = "SELECT * FROM user_pref where username ='$user'";
                $result = $result = mysqli_query($con, $sql);
                while($row = $result -> fetch_assoc()){
                    echo "Your activity:<br>"
                        ,"Listings in Grange: ",$row['grange'],
                        "Listings in Lucea: ",$row['lucea']
                                            ;
                }
            }       
        ?>

        <div class="row row-cols-1 row-cols-md-6 g-4">

        <?php
                if (isset($_SESSION['email'])){
                $user=$_SESSION['email'];
                $sql = "SELECT * FROM listings where posted_by='$user' ORDER BY listings_interaction desc";
                $result = $result = mysqli_query($con, $sql);

                // Associative array
                while($row = $result -> fetch_assoc()){
                    echo"
                    <div class='col'>  
                      <div class='card bg-light'>
                        <img src=",$row['image_src']," class='list_img my_img rounded my-2 mx-2' style='max-width:100px; height:100px; object-fit:cover;'>
                          <div class='card-body'>
                            <h5 class='card-title'>Listing ID.# ",$row['id'],"</h5>
                            <p class='card-title'>",$row['listings_interaction']," views since posted</p>
                          </div>
                      </div>
                    </div>";
                }
                // Free result set
                $result -> free_result();
            }
            ?>
        </div>
    </div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // window.print()
    });
</script>
</html>