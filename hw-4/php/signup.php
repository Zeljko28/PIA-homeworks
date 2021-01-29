<!DOCTYPE html>
<html lang="sr">

    <head>
        <title>AMRDb Registracija</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/signup.css">
    </head>

    <body>
        <div id="sign-up" class="container signup">

            <div class="row logo">
                <img id="logo" src="../images/logo.png"></img>
            </div>

            <h2>Registracija</h2>

            <?php

            /*
                Greske pri registraciji(prazan input, nepravilno uneto ime, prezime, email...)
                se prikazuju u paragrafu koji je sakriven, odnosno prikazuje se kad se izvrsi ovaj
                php kod. Greske implementirane preko URL-a koji su postavljeni
                u signup_lib.php fajlu.
            */
            
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyInput"){
                    echo "<p style='color:red;'>Niste popunili sva polja!</p>";
                }

                if($_GET["error"] == "invalidName"){
                    echo "<p style='color:red;'>Ime sadrzi nedozviljene simbole!</p>";
                }

                if($_GET["error"] == "invalidLastName"){
                    echo "<p style='color:red;'>Prezime sadrzi nedozvoljene simbole!</p>";
                }

            }




            ?>



            <form action="../libraries/signup_lib.php" method="post">
                <label id="lbl-name">Unesite ime</label>
                <input name="first-name" id="name" class="form-control" type="text" autocomplete="off">

                <label id="lbl-surname">Unesite prezime</label>
                <input name="last-name" id="surname" class="form-control" type="text" autocomplete="off">

                <label id="lbl-email">Email</label>
                <input name="email" id="email" class="form-control" type="text" autocomplete="off">

                <label id="lbl-new-username">Korisničko ime</label>
                <input name="new-username" id="new-username" class="form-control" type="text" autocomplete="off">

                <label id="lbl-new-password">Lozinka</label>
                <input name="new-password" type="password" id="new-password" class="form-control" autocomplete="off">

                <button id="submit" name="submit" type="submit">Potvrdi</button>
            </form>

            <p>Već imate nalog? <a id="back" href="login.html">Prijavite se</a></p>
            
        </div>

    </body>
</html>