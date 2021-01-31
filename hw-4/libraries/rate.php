<?php

    if(isset($_GET["stars"])){
        $stars = $_GET["stars"];
        $title = $_GET["title"];
        
        require_once "../libraries/functions.php";
        require_once "../libraries/connect_movies_db.php";

        updateRate($conn_movies, $title, $stars);
        header("Location: ../html&php/movie.php?title=$title");
        exit();

    }

    else{
        header("Location: ../html&php/index.php");
        exit();
    }


?> 