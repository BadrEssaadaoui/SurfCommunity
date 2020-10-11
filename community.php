<?php 
    session_start();
    
        if(!isset($_SESSION['signedin'])){
        header('location:signin.php');
    }
    $_SESSION['community']="true";
    include('index.php');
    unset($_SESSION['community']);
    // require_once 'conn.php';   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
</head>
<body style=''>
    
    <div class="container">
        <script src="communityassets/users.js"></script>
    </div>
    <div class="container">
        <script src="communityassets/index.js"></script>
    </div>
</body>
</html>

