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
  <body>
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

          
        </form>
    </div> 
    <form action="index.php" method="get">
      <input type="text" name="chat" placeholder="Enter message">
      <button type="submit">Send</button>
    </form>
    
        <?php
        if (isset($_GET['chat'])) {
          $chattinglink = "http://localhost/virtualtourwebsite/chatbot1/chatbot1.py?". $_GET['chat'];
        

          function file_get_contents_curl($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
            curl_setopt($ch, CURLOPT_URL, $url);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
          }

          $chatter=file_get_contents_curl( $chattinglink);
          
          
          echo $chatter;

          //echo shell_exec("C:\Program Files\Python310 virtualtourwebsite/chatbot1/chatbot1.py 'chat'");
        }
        ?> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>