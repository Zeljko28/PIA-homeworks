<?php

    if(isset($_POST["submit"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once "connect_users_db.php";
        require_once "functions.php";

        if(emptyLoginInput($username, $password) == true){
            header("Location: ../php/login.php?error=emptyInput");
            $error = "Niste popunili sva polja!";
            exit();
        }
        
    }

    else{
        header("Location: ../php/login.php");
    }

