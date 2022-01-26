<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Virtual tour</title>
  </head>
  <!-- style="background-color: #0D1B2B" -->
  <body class="text-center">
    <div class="container" style="height:30%"> 
      <div class="row" >
        <div class="col-4"></div>  
        <form action="validation.php" class="col-4" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>   
        <div class="col-4"></div>  
      </div>
    </div> 

        
    <?php
      $con = mysqli_connect('localhost','root','');
      mysqli_select_db($con, 'virttour');
      $rec=file_get_contents("http://localhost/recommendAlgo/epsilon1.py?");
      echo "recomendation:";
      echo $rec;
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo nl2br("these are some houses we think you might like ");

      echo "<br>";
      $records = mysqli_query($con, "select * From listings where price = $rec OR add = $rec"); 
      
      while($data = mysqli_fetch_array($records))
      {
        echo  $data['price'];
        echo $data['address'];
      }
    ?> 

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>