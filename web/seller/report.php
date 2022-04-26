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
</head>
<body>
    <form>
        <input type="button" value="Print" onclick="window.print()" />
    </form>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
            echo"These are your listings";
                if (isset($_SESSION['email'])){
                $user=$_SESSION['email'];
                $sql = "SELECT * FROM listings where posted_by='$user' ORDER BY listings_interaction desc";
                $result = $result = mysqli_query($con, $sql);

                // Associative array
                while($row = $result -> fetch_assoc()){
                echo"<div class='col'>  <div class='card h-100 bg-light'><img src=",$row['image_src']," class='list_img my_img rounded my-2 mx-2' style='max-width:100%; height:auto; object-fit:contain;' alt='http://localhost/krpano-1.20.11/viewer/krpano.html?xml=examples/interactive-area/interactive-area.xml'><div class='card-body'><h5 class='card-title'>",$row['house_location'],"</h5><i class='bi bi-cash-coin'></i><h5 class='card-title'>",$row['price'],"</h5><p class='card-text fs-6'>Total acres of land: ",$row['land'],"<br>Total acres of living space: ",$row['living_space'],"<br>No. of Bedrooms: ",$row['bedrooms'],"<br>No. of Bathrooms: ",$row['bathrooms'],"<br>Built/renovated: ",$row['age']," years ago</p></div><div class='card-footer'><small class='text-muted'>Contact: ",$row['posted_by'],"</small></div></div></div>";
                }
                // Free result set
                $result -> free_result();
            }
            ?>
        </div>
    </div>

</body>
</html>