 <?php

    if(!$_session['signedin']="true"){
      header('location:signin.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    
    </style>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="http://localhost/project/images/sc2.jpg">
    <h4 style="font-family:Comic Sans MS,Cursive">Surf community </h4>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link <?php if(isset($_SESSION['profile'])){echo "disabled";}?>" href="profile.php">profile </a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if(isset($_SESSION['community'])){echo "disabled";}?>" href="community.php">community  </a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if(isset($_SESSION['settings'])){echo "disabled";}?>" href="settings.php">settings  </a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if(isset($_SESSION['aboutus'])){echo "disabled";}?>" href="aboutus.php">about us</a>
    </li>
  </ul>
  </div>
</nav>
<br>
 
</body>
</html>