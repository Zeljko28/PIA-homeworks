<?php

    if(isset($_POST["submit"])){
        
        $choosen = $_GET["choosen"];
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

        require_once "connect_movies_db.php";
        require_once "functions.php";

        if(!empty($synopsis)){
            $sql = "UPDATE movies SET moviesSynopsis='$synopsis' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
        }

        if(!empty($genre)){
            $sql = "UPDATE movies SET moviesGenre='$genre' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
        }

        if(!empty($scenarist)){
            $sql = "UPDATE movies SET moviesScenarist='$scenarist' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
        }

        if(!empty($director)){
            $sql = "UPDATE movies SET moviesDirector='$director' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
        }

        if(!empty($productionHouse)){
            $sql = "UPDATE movies SET moviesProductionHouse='$productionHouse' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
        }

        if(!empty($actors)){
            $sql = "UPDATE movies SET moviesActors='$actors' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
        }

        if(!empty($year)){
            $sql = "UPDATE movies SET moviesYear='$year' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
        }

        if(!empty($imgUrl)){
            $sql = "UPDATE movies SET moviesImgUrl='$imgUrl' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
        }

        if(!empty($duration)){
            $sql = "UPDATE movies SET moviesDuration='$duration' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
        }

        if(!empty($title)){
            $sql = "UPDATE movies SET moviesTitle='$title' WHERE moviesTitle='$choosen';";
            $conn_movies->query($sql);
            $choosen = $title;
        }


        header("Location: ../html&php/movie.php?title=$choosen");
        exit();
       
    }

    else{
        
        header("Location: ../html&php/update_movie.php");
        exit();
        
    }