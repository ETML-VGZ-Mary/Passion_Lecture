 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.12.2023
    Description   :	Vérifie que les saisies pour le changement des infos du compte soient valables
-->

<?php
// connexion à la BD
include("../Model/ModelUser.php");

$dbUser = new ModelUser();
$users = $dbUser->getAllUsers();

// 1. démarrer la session
session_start();

// 2. validation de données
$errors = array();

/*
// Champ 1
if (!isset($_POST['genre'])) {
    $errors[] = "Le genre doit être sélectionné.";
}
// Champ 2
if (!isset($_POST['firstName']) || $_POST['firstName'] == '') {
    $errors[] = "Le prénom ne doit pas être vide !";
}else{
    if(!preg_match('/^[A-Za-z\é\è\s\-]*$/', $_POST['firstName'])){
        $errors[] = "Le prénom doit contenir seulement des lettres.";
    }
}
// Champ 3
if (!isset($_POST['name']) || $_POST['name'] == '') {
    $errors[] = "Le nom ne doit pas être vide !";
}else{
    if(!preg_match('/^[A-Za-z\é\è\s\-]*$/', $_POST['name'])){
        $errors[] = "Le nom doit contenir seulement des lettres.";
    }
}
// Champ 4
if (!isset($_POST['nickName']) || $_POST['nickName'] == '') {
    $errors[] = "Le surnom ne peut pas être vide.";
}
// Champ 5
if (!isset($_POST['origin']) || $_POST['origin'] == '') {
    $errors[] = "L'origine ne peut pas être vide.";
}
// Champ 6
if (!isset($_POST['section']) || $_POST['section'] == '') {
    $errors[] = "Veuillez choisir une section";
}
*/
// afficher les erreurs s'il y en a ////////////////////////////////////////////////////////////////


if (count($errors) > 0) {
    // afficher les erreurs
    echo "Erreurs : <br>";
    echo "<ul>";
    foreach($errors as $error) {
        echo "<li>" . $error."</li>";
    }
    echo "</ul>";

}else{
    // 3. Enregistre les valeurs saisies dans la db
    // updateAccount($firstName, $lastName, ...)

    // 4. Redirection

    echo "Guo Yu : Si les champs sont valides, on modifie la DB avec un UPDATE, puis on redirige vers, par ex, index.php";
    echo "<br>";    
    echo "Guo Yu : Étât de la tâche : BACKLOG ";
    echo "<br>"; 
    echo "<a href=\"../View/resources/PHP_html/index.php\">HOMEPAGE</a>";
    // Redirection vers la page d'accueil
    //header("Location: ../View/resources/PHP_html/index.php");
    exit;
        

}
?>
