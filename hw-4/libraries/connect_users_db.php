<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "users";
    
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die("Can't connect: " . mysqli_connect_error());
