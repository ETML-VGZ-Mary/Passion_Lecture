 <!--
    ETML
    Auteur        :	Déglise Camille - Vougaz Maryline - Wu Guo Yu
    Date          :	28.11.2023
    Description   :	Accueil du site "Passion Lecture" 
-->

<?php
// connexion à la BD
//include("./DATABASE.php");

//$db = new Database();
//$teachers = $db->getAllTeachers();

//session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/app.css" rel="stylesheet" media="screen"/>
    <title>Passion Lecture</title>
</head>

<body>

    <header>

        <?php
            include("header.inc.php");
        ?>
        <!--<div class="container-header">
            <div class="titre-header">
                <h1>Passion Lecture</h1>
            </div>
            
        connexion 
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
                <a href="../views/index.php">Accueil</a>
                <a href="../views/liste.php">Liste</a>
                <a href="#">Ajout</a>
                <a href="#">Profil</a>
                <a href="#">Contacts</a>
            </div>
            
        </nav>-->
    </header>

    <div class="container-details">
        <div class="book-name">
            <h2>Titre du livre</h2>
            <a href="#"><img src="../images/icons/modify.png" alt="modify"></a>
            <a href="#"><img src="../images/icons/delete.png" alt="delete"></a>
        </div>
        <div></div>
        <div></div>
        
        <h3 class="profil">Auteur/s - Éditeur/s - aaaa </h3>
        <h3 class="profil">Résumé</h3>
        
        <!-- <script src="./js/script.js"></script> -->
    </div>

    <footer>
        <?php
            include("footer.inc.php");
        ?>
        <!--<p>© Camille Déglise - Guo Yu Wu - Maryline Vougaz - 2024</p>-->
    </footer>

</body>

</html>