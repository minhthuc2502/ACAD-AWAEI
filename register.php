<html>
    <head>
        <title>Fiche d'inscription</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="mainstyle.css">
    </head>
    <body>
        <?php
        require_once("connection.php");
        if(isset($_POST["btn_submit"])){
            $nomutilisateur = $_POST["nomutilisateur"];
            $motcle = $_POST["motcle"];
            $nom = $_POST["nom"];
            $email = $_POST["email"];
        if($nomutilisateur =="" || $motcle =="" || $nom == "" || $email==""){
            echo "S'il vous plaît entrer les informations complètes";
        }else{
            $sql = "select * from users where nomutilisateur='$nomutilisateur'";
            $kt= mysqli_query($conn, $sql);
            if(mysqli_num_rows($kt) > 0){
                echo "Compte a été créé";
            }else{
                $sql = "INSERT INTO users(
                    nomutilisateur,
                    motcle,
                    nom,
                    email
                ) VALUES (
                    '$nomutilisateur',
                    '$motcle',
                    '$nom',
                    '$email'
                    )";
                mysqli_query($conn,$sql);
                echo "Félicitations pour votre inscription réussie";
                }
            }    
        }

        ?>
        <form action = "register.php" method="post">
            <table>
                <tr colspan="2">S'inscrire</tr>
                <tbody>
                    <tr>
                        <td>Nom d'utilisateur :</td>
                        <td><input type="text" id="nomutilisateur" name="nomutilisateur"></td>
                    </tr>
                    <tr>
                        <td>Mot clé :</td>
                        <td><input type="password" id="motcle" name="motcle"></td>
                    </tr>
                    <tr>
                        <td>Nom et Prénom :</td>
                        <td><input type="text" id="nom" name="nom"></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><input type="text" id="email" name="email"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><input type="submit" name="btn_submit" value="S'incrire"></td>
                    </tr>
                </tfoot>
            </table>
        </form>

    </body>
</html>

