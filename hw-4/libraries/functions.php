<?php

    function emptySignupInput($firstName, $lastName, $email, $username, $password){
        if(empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password)){
            return true;
        }
        else{
            return false;
        }
    }

    function addUser($conn, $firstName, $lastName, $email, $username, $password, $privileges){
        $data = "INSERT INTO users (usersFirstName, usersLastName, usersEmail, usersUsername, usersPassword, usersPrivileges) VALUES ('$firstName', '$lastName', '$email', '$username', '$password', '$privileges')";

    }