<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <title>Fiche d'inscription</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="nomalize.css" />
        <link rel="stylesheet" href="style.css" />
        <link href="https://fonts.googleapis.com/css?family=Glegoo&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <style>
        
       
        .wrap {
            width: 100%;
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
                <form class="login-form" action = "register.php" method="post">
                    <div class="form-header">
                        <h3>S'inscrire</h3>
                        <p>Remplir tous les informations nécessaires</p>
                    </div>
                    <!--user's name Input-->
                    <div class="form-group">
                        <input type="text" name="nomutilisateur" class="form-input" placeholder="identifiant">
                    </div>
                    <!--password Input-->
                    <div class="form-group">
                        <input type="password" name="motcle" class="form-input" placeholder="mot de pass">
                    </div>
                    <!--confirm password Input-->
                    <div class="form-group">
                        <input type="password" name="motcleConfirm" class="form-input" placeholder="confirmer mot de pass">
                    </div>
                    <!--last name and first name-->
                    <div class="form-group">
                        <input type="text" name="nom" class="form-input" placeholder="nom et prénom">
                    </div>
                    <!--Email-->
                    <div class="form-group">
                        <input type="text" name="email" class="form-input" placeholder="email">
                    </div>
                    <!--Login Button-->
                    <div class="form-group">
                        <button class="form-button" type="submit" name="btn_submit">S'inscrire</button>
                    </div>
                    <?php
                    require_once("connection.php");
                    if(isset($_POST["btn_submit"])){
                        $nomutilisateur = $_POST["nomutilisateur"];
                        $motcle = $_POST["motcle"];
                        $motcleConfirm = $_POST["motcleConfirm"];
                        $nom = $_POST["nom"];
                        $email = $_POST["email"];
                    if($nomutilisateur =="" || $motcle =="" || $motcleConfirm=="" || $nom == "" || $email==""){
                        echo "<div><p style='color:red;'>S'il vous plaît entrer les informations complètes</p></div>";
                    }else{
                        $sql = "select * from users where nomutilisateur='$nomutilisateur'";
                        $sqlemail = "select * from users where email='$email'";
                        $kt= mysqli_query($conn, $sql);
                        $ktemail= mysqli_query($conn, $sqlemail);
                        if(mysqli_num_rows($kt) > 0){
                            echo "<div><p style='color:red;'>Compte a été créé</p></div>";
                        }
                        else if(mysqli_num_rows($ktemail) > 0){
                            echo "<div><p style='color:red;'>Ce email a déjà utilisé</p></div>";
                        }
                        else if($motcle != $motcleConfirm){
                            echo "<div><p style='color:red;'>Mot de pass n'est pas confirmé</p></div>";
                        }else{
                            $sql = "INSERT INTO users(
                                nomutilisateur,
                                motcle,
                                motcleConfirm,
                                nom,
                                email
                            ) VALUES (
                                '$nomutilisateur',
                                '$motcle',
                                '$motcleConfirm',
                                '$nom',
                                '$email'
                                )";
                            mysqli_query($conn,$sql);
                            echo "Félicitations pour votre inscription réussie";
                            }
                        }    
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
    <div>
    <footer id="footpage">
        <ul>
            <li><a href="mailto:thecastle1997.blois@gmail.com" target="_blank">Email</a></li>
            <li><a href="http://www.linkedin.com/in/m-pham">Linkedin</a></li>                  
        </ul>
        <span> Copyright 2019 by Minh Thuc PHAM - Minh Duc LA - Viet Dao NGUYEN</span>
    </footer>
    </div>
    

    
</html>

