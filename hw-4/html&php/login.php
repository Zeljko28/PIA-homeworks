<!DOCTYPE html>

<html lang="sr">

    <head>
        <title>Prijavite se - AMRDb</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/login.css">
    </head>

    <body>
        <div id="sign-in" class="container login">
            <div class="row red">
                <div class="col-md-6 left">
                    <h2>Ulogujte se</h2>
                    
                    <form action="../libraries/login_lib.php" method="post">
                        <label id="lbl-username" >Korisničko ime ili email adresa</label>
                        <input name="username" id="username" class="form-control" type="text" autocomplete="off">

                        <label id="lbl-password">Lozinka</label>
                        <input name="password" type="password" id="password" class="form-control" type="text" autocomplete="off">

                        <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"] == "emptyInput"){
                                    echo "<p style='color:red;'>Niste popunili sva polja!</p>";
                                }

                                if($_GET["error"] == "invalidUsernameOrPassword"){
                                    echo "<p style='color:red;'>Neispravno korisničko ime ili lozinka!</p>";
                                }
                            }
                        
                        ?>



                        <button id="log" name="submit" type="submit">Prijavite se</button>
                    </form>
                    <hr>
                    <a id="reg" href="signup.php">Napravite nalog</a>
                </div>

 

                <div class="col-md-6 right">
                    <h2>Prednosti posedovanja naloga</h2>
            
                    <h4>Pristup i pregled filmova, serija...</h4>
                    <p>Pronađite šta želite da gledate.</p>

                    <h4>Vaše ocene</h4>
                    <p>Ocenite i zapamtite sve što ste videli.</p>

                    <h4>Doprinosite sajtu</h4>
                    <p>Dodate podatke, kao i vaše ocene, biće uračunate i viđene od strane drugih ljudi.</p>
                </div>

            </div>
        </div>

    </body>

</html>