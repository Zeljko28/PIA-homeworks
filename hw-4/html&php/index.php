<!DOCTYPE html>

<html lang="sr">
  <head>

        <title>AMRDb</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

    <body>

        
        <div class="container-fluid navigation-bar">

            <div class="row box">

                <div class="logo">
                    <a href="#"><span>AMRDb</span></a>
                </div>

                <div class="input">
                    <input type="search" placeholder="Pretraži AMRDb">
                    <a href="#">Pretraži</a>
                </div>

                <div id="items" class="links">
                    <a class="active" href="#">Početna strana</a>
                    <a href="#">Top 10</a>
                    <a href="#">Žanrovi</a>
                    <a href="#">Odjavite se</a>
                </div>

                <div class="btn">
                    <span id="btn" class="fa fa-bars"></span>
                </div>

            </div>
        </div>


        <div class="container movies">
            <div class="row">

                <div class="col-md-3">

                    <div class="row title">
                        <h3>Bekstvo iz Šošenka (1994)</h3>
                    </div>

                    <div class="row image">
                        <img src="../images/movies/bekstvo_iz_sosenka.jpg" alt="Bekstvo iz Šošenka">
                    </div>
                    
                </div>

                <div class="col-md-3">
                    <div class="row title">
                        <h3>Kum 1 (1972)</h3>
                    </div>

                    <div class="row image">
                        <img src="../images/movies/kum1.jpg" alt="Kum 1">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row title">
                        <h3>Kum 2 (1974)</h3>
                    </div>

                    <div class="row image">
                        <img src="../images/movies/kum2.jpg" alt="Kum 2">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row title">
                        <h3>Mračni vitez (2008)</h3>
                    </div>

                    <div class="row image">
                        <img src="../images/movies/mracni_vitez.jpg" alt="Mračni vitez">
                    </div>
                </div>


            </div>


            <div class="row">

                <div class="col-md-3">

                    <div class="row title">
                        <h3>Gospodar Prstenova: Povratak Kralja (2003)</h3>
                    </div>

                    <div class="row image">
                        <img src="../images/movies/gospodar_prstenova_povratak_kralja.jpg" alt="Gospodar Prstenova: Povratak Kralja">
                    </div>
                    
                </div>

                <div class="col-md-3">
                    <div class="row title">
                        <h3>Dobar, loš, zao</h3>
                    </div>

                    <div class="row image">
                        <img src="../images/movies/dobar_los_zao.jpg" alt="Dobar, loš, zao">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row title">
                        <h3>Gospodar Prstenova: Družina Prstena (2001)</h3>
                    </div>

                    <div class="row image">
                        <img src="../images/movies/gospodar_prstenova_druzina_prstena.jpg" alt="Gospodar Prstenova: Družina Prstena">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row title">
                        <h3>Matriks (1999)</h3>
                    </div>

                    <div class="row image">
                        <img src="../images/movies/matriks.jpg" alt="Matriks">
                    </div>
                </div>

                </div>

                <div class="row">

                    <div class="col-md-3">

                        <div class="row title">
                            <h3>Petparačke priče (1994)</h3>
                        </div>

                        <div class="row image">
                            <img src="../images/movies/petparacke_price.jpeg" alt="Petparačke priče">
                        </div>
                        
                    </div>

                    <div class="col-md-3">
                        <div class="row title">
                            <h3>Početak (2010)</h3>
                        </div>

                        <div class="row image">
                            <img src="../images/movies/pocetak.jpg" alt="Početak">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="row title">
                            <h3>Sedam (1995)</h3>
                        </div>

                        <div class="row image">
                            <img src="../images/movies/sedam.jpg" alt="Sedam">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="row title">
                            <h3>Prestiž (2006)</h3>
                        </div>

                        <div class="row image">
                            <img src="../images/movies/prestiz.jpg" alt="Prestiž">
                        </div>
                    </div>


                    </div>

        </div>



        <script>
            $('.navigation-bar .box .btn span').click(function(){
                $('.navigation-bar .box .links').toggleClass("show");
            });
        </script>

        <script src="../js/script.js"></script>

    </body>
</html>
