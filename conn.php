<?php
    $conn = new mysqli("localhost","root","","surf1");
    if($conn->connect_error){
        die("could not connect to the database");
    }

?>