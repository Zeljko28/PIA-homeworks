<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "movies";
    
    $conn_movies = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die("Can't connect: " . mysqli_connect_error());
    