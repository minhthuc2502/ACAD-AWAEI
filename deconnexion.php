<!DOCTYPE html>
<!-- Open session to save information login -->
<?php
session_start();
$_SESSION['login'] = false;
?>
<html>
    <head>
        <link rel="icon" href="img/icon.png">
        <link rel="stylesheet" href="nomalize.css" />
        <link rel="stylesheet" href="style.css" />
        <link href="https://fonts.googleapis.com/css?family=Glegoo&display=swap" rel="stylesheet">
        <title>The Castle - Deconnexion</title>
        <meta charset="utf-8">
    </head>

    <body>

        <div>   
            <header id="header" class="alt">
                <div class="logo"><a href="index.php">THE CASTLE <span>1997</span></a><div>
            </header>
        </div>
        <div class="main-content">
            <br>
            <br>
            <br>
            <header>
            <nav id="nav-bar">                  
                <ul class="main-nav">
                <li><a href = "index.php">Home</a></li>
                <li><a href = "vueEnsemble.php">Vue d'ensemble</a></li>
                <?php if( $_SESSION['login'] == false): ?>
                <li><a href = "login.php">Se Connecter</a></li>
                <?php endif; ?>
                <?php if( $_SESSION['login'] == true): ?>
                <li><a href = "deconnexion.php">déconnexion</a></li>
                <?php endif; ?>
                </ul> 
            </nav>
            </header>
            <p>Vous avez déjà déconnecté</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div> 

    
        <!-- Footer -->
        <footer id="footpage">
            <ul>
                <li><a href="mailto:thecastle1997.blois@gmail.com" target="_blank">Email</a></li>
                <li><a href="http://www.linkedin.com/in/m-pham">Linkedin</a></li>                  
            </ul>
            <span> Copyright 2019 by Minh Thuc PHAM - Minh Duc LA - Viet Dao NGUYEN</span>
        </footer>
    </body>
</html>


