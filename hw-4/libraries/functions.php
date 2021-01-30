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









    // Movies functions

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
        
        // movies arr
        $query = mysqli_query($conn_movies, "SELECT * FROM movies");
        $movies = array();
        $paths = array();

        while($row = mysqli_fetch_array($query)){
            $movies[] = $row['moviesTitle'];
            $paths[] = $row['moviesImgUrl'];
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
                        echo "<h3>$movies[$index]</h3>";
                    echo "</div>";

                    echo "<div class='row image'>";
                        echo "<a href='#'><img src='$paths[$index]' alt='$movies[$index]'></a>";
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