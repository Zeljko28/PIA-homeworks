<?php

    $choosen = $_GET["choosen"];

    require_once "connect_movies_db.php";
    require_once "functions.php";

    $sql = "DELETE FROM movies WHERE moviesTitle='$choosen';";

    if ($conn_movies->query($sql) === TRUE) {
        header("Location: ../html&php/index.php");
        exit();
    } else {
        echo "Film ne može da se obriše " . $conn->error;
        exit();
    }

?>