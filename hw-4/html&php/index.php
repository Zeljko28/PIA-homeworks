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
            ?>

        </div>

<?php

    include("footer.php");

?>