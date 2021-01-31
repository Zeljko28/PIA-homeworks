<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

?>


<?php

    include("navbar.php");

?>

    <div class="container genres">

        <div class="row">
            <a href="index.php?genre=comedy">Komedije</a>
        </div>

        <div class="row">
            <a href="index.php?genre=sci-fi">Naučna fantastika</a>
        </div>
        
        <div class="row">
            <a href="index.php?genre=horror">Horor</a>
        </div>
        
        <div class="row">
            <a href="index.php?genre=romance">Romantika</a>
        </div>
        
        <div class="row">
            <a href="index.php?genre=action">Akcija</a>
        </div>

        <div class="row">
            <a href="index.php?genre=thriler">Triler</a>
        </div>

        <div class="row">
            <a href="index.php?genre=drama">Drama</a>
        </div>
        
        <div class="row">
            <a href="index.php?genre=mystery">Misterija</a>
        </div>

        <div class="row">
            <a href="index.php?genre=western">Western</a>
        </div>

        <div class="row">
            <a href="index.php?genre=documentary">Dokumentarni filmovi</a>
        </div>

        <div class="row">
            <a href="index.php?genre=adventure">Avantura</a>
        </div>

        <div class="row">
            <a href="index.php?genre=crime">Kriminalistička drama</a>
        </div>
        

    </div>



<?php
    include("footer.php");
?>


