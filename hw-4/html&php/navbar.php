<!DOCTYPE html>

<html lang="sr">
  <head>

        <title>AMRDb</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

    <body>

        
        <div class="container-fluid navigation-bar">

            <div class="row box">

                <div class="logo">
                    <a href="#"><span>AMRDb</span></a>
                </div>

                <div class="input">
                    <input type="search" placeholder="Pretraži AMRDb">
                    <a href="#">Pretraži</a>
                </div>

                <div id="items" class="links">
                    <a id="home" class="link" href="index.php">Početna strana</a>
                    <?php
                        
                        if(($_SESSION["privileges"] == "admin")){
                            echo "<a id='options' class='link' href='admin_options.php'>Opcije</a>";
                        }
                    ?>
                    
                    <a id="genres" class="link" href="genres.php">Žanrovi</a>
                    <a class="link" href="../libraries/signout_lib.php">Odjavite se</a>
                </div>

                <div class="btn">
                    <span id="btn" class="fa fa-bars"></span>
                </div>

            </div>
        </div>