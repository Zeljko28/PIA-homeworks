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
        $privileges = array();
        $privilege = "";

        while($row = mysqli_fetch_array($query)){
            $usernames[] = $row['usersUsername'];
            $emails[] = $row['usersEmail'];
            $passwords[] = $row['usersPassword'];
            $privileges[] = $row['usersPrivileges'];
        }
        
        $result = "";

        $i = 0;
        for($i = 0; $i < sizeof($usernames); $i++){
            if($usernames[$i] === $username || $emails[$i] === $username){
                if($passwords[$i] === $password){
                    $privilege = $privileges[$i];
                    $result = $privilege;
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
                        echo "<a href='../html&php/movie.php?title=$moviesTitles[$index]'><img src='$moviesImgUrl[$index]' alt='$moviesTitles[$index]'></a>";
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
                        echo "<a href='../html&php/movie.php?title=$thisGenreTitles[$index]'><img src='$thisGenreImgUrl[$index]' alt='$thisGenreTitles[$index]'></a>";
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


    function showSpecificMovie($conn_movies){

        $title = $_GET["title"];
        $synopsis = "";
        $genre = "";
        $scenarist = "";
        $director = "";
        $productionHouse = "";
        $actors = "";
        $year = "";
        $imgUrl = "";
        $duration = 0;
        $numOfRatings = 0;
        $sumOfRatings = 0;

        $sql = "SELECT * FROM movies";

        $result = $conn_movies->query($sql);
        while($row = $result->fetch_assoc()){
            if($row['moviesTitle'] == $title){
                $synopsis = $row['moviesSynopsis'];
                $genre = $row['moviesGenre'];
                $scenarist = $row['moviesScenarist'];
                $director = $row['moviesDirector'];
                $productionHouse = $row['moviesProductionHouse'];
                $actors = $row['moviesActors'];
                $year = $row['moviesYear'];
                $imgUrl = $row['moviesImgUrl'];
                $duration = $row['moviesDuration'];
                $numOfRatings = $row['moviesNumberOfRatings'];
                $sumOfRatings = $row['moviesSumOfRatings'];
                break;
            }
        }

        if($numOfRatings != 0){
            $awerage = $sumOfRatings / $numOfRatings;
        }
        else{
            $awerage = 0;
        }

        $awerage = round($awerage, 2);

        echo "<div class='container movie'>";

        echo "<div class='row'>";

            echo "<div class='col-md-6 img'>";
                echo "<h2>$title</h2>";
                echo "<img src='$imgUrl'>";
                echo "<h3>Prosečna ocena: $awerage <span style='color:orange;' class='fa fa-star'></span></h3>";
                echo "<h3 class='text'>Ocenite</h3>";
                echo "<form id='rate' action='../libraries/rate.php' method='post'>";
                    echo "<a href='../libraries/rate.php?stars=1&title=$title'><span id='star1' class='fa fa-star star1'></span></a>";
                    echo "<a href='../libraries/rate.php?stars=2&title=$title'><span id='star2' class='fa fa-star star2'></span></a>";
                    echo "<a href='../libraries/rate.php?stars=3&title=$title'><span id='star3' class='fa fa-star star3'></span></a>";
                    echo "<a href='../libraries/rate.php?stars=4&title=$title'><span id='star4' class='fa fa-star star4'></span></a>";
                    echo "<a href='../libraries/rate.php?stars=5&title=$title'><span id='star5' class='fa fa-star star5'></span></a>";
                echo "</form>";
            echo "</div>";

            echo "<div class='col-md-6 description'>";
                
                echo "<h3>Sinopis</h3>";
                echo "<p>$synopsis</p>";

                echo "<h3>Žanr</h3>";
                echo "<p>$genre</p>";
                
                echo "<h3>Scenarista</h3>";
                echo "<p>$scenarist</p>";

                echo "<h3>Režiser</h3>";
                echo "<p>$director</p>";

                echo "<h3>Producentska kuća</h3>";
                echo "<p>$productionHouse</p>";

                echo "<h3>Glumci</h3>";
                echo "<p>$actors</p>";

                echo "<h3>Godina izdanja</h3>";
                echo "<p>$year</p>";

                echo "<h3>Trajanje</h3>";
                echo "<p>$duration minuta</p>";
            echo "</div>";

        echo "</div>";


        echo "</div>";

    }


    function updateRate($conn_movies, $title, $stars){
        $numOfRatings = 0;
        $sumOfRatings = 0;

        $sql = "SELECT * FROM movies";

        $result = $conn_movies->query($sql);

        while($row = $result->fetch_assoc()){
            if($row['moviesTitle'] == $title){
                $numOfRatings = $row['moviesNumberOfRatings'];
                $sumOfRatings = $row['moviesSumOfRatings'];
                break;
            }
        }

        $numOfRatings++;
        $sumOfRatings = $sumOfRatings + ($stars * 2);

        $sql = "UPDATE movies SET moviesNumberOfRatings='$numOfRatings', moviesSumOfRatings='$sumOfRatings' WHERE moviesTitle='$title';";
        if(!$conn_movies->query($sql)){
            echo "Can't connect: " . $conn_movies->error;
        }
    }



    function emptyMovieInput($title, $synopsis, $genre, $scenarist, $director, $productionHouse, $actors, $year, $imgUrl, $duration){
        if(empty($title) || empty($synopsis) || empty($genre) || empty($scenarist) || empty($director) || empty($productionHouse)  || empty($actors) || empty($year) || empty($imgUrl) || empty($duration)){
            return true;
        }
        else{
            return false;
        }
    }

    function addMovie($conn_movies, $title, $synopsis, $genre, $scenarist, $director, $productionHouse, $actors, $year, $imgUrl, $duration){
        $numOfRatings = 0;
        $sumOfRatings = 0;
        $data = "INSERT INTO movies (moviesTitle, moviesSynopsis, moviesGenre, moviesScenarist, moviesDirector, moviesProductionHouse, moviesActors, moviesYear, moviesImgUrl, moviesDuration, moviesNumberOfRatings, moviesSumOfRatings) VALUES ('$title', '$synopsis', '$genre', '$scenarist', '$director', '$productionHouse', '$actors', '$year', '$imgUrl', '$duration', '$numOfRatings', '$sumOfRatings')";

        mysqli_query($conn_movies, $data);
    }

    function showMoviesToChange($conn_movies){
        $sql = "SELECT count(moviesTitle) AS total FROM movies";
        $result = mysqli_query($conn_movies, $sql);
        $values = mysqli_fetch_assoc($result);
        $num_movies = $values['total'];

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

        $index = 0;
        $i = 0;

        for ($i = 0; $i < sizeOf($moviesTitles); $i++){
            echo "<div class='row'>";
                echo "<a href='../html&php/update_choosen_movie.php?choosen=$moviesTitles[$i]'>$moviesTitles[$i]</a>";
            echo "</div>";
        }
    }


            
    