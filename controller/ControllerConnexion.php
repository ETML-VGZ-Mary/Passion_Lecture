 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	20.12.2023
    Description   :	login
-->

<?php
// connexion à la BD
include("../Model/ModelUser.php");

$dbUser = new ModelUser();
$users = $dbUser->getAllUsers();

// 1. démarrer la session
session_start();

// 2. Enregistre les entrées
$_SESSION["user"] = $_POST['user'];
$_SESSION["password"] = $_POST['password'];

// 2. test des valeurs
// a) si le user est correct
// b) si le mdp est correct

if($_SESSION['isConnected'] || !isset($_POST['user']) || !isset($_POST['password'])){
    $_SESSION['isConnected'] = false;
}else{
    foreach($users as $user){
        if ($_SESSION["user"] == $user["login"]){
            if($_SESSION["password"] == $user["passWord"]){
                $_SESSION['isConnected'] = true;
                $_SESSION["account"] = $user;
                switch($user["isAdmin"]){
                    case 0 :
                        $_SESSION['typeUser'] = "user";
                        break;
                    case 1 :
                        $_SESSION['typeUser'] = "admin";
                        break;
                    default :
                        break;
                }
            }
        }
    }
}





// Redirection vers la page d'accueil
header("Location: ../View/resources/PHP_html/index.php");
exit;
  //echo "HERE";  

?>
