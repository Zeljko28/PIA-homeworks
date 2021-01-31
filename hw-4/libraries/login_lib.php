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

        if(invalidLogin($conn, $username, $password) == ""){
            header("Location: ../html&php/login.php?error=invalidUsernameOrPassword");
            $error = "Neispravno korisničko ime ili lozinka!";
            exit();
        }

        if(invalidLogin($conn, $username, $password) == "regular"){
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["privileges"] = "regular";
            header("Location: ../html&php/index.php");
            exit();
        }

        if(invalidLogin($conn, $username, $password) == "admin"){
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["privileges"] = "admin";
            header("Location: ../html&php/index.php");
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

