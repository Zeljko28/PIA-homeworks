<?php

    if(isset($_POST["submit"])){
        $word = $_POST["search"];

        header("Location: ../html&php/index.php?search=$word");
        exit();
    }
