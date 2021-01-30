<!DOCTYPE html>

<html lang="sr">
  <head>

        <title>AMRDb</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
                    <a class="active" href="#">Početna strana</a>
                    <a href="#">Top 10</a>
                    <a href="#">Žanrovi</a>
                    <a href="#">Odjavite se</a>
                </div>

                <div class="btn">
                    <span id="btn" class="fa fa-bars"></span>
                </div>

            </div>
        </div>


        <div class="container movies">
            <?php

                require_once "../libraries/functions.php";
                require_once "../libraries/connect_movies_db.php";

                showMovies($conn_movies);
            ?>

        </div>



        <script>
            $('.navigation-bar .box .btn span').click(function(){
                $('.navigation-bar .box .links').toggleClass("show");
            });
        </script>

        <script src="../js/script.js"></script>

    </body>
</html>
