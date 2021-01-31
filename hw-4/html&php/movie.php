<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

?>


<?php

    include("navbar.php");

?>

    <?php

        require_once "../libraries/functions.php";
        require_once "../libraries/connect_movies_db.php";

        showSpecificMovie($conn_movies);

    ?>



<?php

    include("footer.php");

?>