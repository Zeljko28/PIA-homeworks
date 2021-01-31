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

        require_once "../libraries/connect_movies_db.php";
        require_once "../libraries/functions.php";


        if(isset($_GET["option"])){

            if($_GET["option"] == "addMovie"){
                header("Location: dodaj.php");
                //addMovie();
            }

            if($_GET["option"] == "updateMovie"){
                //updateMovie();
            }

            if($_GET["option"] == "removeMovie"){
                //removeMovie();
            }
        }


        else{
            header("Location: admin_options.php");
        }
    ?>




<?php

include("footer.php");

?>