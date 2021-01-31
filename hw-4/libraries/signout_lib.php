<?php

    session_start();
    session_unset();
    session_destroy();

    header("Location: ../html&php/login.php");
    exit();