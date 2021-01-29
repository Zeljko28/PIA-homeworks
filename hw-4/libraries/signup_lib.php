<?php

    /*Provera da li je korisnik pravilno pristupio ovoj stranici,
    odnosno preko buttona za registraciju, a ne kucanjem adrese u browser.
    Ako nije stranica se reload-uje*/

    if(isset($_POST["submit"])){
        
        $firstName = $_POST["first-name"];
        $lastName = $_POST["last-name"];
        $email = $_POST["email"];
        $username = $_POST["new-username"];
        $password = $_POST["new-password"];
        $privileges = "regular";

        require_once "connect_users_db.php";        // povezivanje sa bazom podataka
        require_once "functions.php";               // ukljucujemo i fajl sa funkcijama koje cemo koristiti


        if(emptySignupInput($firstName, $lastName, $email, $username, $password) == true){
            header("Location: ../signup.php");
        }

        addUser($conn, $firstName, $lastName, $email, $username, $password, $privileges);

    }
    else{
        header("Location: ../php/signup.php");
    }