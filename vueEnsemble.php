<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>The Castle - Over view</title>
            <link rel="icon" href="img/icon.png">
            <link rel="stylesheet" href="nomalize.css" />
            <link rel="stylesheet" href="style.css" />
            <link href="https://fonts.googleapis.com/css?family=Glegoo&display=swap" rel="stylesheet">
        </head>

    <body>
        <!-- Header -->
        <div>
            <header id="header" class="alt">
                <div class="logo"><a href="index.php">THE CASTLE <span>1997</span></a><div>
            </header>
        </div>
        <div class= "mainTitle">
            <nav id="nav-bar">                  
                <ul class="main-nav">
                    <li><a href="vueEnsemble.php">Vue d'ensemble</a></li>
                    <li><a href="control.php">Control</a></li>
                    <li><a href="login.php">Se Connecter</a></li>
                </ul> 
            </nav>
            <h2>Comment pourrions-nous contrôler votre maison?</h2>
            <div class="row">
                <div class="column">
                        <img src="img/control1.jpg" alt="interface control">
                        <img src="img/control2.jpg" alt="automate">
                </div>
                <div class="column" style="background-color:transparent;">
                    <h3>L'Automate Tactile Ethernet AT3100</h3>
                        <p> L'Automate AT3100 a la capacité de connecter avec notre serveur via un port Ethernet.
                            La nombre de salle observées peut aller jusqu'à 4 salles avec 4 sondes de température
                            qui sont reliés directement à l'automate par liaison filaire.</p>
                    
                    <h3>Liaison MODBUS entre l'automate et le serveur</h3>
                        <p>MODBUS est un protocole de communication non-propriétaire, créé en 1979 par Modicon,
                            utilisé pour des réseaux d'automates programmables, relevant du niveau applicatif,
                            c'est-à-dire du niveau 7 du Modèle OSI. Ce protocole basé sur une structure hiérarchisée
                            entre un client unique et plusieurs serveurs est dans le domaine public et sa spécification est publique.
                            En savoir plus sur <a href="https://fr.wikipedia.org/wiki/Modbus">MODBUS</a></p>
                    
                    <h3>Langage HTML, CSS</h3>
                        <p>Notre site web est créé par le langage HTML, CSS. HTML est un langage de balisage conçu pour représenter les pages web. 
                            Il permet également de structurer sémantiquement et logiquement et de mettre en forme le contenu des pages, 
                            d’inclure des ressources multimédias dont des images, des formulaires de saisie et des programmes informatiques. 
                            CSS décrit la présentation des documents HTML et XML. Les standards définissant CSS sont publiés par le World Wide Web Consortium (W3C)
                            En savoir plus sur <a href="https://fr.wikipedia.org/wiki/Hypertext_Markup_Language">HTML</a>, <a href="https://fr.wikipedia.org/wiki/Feuilles_de_style_en_cascade">CSS</a></p>
                    
                    <h3>La base de données PHP</h3>
                        <p>Vos données sont stockées dans notre base de données PHP. PHP est un langage de programmation libre,
                            principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP5,
                            mais pouvant également fonctionner comme n'importe quel langage interprété de façon locale.
                            PHP est un langage impératif orienté objet. En savoir plus sur <a href="https://fr.wikipedia.org/wiki/PHP">PHP</a></p>

                    <h3>Serveur embarqué raspberry pi 3</h3>
                        <p>Notre serveur est contenu dans le raspberry pi. Le raspberry est un noeud entre l'automate et le serveur Internet. Il récupère 
                            les données de température et les transmis à notre serveur par le Wifi. Le Raspberry Pi est un nano-ordinateur monocarte 
                            à processeur ARM conçu par des professeurs du département informatique de l'université de Cambridge
                            dans le cadre de la fondation Raspberry Pi. En savoir plus sur <a href="https://fr.wikipedia.org/wiki/Raspberry_Pi">Raspberry</a></p>
                </div>
            </div>    
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