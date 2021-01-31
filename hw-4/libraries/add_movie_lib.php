<?php

    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $synopsis = $_POST["synopsis"];
        $genre = $_POST["genre"];
        $scenarist = $_POST["scenarist"];
        $director = $_POST["director"];
        $productionHouse = $_POST["production-house"];
        $actors = $_POST["actors"];
        $year = $_POST["year"];
        $imgUrl = $_POST["img-url"];
        $duration = $_POST["duration"];
        $numOfRatings = 0;
        $sumOfRatings = 0;

        /*echo $title;
        echo "<br>";
        echo $synopsis;
        echo "<br>";
        echo $genre;
        echo "<br>";
        echo $scenarist;
        echo "<br>";
        echo $director;
        echo "<br>";
        echo $productionHouse;
        echo "<br>";
        echo $actors;
        echo "<br>";
        echo $year;
        echo "<br>";
        echo $imgUrl;
        echo "<br>";
        echo $duration;
        echo "<br>";*/

        require_once "connect_movies_db.php";
        require_once "functions.php";

        if(emptyMovieInput($title, $synopsis, $genre, $scenarist, $director, $productionHouse, $actors, $year, $imgUrl, $duration) == true){
            header("Location: ../html&php/add_movie.php?error=emptyInput");
            exit();
        }
        addMovie($conn_movies, $title, $synopsis, $genre, $scenarist, $director, $productionHouse, $actors, $year, $imgUrl, $duration);
        header("Location: ../html&php/index.php");
        exit();
    
    }

    else{
        header("Location: ../html&php/add_movie.php");
        exit();
    }

?>