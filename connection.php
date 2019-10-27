<?php
$server_nomutlisateur = "root";
$server_motcle = "";
$server_host = "localhost";
$database = "authentification";

$conn = mysqli_connect($server_host,$server_nomutlisateur,$server_motcle,$database) or die("impossible de connecter le base de donnée");
mysqli_query($conn,"SET NAMES 'UTF8'");