
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand col-sm-8" href="index.php">
    <h4>Surf community </h4>
  </a>
</nav>
<div class="container">
<?php
 session_start();
 if(isset($_SESSION['error'])){
    echo     "<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <center> <strong>".$_SESSION['error']."</strong></center>
                        </div>";
                        unset($_SESSION['error']);
 
   }
    ?>
</div>
    <center>
        <form action="action.php" method="post" style="border:1px solid black;background-color:#add8e6;margin:5px auto;padding:20px 20px 40px 20px;width:50%;position:relative;" >
                <h2 class="ml-4">Connexion</h2>
                <div class="form-group">
                    <label for="email2">email:</label>
                    <input type="text" class="form-control" id="email2" placeholder="Enter email" name="email2" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd2">Password:</label>
                    <div class="input-group">
                    <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="pswd2" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="basic-addon2" onclick="showPassword()">Show</button>
                        </div>
                    </div>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <button type="submit" name="sign" class="btn btn-primary" style="position:absolute;left:10px;bottom:10px;">Connexion</button>
                <a href="login2.php" style="position:absolute;right:10px">I don't have any account</a>
        </form>
    </center>
</body>
<script>
    function showPassword(){
        var x = document.getElementById("pwd2");
        var y = document.getElementById("basic-addon2");
        if (x.type === "password") {
            x.type = "text";
            y.textContent="Hide";
        } else {
            x.type = "password";
            y.textContent="Show";
        }
    }
</script>
</html>