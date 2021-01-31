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

        <div class="row">
            <a href="add_movie.php">Dodajte film</a>
        </div>

        <div class="row">
            <a href="options.php?option=updateMovie">Preuredite film</a>
        </div>

        <div class="row">
            <a href="options.php?option=removeMovie">Obrišite film</a>
        </div>

    </div>


<?php

include("footer.php");

?>