<?php


    // Signup page functions

    function emptySignupInput($firstName, $lastName, $email, $username, $password){
        if(empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password)){
            return true;
        }
        else{
            return false;
        }
    }

    function invalidName($firstName){
        if (!preg_match("/^[a-zA-Z]*$/", $firstName)) {
            return true;
        }
        else {
            return false;
        }
    }

    function invalidLastName($lastName){
        if (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
            return true;
        }
        else {
            return false;
        }
    }

    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            return false;
        }
    }

    function usernameExist($username){
        $usernames = "SELECT * FROM users WHERE usersUsername = $username;";
        $result = mysqli_query($conn, $usernames);
        if(mysqli_num_rows($result) > 0){
            return true;
        }
        else{
            return false;
        }
    }


    function addUser($conn, $firstName, $lastName, $email, $username, $password, $privileges){
        $data = "INSERT INTO users (usersFirstName, usersLastName, usersEmail, usersUsername, usersPassword, usersPrivileges) VALUES ('$firstName', '$lastName', '$email', '$username', '$password', '$privileges')";

        mysqli_query($conn, $data);
    }   



    //Login page functions


    function emptyLoginInput($username, $password){
        if(empty($username) || empty($password)){
            return true;
        }
        else{
            return false;
        }
    }

    function invalidLogin($conn, $username, $password){
        $query = mysqli_query($conn, "SELECT * FROM users");

        $usernames = array();
        $emails = array();
        $passwords = array();

        while($row = mysqli_fetch_array($query)){
            $usernames[] = $row['usersUsername'];
            $emails[] = $row['usersEmail'];
            $passwords[] = $row['usersPassword'];
        }
        
        $result = true;

        $i = 0;
        for($i = 0; $i < sizeof($usernames); $i++){
            if($usernames[$i] === $username || $emails[$i] === $username){
                if($passwords[$i] === $password){
                    $result = false;
                    break;
                }
            }
        }

        return $result;


    }









    // Movies functions

    $moviesTitles = array();
    $moviesSynopsis = array();
    $moviesGenres = array();
    $moviesScenarists = array();
    $moviesDirectors = array();
    $moviesProductionHouses = array();
    $moviesActors = array();
    $moviesYears = array();
    $moviesImgUrl = array();
    $moviesDurations = array();
    $moviesNumbersOfRatings = array();
    $moviesSumsOfRatings = array();

    $numberOfRows = 0;
    $numberOfColumns = 0;


    $thisGenreTitles = array();
    $thisGenreSynopsis = array();
    $thisGenre = "";
    $thisGenreScenarists = array();
    $thisGenreDirectors = array();
    $thisGenreProductionHouses = array();
    $thisGenreActors = array();
    $thisGenreYears = array();
    $thisGenreImgUrl = array();
    $thisGenreDurations = array();
    $thisGenreNumbersOfRatings = array();
    $thisGenreSumsOfRatings = array();

    $thisGenreNumberOfRows = 0;
    $thisGenreNumberOfColumns = 0;


    /*function loadMovies($conn_movies, $numberOfColumns, $numberOfRows){

        $sql = "SELECT count(moviesTitle) AS total FROM movies";
        $result = mysqli_query($conn_movies, $sql);
        $values = mysqli_fetch_assoc($result);
        $num_movies = $values['total'];

        $numberOfRows = $num_movies % 4;
        $numberOfColumns = 0;
        if($numberOfRows !== 0){
            $numberOfRows = (int)($num_movies / 4) + 1;
            $numberOfColumns = $num_movies;
        }
        else{
            $numberOfRows = (int)($num_movies / 4);
            $numberOfColumns = $num_movies;
        }
        
        // movies arrays
        $query = mysqli_query($conn_movies, "SELECT * FROM movies");

        while($row = mysqli_fetch_array($query)){
            $moviesTitles[] = $row['moviesTitle'];
            $moviesSynopsis = $row['moviesSynopsis'];
            $moviesGenres = $row['moviesGenre'];
            $moviesScenarists = $row['moviesScenarist'];
            $moviesDirectors = $row['moviesDirector'];
            $moviesProductionHouses = $row['moviesProductionHouse'];
            $moviesActors = $row['moviesActors'];
            $moviesYears = $row['moviesYear'];
            $moviesImgPaths = $row['moviesImgUrl'];
            $moviesDurations = $row['moviesDuration'];
            $moviesNumbersOfRatings = $row['moviesNumberOfRatings'];
            $moviesSumsOfRatings = $row['moviesSumOfRatings'];
        }
    }*/




    function showMovies($conn_movies){

        $sql = "SELECT count(moviesTitle) AS total FROM movies";
        $result = mysqli_query($conn_movies, $sql);
        $values = mysqli_fetch_assoc($result);
        $num_movies = $values['total'];

        $numberOfRows = $num_movies % 4;
        $numberOfColumns = 0;
        if($numberOfRows !== 0){
            $numberOfRows = (int)($num_movies / 4) + 1;
            $numberOfColumns = $num_movies;
        }
        else{
            $numberOfRows = (int)($num_movies / 4);
            $numberOfColumns = $num_movies;
        }
        
        // movies arrays
        $query = mysqli_query($conn_movies, "SELECT * FROM movies");

        while($row = mysqli_fetch_array($query)){
            $moviesTitles[] = $row['moviesTitle'];
            $moviesSynopsis[] = $row['moviesSynopsis'];
            $moviesGenres[] = $row['moviesGenre'];
            $moviesScenarists[] = $row['moviesScenarist'];
            $moviesDirectors[] = $row['moviesDirector'];
            $moviesProductionHouses[] = $row['moviesProductionHouse'];
            $moviesActors[] = $row['moviesActors'];
            $moviesYears[] = $row['moviesYear'];
            $moviesImgUrl[] = $row['moviesImgUrl'];
            $moviesDurations[] = $row['moviesDuration'];
            $moviesNumbersOfRatings[] = $row['moviesNumberOfRatings'];
            $moviesSumsOfRatings[] = $row['moviesSumOfRatings'];
        }

        $i = 0;
        $j = 0;
        $tmp = 0;
        $index = 0;

        if($numberOfColumns >= 4){
            $tmp = 4;
        }
        else{
            $tmp = $numberOfColumns;
        }

        for ($i = 0; $i < $numberOfRows; $i++){
            echo "<div class='row'>";
            for($j = 0; $j < $tmp; $j++){
                echo "<div class='col-md-3'>";
                    
                    echo "<div class='row title'>";
                        echo "<h3>$moviesTitles[$index]</h3>";
                    echo "</div>";

                    echo "<div class='row image'>";
                        echo "<a href='#'><img src='$moviesImgUrl[$index]' alt='$moviesTitles[$index]'></a>";
                    echo "</div>";
                
                echo "</div>";
                $index++;
            }
            $numberOfColumns = $numberOfColumns - 4;
            if($numberOfColumns >= 4){
                $tmp = 4;
            }
            else{
                $tmp = $numberOfColumns;
            }
            echo "</div>";
        }
    }


    function showSpecificGenre($conn_movies, $genre){

        $sql = "SELECT count(moviesTitle) AS total FROM movies";
        $result = mysqli_query($conn_movies, $sql);
        $values = mysqli_fetch_assoc($result);
        $num_movies = $values['total'];

        $thisGenreNumMovies = 0;

        $query = mysqli_query($conn_movies, "SELECT * FROM movies");

        while($row = mysqli_fetch_array($query)){
            $moviesTitles[] = $row['moviesTitle'];
            $moviesSynopsis[] = $row['moviesSynopsis'];
            $moviesGenres[] = $row['moviesGenre'];
            $moviesScenarists[] = $row['moviesScenarist'];
            $moviesDirectors[] = $row['moviesDirector'];
            $moviesProductionHouses[] = $row['moviesProductionHouse'];
            $moviesActors[] = $row['moviesActors'];
            $moviesYears[] = $row['moviesYear'];
            $moviesImgUrl[] = $row['moviesImgUrl'];
            $moviesDurations[] = $row['moviesDuration'];
            $moviesNumbersOfRatings[] = $row['moviesNumberOfRatings'];
            $moviesSumsOfRatings[] = $row['moviesSumOfRatings'];
        }


        $i = 0;
        $j = 0;

        for($i = 0; $i < sizeof($moviesGenres); $i++){
            
            if($moviesGenres[$i] == $genre){
                $thisGenreTitles[$j] = $moviesTitles[$i];
                $thisGenreSynopsis[$j] = $moviesSynopsis[$i];
                $thisGenreScenarists[$j] = $moviesScenarists[$i];
                $thisGenreDirectors[$j] = $moviesDirectors[$i];
                $thisGenreProductionHouses[$j] = $moviesProductionHouses[$i];
                $thisGenreActors[$j] = $moviesActors[$i];
                $thisGenreYears[$j] = $moviesYears[$i];
                $thisGenreImgUrl[$j] = $moviesImgUrl[$i];
                $thisGenreDurations[$j] = $moviesDurations[$i];
                $thisGenreNumbersOfRatings[$j] = $moviesNumbersOfRatings[$i];
                $thisGenreSumsOfRatings[$j] = $moviesSumsOfRatings[$i];
                $thisGenreNumMovies++;
                $j++;
            }
        }

        

        if($thisGenreNumMovies == 0){
            echo "<h1>Nije pronadjen nijedan rezultat.</h1>";
            exit();
        }


        $thisGenreNumberOfRows = $thisGenreNumMovies % 4;
        $thisGenreNumberOfColumns = 0;
        if($thisGenreNumberOfRows !== 0){
            $thisGenreNumberOfRows = (int)($thisGenreNumMovies / 4) + 1;
            $thisGenreNumberOfColumns = $thisGenreNumMovies;
        }
        else{
            $thisGenreNumberOfRows = (int)($thisGenreNumMovies / 4);
            $thisGenreNumberOfColumns = $thisGenreNumMovies;
        }

        $i = 0;
        $j = 0;
        $tmp = 0;
        $index = 0;

        if($thisGenreNumberOfColumns >= 4){
            $tmp = 4;
        }
        else{
            $tmp = $thisGenreNumberOfColumns;
        }

        for ($i = 0; $i < $thisGenreNumberOfRows; $i++){
            echo "<div class='row'>";
            for($j = 0; $j < $tmp; $j++){
                echo "<div class='col-md-3'>";
                    
                    echo "<div class='row title'>";
                        echo "<h3>$thisGenreTitles[$index]</h3>";
                    echo "</div>";

                    echo "<div class='row image'>";
                        echo "<a href='#'><img src='$thisGenreImgUrl[$index]' alt='$thisGenreTitles[$index]'></a>";
                    echo "</div>";
                
                echo "</div>";
                $index++;
            }
            $thisGenreNumberOfColumns = $thisGenreNumberOfColumns - 4;
            if($thisGenreNumberOfColumns >= 4){
                $tmp = 4;
            }
            else{
                $tmp = $thisGenreNumberOfColumns;
            }
            echo "</div>";
        }

        


    }