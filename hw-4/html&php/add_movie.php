<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

?>

<?php
    include("navbar.php");
?>
    <div class="container add">

        <form action="../libraries/add_movie_lib.php" method="post">
                <h2>Dodajte film</h2>

                <label id="lbl-title">Unesite naslov filma</label>
                <input name="title" id="title" class="form-control" type="text" autocomplete="off">

                <label id="lbl-synopsis">Unesite opis filma</label>
                <input name="synopsis" id="synopsis" class="form-control" type="text" autocomplete="off">

                <label id="lbl-genre">Unesite žanr filma</label>
                <input name="genre" id="genre" class="form-control" type="text" autocomplete="off">

                <label id="lbl-scenarist">Unesite ime scenariste filma</label>
                <input name="scenarist" id="scenarist" class="form-control" type="text" autocomplete="off">

                <label id="lbl-director">Unesite ime režisera filma</label>
                <input name="director" type="text" id="director" class="form-control" autocomplete="off">

                <label id="lbl-production-house">Unesite ime producentske kuće</label>
                <input name="production-house" type="text" id="production-house" class="form-control" autocomplete="off">

                <label id="lbl-actors">Unesite imena glumaca filma</label>
                <input name="actors" type="text" id="actors" class="form-control" autocomplete="off">

                <label id="lbl-year">Unesite godinu izdanja filma</label>
                <input name="year" type="text" id="year" class="form-control" autocomplete="off">

                <label id="lbl-img-url">Unesite putanju do slike filma</label>
                <input name="img-url" type="text" id="img-url" class="form-control" autocomplete="off">

                <label id="lbl-duration">Unesite trajanje filma u minutima</label>
                <input name="duration" type="text" id="duration" class="form-control" autocomplete="off">
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyInput"){
                            echo "<p style='color:red;'>Niste popunili sva polja!</p>";
                        }
                    }
                ?>

                <button id="submit" name="submit" type="submit">Dodaj film</button>
            </form>


    </div>



<?php

    include("footer.php");

?>

