<!DOCTYPE html>
<!-- Open session to save information login -->
<?php
session_start();
$_SESSION['login'] = false;
?>
<html>
    <head>
        <link rel="icon" href="img/icon.png">
        <title>The Castle - Se Connecter</title>
        <link rel="stylesheet" href="nomalize.css" />
        <link rel="stylesheet" href="style.css" />
        <link href="https://fonts.googleapis.com/css?family=Glegoo&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <style>
        
        html{
            height: 100%;
        }
        .wrap {
            width: 100%;
            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fafafa;
            background-image: linear-gradient(rgba(0, 0, 0, 0.493),rgba(0, 0, 0, 0.493)), url(img/background3.png);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .login-form{
            width: 350px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 2rem;
            background: #ffffff;
        }
        .form-input{
            background: #fafafa;
            border: 1px solid #eeeeee;
            padding: 12px;
            width: 100%;
        }
        .form-group{
            margin-bottom: 1rem;
        }
        .form-button{
            background: #69d2e7;
            border: 1px solid #ddd;
            color: #ffffff;
            padding: 10px;
            width: 100%;
            text-transform: uppercase;
        }
        .form-button:hover{
            background: #69c8e7;
        }
        .form-header{
            text-align: center;
            margin-bottom : 2rem;
        }

        .form-header h3 {
            font-size: 2em;
            margin-top: 0;
        }

        .form-footer{
            text-align: center;
        }
        </style>
    </head>

    <body>

        <div>   
            <header id="header" class="alt">
                <div class="logo"><a href="index.php">THE CASTLE <span>1997</span></a><div>
            </header>
        </div>
        <div class="main-content">
            <header>
                <nav id="nav-bar">                  
                    <ul class="main-nav">
                        <li><a href = "index.php">Home</a></li>
                        <li><a href = "vueEnsemble.php">Vue d'ensemble</a></li>
                        <?php if( $_SESSION['login'] == true): ?>
                        <li><a href="control.php">Control</a></li>
                        <?php endif; ?>
                        <?php if( $_SESSION['login'] == false): ?>
                        <li><a href = "login.php">Se Connecter</a></li>
                        <?php endif; ?>
                        <?php if( $_SESSION['login'] == true): ?>
                        <li><a href = "deconnexion.php">deconnecter</a></li>
                        <?php endif; ?>
                        <br>
                        <br>
                    </ul> 
                </nav>
            </header>
            <div class="wrap">
                <form class="login-form" method="POST" action="login.php">
                    <div class="form-header">
                        <h3>Se connecter</h3>
                        <p>Se connecter pour visualiser la température de la salle</p>
                    </div>
                    <!--Email Input-->
                    <div class="form-group">
                    <input type="text" name="nomUtilisateur" class="form-input" placeholder="identifiant">
                    </div>
                    <!--Password Input-->
                    <div class="form-group">
                        <input type="password" name="motCle" class="form-input" placeholder="mot de pass">
                    </div>
                    <!--Login Button-->
                    <div class="form-group">
                        <button class="form-button" type="submit" name="btn_submit">Se Connecter</button>
                    </div>
                    <div class="form-footer">
                    Je n'ai pas de compte? <a href="register.php">S'inscrire</a>
                    </div>
                    </form>
            </div><!--/.wrap-->
        </div> 

    <?php
        require_once("connection.php");
        // si button submit est appuye
        if (isset($_POST["btn_submit"])){
            $nomutilisateur = $_POST["nomUtilisateur"];
            $motcle= $_POST["motCle"];
            $nomutilisateur = strip_tags($nomutilisateur);
            $nomutilisateur = addslashes($nomutilisateur);
            $motcle = strip_tags($motcle);
            $motcle = addslashes($motcle);
            if($nomutilisateur =="" || $motcle==""){
                echo "Nom d'utilisateur ou  Mot clé n'est pas possible d'être vide!";
            }
            else{
                $sql = "select * from users where nomutilisateur = '$nomutilisateur' and motcle = '$motcle' ";
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $query = mysqli_query($conn, $sql);
                $num_rows = mysqli_num_rows($query);
                if($num_rows == 0){
                    echo "Nom d'utilisateur ou le mot clé n'est pas invalid!";
                } 
                else{
                    // Enregister le nom d'utilisateur dans la session
                    $login = true;
                    $_SESSION["nomutilisateur"] = $nomutilisateur;
                    $_SESSION['login'] = true;
                    header('location: control.php');
                    exit();
                }
            }
        }
    ?>

    </body>
            <!-- Footer -->
            <!-- <div> -->
            <footer id="footpage">
                <ul>
                    <li><a href="mailto:thecastle1997.blois@gmail.com" target="_blank">Email</a></li>
                    <li><a href="http://www.linkedin.com/in/m-pham">Linkedin</a></li>                  
                </ul>
                <span> Copyright 2019 by Minh Thuc PHAM - Minh Duc LA - Viet Dao NGUYEN</span>
            </footer>
        <!-- </div> -->
</html>


