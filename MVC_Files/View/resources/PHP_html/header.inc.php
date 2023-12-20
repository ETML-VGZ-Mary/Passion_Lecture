 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	06.12.2023
    Description   :	Fichier inc pour le header du site 
-->

<?php

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/app.css" rel="stylesheet" media="screen"/>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.22/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Header</title>
</head>

<header>
    <div class="container-header">
        <div class="titre-header">
            <h1>Passion Lecture</h1>
        </div>
        
        <!-- connexion -->
        <div class="box-login">
            <label for="user"></label>
            <input type="text" name="user" id="user" placeholder="Username">
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit" class="btn btn-login">Login</button>
        </div>
        

    </div>
    <nav>
        <div class="nav-links">
            <a href="../PHP_html/index.php">Accueil</a>
            <a href="../PHP_html/liste.php">Liste</a>
            <a href="../PHP_html/addBook.inc.php">Ajout</a>
            <a href="#">Profil</a>
        </div>
        
    </nav>
</header>
    