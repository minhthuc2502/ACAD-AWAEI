<!DOCTYPE html>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PROJET WEB</title>
        <link rel="icon" href="https://i.imgur.com/RjQxEiC.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Projet Web</a>
                </div>
                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" id="vueEnsemble">Vue d'ensemble</a></li>
                        <li><a href="#" id="control">Control</a></li>
                        <li><a href="#" id="connexion">Se Connecter</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" id="containerMain" style="height:100vh;width:auto;">
            <div class = "row p-t-3">
                    <div class = "col-sm-3">
                    </div>    
                    <div class = "col-sm-7">
                            <br>
                            <br>
                            <h3><b>Bienvenue au projet Architecture Web</b></h3>
                            <p>
                                Ce serveur permet de contrôler et superviser un automate à travers le protocol MODBUS par le cable Ethernet.<br>
                                Il va communiquer avec la base de données MySQL pour stocker les données de l'automate<br>
                                <br><br>
                                <br>
                            </p>
                    </div>
            </div>
        </div>
        <footer style="float:left">
                <p>Contact information:<br> 
                    gmail:&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:minhthuc2502@gmail.com">minhthuc2502@gmail.com</a><br>
                    linkedin:&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.linkedin.com/in/m-pham">www.linkedin.com/in/m-pham</a>.                    
                </p>
        </footer>
        <footer style="float:right">&copy; Copyright 2019 by Minh Thuc PHAM</footer>
    </body>
    <script>
            $('#vueEnsemble').click(
                function(){
                    document.getElementById('containerMain').innerHTML =    '<iframe src="vueEnsemble.html" style="height:100%; width:100%;border:hidden "></iframe>';
                }
            );
            $('#control').click(
                function(){
                    document.getElementById('containerMain').innerHTML = '<iframe src="about.php" style="height:100%; width:100%;border:hidden "></iframe>';
                }
            );
            $('#connexion').click(
                function(event){
                    document.getElementById('containerMain').innerHTML = '<iframe src="login.php" style="height:100%; width:100%;border:hidden "></iframe>';
                }
            );
    </script>
    </html>