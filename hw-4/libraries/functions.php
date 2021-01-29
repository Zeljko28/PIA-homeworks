<?php

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