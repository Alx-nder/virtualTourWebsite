<?php
    // system("C:\\xampp\htdocs\\virtualTourWebsite\\chatbot1\\speech_module.py",$voice);
    // echo $voice;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://css.gg/css?=|dollar|pin|spinner" rel="stylesheet">

</head>
<body>

    <i class="material-icons">cloud</i>
    <i class="material-icons">home</i>
    <i id="loader_image" class="gg-dollar"></i>

    <div class="card h-100 bg-light">
        <img class="image" src="" alt="...">
        
        <div class="card-body">
            <h5 class="card-title">grange</h5>
            <h5 class="card-title">3125476</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet fugiat rerum consequatur. Eaque delectus voluptates aliquid temporibus quibusdam magni quidem, nesciunt hic atque laborum consequatur fugiat aut sunt dolores quam?</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Posted: January 14 </small>
        </div>
    </div>    
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    var image_tag=document.getElementsByClassName('image');
    var parent_card= image_tag[0].parentElement;
    var the_lorem=parent_card.getElementsByClassName('card-text')[0].innerHTML;

    var card_location= parent_card.getElementsByClassName("card-title")[0].innerHTML;
    var card_price= parent_card.getElementsByClassName("card-title")[1].innerHTML;

    var username="guest";
    // creates a json obj for the request body
    var req_body=JSON.stringify({username,card_price,card_location});

    // alert(JSON.stringify(req_body));
    $.ajax({
        url: "http://localhost/recommendAlgo/update_pref.py",
        method: "POST",
        data: {message_py:req_body},
        dataType: "text",
        success: function(resp){ 
            alert(resp);
        } 
    })

</script>