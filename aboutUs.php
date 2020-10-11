<?php 
    session_start();
    //for importance of signin
    
        if(!isset($_SESSION['signedin'])){
        header('location:signin.php');
    }
    $_SESSION['aboutus']="true";
    include('index.php');
    unset($_SESSION['aboutus']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>about us</title>
    
</head>
<body>
    <div class="text-center">
    My name is <mark>Badr Essaadaoui</mark> and i'm a web developer <br> I create this website to help the surf community to make  a network between them.
    <p>so do not hesitate to share your ideas about this website.   <br>you can find me :  <br>
        <a href="https://www.facebook.com/profile.php?id=100010348362011" class="fa fa-facebook-official" target="_blank" style="font-size:100px"></a>
        <a href="https://www.instagram.com/essaadaoui_badr/" class="fa fa-instagram" target="_blank" style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  -webkit-background-clip: text;
          /* Also define standard property for compatibility */
          background-clip: text;
  -webkit-text-fill-color: transparent;
  
  font-size: 100px; /* change this to change the size*/"></a>
        <a href="https://github.com/BadrEssaadaoui/" class="fa fa-github-square" target="_blank" style="font-size:100px;color:black;"></a></p>
    <h4>Thank you !</h4>
    </div>
</body>
</html>