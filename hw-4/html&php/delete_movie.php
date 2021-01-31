<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

?>

<?php
    include("navbar.php");
?>
    <div class="container options">
        <h2 style="text-align: center; margin-bottom: 50px; font-family:Candara; font-weight:bold; text-shadow:1px 1px 1px grey;">Odaberite film koji želite da obrišete</h2>

        <?php
            
            require_once "../libraries/functions.php";
            require_once "../libraries/connect_movies_db.php";

            showMoviesToDelete($conn_movies);

            
        ?>
    </div>


<?php

    include("footer.php");

?>