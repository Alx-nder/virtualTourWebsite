<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Chatbot window</title>
</head>
<body>
    <audio controls>
        <!-- <source src="{{ url_for('audio') }}" type="audio/x-wav;codec=pcm"> -->
        Your browser does not support the audio element.
    </audio>

    
    <!-- <style>@import url('https://fonts.googleapis.com/icon?family=Material+Icons');</style> -->
    <!-- https://www.youtube.com/watch?v=C3JKS3a4R5Y -->
    <section>
        <h1>chat popup</h1>
        <p>click on the chat button to start chat</p>
        <button class="chat-btn">
            <i class="material-icons">question_answer</i>
        </button>
    </section>
    <div class="chat-popup">
        <div class="badge">1</div>
        <div class="chat-area">
            <div class="income-msg">
                <img src="" alt="...">
                <span class="msg">Hello</span>
            </div>
        </div>
        <div class="input-area">
            <input type="text" placeholder="type message">
            <button id="test">&#127773;</button>
            <button class="submit"><i class="material-icons">send</i></button>
        </div>
    </div>
    <!-- <script>import { EmojiButton } from 'https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.1.1/dist/index.min.js';</script> -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="main.js"></script>
    <?php 
     echo "";
    ?>
</body>
</html>


