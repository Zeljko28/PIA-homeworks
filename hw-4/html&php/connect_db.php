<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "users";
    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Can't connect: " . mysqli_connect_error());
?>