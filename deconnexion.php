<!DOCTYPE html>
<!-- Open session to save information login -->
<?php
session_start();
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
            <p>Vous avez déjà connecté</p>
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
            
            <p>This site was created by Minh Duc LA, Minh Thuc PHAM. It uses data from an automate using MOD BUS</p>
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
    <?php if($login == false): ?>
        <form method="POST" action="login.php">
        <div class="main-content">
            <fieldset>
                <legend>Se Connecter</legend>
                <table>
                    <tbody>
                        <tr>
                            <td>Nom d'utilisateur</td>
                            <td><input type="text" name="nomUtilisateur" size="30"></td> 
                        </tr>
                        <tr>
                                <td>Mot clé</td>
                                <td><input type="password" name="motCle" size="30"></td> 
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><input type="submit" name="btn_submit" value="Se Connecter"></td>
                            <a href ="register.php">S'incrire</a>
                        </tr>
                    </tfoot>
                </table>
            </fieldset>
        </div>
    <?php endif; ?>
    <?php if($login == true): ?>
        <p>Vous avez connecté.</p>
    <?php endif; ?>
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


