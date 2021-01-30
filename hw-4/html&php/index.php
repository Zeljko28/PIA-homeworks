<?php
    include("navbar.php");
?>

        <div class="container movies">
            <?php

                require_once "../libraries/functions.php";
                require_once "../libraries/connect_movies_db.php";
                if(!isset($_GET["genre"])){
                    showMovies($conn_movies);
                }
                else{
                    if($_GET["genre"] == "comedy"){
                        showSpecificGenre($conn_movies, "Komedija");
                    }
                    if($_GET["genre"] == "sci-fi"){
                        showSpecificGenre($conn_movies, "Naučna fantastika");
                    }
                    if($_GET["genre"] == "horror"){
                        showSpecificGenre($conn_movies, "Horor");
                    }
                    if($_GET["genre"] == "romance"){
                        showSpecificGenre($conn_movies, "Romantika");
                    }
                    if($_GET["genre"] == "action"){
                        showSpecificGenre($conn_movies, "Akcija");
                    }
                    if($_GET["genre"] == "thriler"){
                        showSpecificGenre($conn_movies, "Triler");
                    }
                    if($_GET["genre"] == "drama"){
                        showSpecificGenre($conn_movies, "Drama");
                    }
                    if($_GET["genre"] == "mystery"){
                        showSpecificGenre($conn_movies, "Misterija");
                    }
                    if($_GET["genre"] == "western"){
                        showSpecificGenre($conn_movies, "Western");
                    }
                    if($_GET["genre"] == "documentary"){
                        showSpecificGenre($conn_movies, "Dokumentarni film");
                    }
                    if($_GET["genre"] == "adventure"){
                        showSpecificGenre($conn_movies, "Avantura");
                    }
                    if($_GET["genre"] == "crime"){
                        showSpecificGenre($conn_movies, "Kriminalistička drama");
                    }

                }
            ?>

        </div>

<?php

    include("footer.php");

?>