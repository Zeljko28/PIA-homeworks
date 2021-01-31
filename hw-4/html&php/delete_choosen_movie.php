<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

?>

<?php
    include("navbar.php");
?>

    <div class="container delete">
        <div class="row">
            <h2>Da li ste sigurni da želite da obrišete film <?php echo $_GET["choosen"];?> ?</h2>
        </div>

        <div class="row">
            <a href="../libraries/delete_movie_lib.php?choosen=<?php echo $_GET["choosen"];?>">Obriši</a>
            <a href="delete_movie.php">Nazad</a>
        </div>

    </div>



<?php

    include("footer.php");

?>