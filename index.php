<!DOCTYPE html>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PROJET WEB</title>
        <link rel="icon" href="https://i.imgur.com/RjQxEiC.png">
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <!-- Header -->
        <div>
            <header id="header" class="alt">
                <div class="logo"><a href="index.php">THE CASTLE <span>1997</span></a><div>
            </header>
        </div>
        <!-- Accueil principal -->
        <div id="mainBody">
            <nav id="nav-bar">                  
                <ul class="main-nav">
                    <li><a href="vueEnsemble.html">Vue d'ensemble</a></li>
                    <li><a href="about.php">Control</a></li>
                    <li><a href="login.php">Se Connecter</a></li>
                </ul> 
            </nav>
            <div class="welcome-text">
                <h1>le contrôle partout et pour tous</h1>
                <a href="#footpage">Contactez-nous</a>
            </div>   
        </div>
        <!--Introduction -->
        <section class="section-main" id='features'>
            <div class="row">
                <h2>THE CASTLE</h2>
                <p class="introduction">
                Nous vous donnons plus de moyens d'améliorer votre expérience Internet avec The Castle.
                En tant que client du The Castle, vous pouvez désormais personnaliser et surveiller votre maison à partir de notre site web.
                Cette application affiche une vue complète de vos salles et vous permet de les gérer à partir d’une interface simple et intuitive.
                </p>
            </div>
        </section>
        <section class="section-room" id="photos">
            <ul class="room-showcase">
                <li>
                    <figure class="room-photo">
                        <img src="img/room1.jpg" alt="red room">
                    </figure>
                </li>
                <li>
                    <figure class="room-photo">
                        <img src="img/room2.jpg" alt="messed room">
                    </figure>
                </li>
                <li>
                    <figure class="room-photo">
                        <img src="img/room3.jpg" alt="nature room">
                    </figure>
                </li>
                <li>
                    <figure class="room-photo">
                        <img src="img/room4.png" alt="green room with a girl">
                    </figure>
                </li>
                <li>
                    <figure class="room-photo">
                        <img src="img/room5.jpg" alt="modern room on the sky">
                    </figure>
                </li>
                <li>
                    <figure class="room-photo">
                        <img src="img/room6.jpg" alt="classic room">
                    </figure>
                </li>
            </ul>
        </section>   
        <!-- Footer -->
        <footer id="footpage">
            <ul>
                <li><a href="mailto:minh.pham@insa-cvl.fr">Email</a></li>
                <li><a href="http://www.linkedin.com/in/m-pham">Linkedin</a></li>                  
            </ul>
            <span> Copyright 2019 by Minh Thuc PHAM - Minh Duc LA - Viet Dao NGUYEN</span>
        </footer>
        </body>
    </html>