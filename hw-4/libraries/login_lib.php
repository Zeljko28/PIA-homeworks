<?php

    if(isset($_POST["submit"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once "connect_users_db.php";
        require_once "functions.php";

        if(emptyLoginInput($username, $password) == true){
            header("Location: ../html&php/login.php?error=emptyInput");
            $error = "Niste popunili sva polja!";
            exit();
        }

        if(invalidLogin($conn, $username, $password) == true){
            header("Location: ../html&php/login.php?error=invalidUsernameOrPassword");
            $error = "Neispravno korisničko ime ili lozinka!";
            exit();
        }

        else{
            header("Location: ../html&php/index.php");
            exit();
        }
        
    }

    else{
        header("Location: ../html&php/login.php");
    }

