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
  <body >
    <h1>Hello, world!</h1>
    <div class="container">   
        <form action="validation.php" method="post">
            <div class="form-group border-bottom">
                <input type="Email" name="email" class="form-control bg-transparent  border-0"  placeholder="Email">
            </div>
    
            <div class="form-group border-bottom">
                <input class="form-control bg-transparent border-0 " type="password" name="password" placeholder="Password">
            </div>

            <div class="form-group">
              <button class="btn d-grid gap-2 col-2 mx-auto  btn-danger" type= "submit">Login</button>            
            </div>
            <div class="card-group">
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
          
        </form>
    </div> 
    <form action="index.php" method="get">
      <input type="text" name="chat" placeholder="Enter message">
      <button type="submit">Send</button>
    </form>
    
        <?php
 $con = mysqli_connect('localhost','root','');
 mysqli_select_db($con, 'virttour');

        if (isset($_GET['chat'])) {
        #  $chattinglink = "http://localhost/virtualtourwebsite/chatbot1/chatbot1.py?". $_GET['chat'];
      
          $chatter=file_get_contents("http://localhost/virtualtourwebsite/chatbot1/chatbot1.py?". urlencode($_GET['chat']));
          echo $chatter;
        }
        ?> 
    <form action="index.php" method="get">
      <input type="text" name="rcmd" placeholder="try this" disabled>
      <button type="submit">Send</button>
    </form>
    <?php
      $rec=file_get_contents("http://localhost/recommendAlgo/epsilon1.py?");
      echo $rec;
        
      $records = mysqli_query($con, "select * From listings where address = '$rec'"); 
      while($data = mysqli_fetch_array($records))
      {
        echo  $data['price'];
        echo $data['address'];
        //echo '<img src="' . $data['address'] . '"height="42" width="42" alt="error">'; //tour image preview
        //echo "<a href=".$data['description'].">tour</a>"; //tour link
      }
        if (isset($_GET['rcmd'])) {
        #  $chattinglink = "http://localhost/virtualtourwebsite/chatbot1/chatbot1.py?". $_GET['chat'];
       
          $rec1=1;
          echo $rec1;
        }
        ?> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>